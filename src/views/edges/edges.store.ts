import { defineStore } from 'pinia'
import { computed, reactive, ref } from 'vue'
import { edgeApi, termsApi } from '@/services'
import { ImageType, TermState } from '@/models/terms'
import { PostContracts, TermContracts } from '@/api'

export const useEdgesStore = defineStore('edges', () => {
	const state = reactive({
		taxonomy: '' as TermContracts.TaxonomyName,
		plinthTypes: null as TermState[] | null,
		tableThickness: null as TermState[] | null,
		frontEdgeViews: null as PostContracts.PostContract[] | null,

		loading: false,
		selectedPlinthTypeId: 0 as number,
		selectedTableThicknessId: 0 as number,
		selectedFrontEdgeViewId: 0 as number,
	})

	const selectedPlinthType = computed((): TermState | null => {
		if (!state.plinthTypes?.length) return null

		return state.plinthTypes.find(item => item.id === state.selectedPlinthTypeId) ?? null
	})

	const selectedFrontEdgeView = computed((): PostContracts.PostContract | null => {
		if (!state.frontEdgeViews?.length) return null

		return state.frontEdgeViews.find(item => item.id === state.selectedFrontEdgeViewId) ?? null
	})

	const imageDeleting = ref({} as Record<ImageType, boolean>)

	async function load() {
		state.loading = true

		try {
			const result = await edgeApi.edges()

			state.taxonomy = result.taxonomy

		} catch (error: any) {
			console.log(error)
		} finally {
			state.loading = false
		}
	}

	// TODO: move to composable
	async function removeImageFromTerm(termId: number, mediaType: ImageType) {
		imageDeleting.value[mediaType] = true

		try {
			await termsApi.assignImage({
				termId,
				imageId: null,
				type: mediaType,
			})
			await load()
		} catch (error: any) {
			console.log(error)
		} finally {
			imageDeleting.value[mediaType] = false
		}
	}

	function setCardDefault() {
		state.selectedPlinthTypeId = state.plinthTypes?.[0]?.id ?? 0
		state.selectedTableThicknessId = state.tableThickness?.[0]?.id ?? 0
		state.selectedFrontEdgeViewId = state.frontEdgeViews?.[0]?.id ?? 0
	}

	return {
		state,
		load,
		removeImageFromTerm,
		imageDeleting,
		setCardDefault,
		selectedPlinthType,
		selectedFrontEdgeView,
	}
})