import { defineStore } from 'pinia'
import { reactive, ref } from 'vue'
import { edgeApi, termsApi } from '@/services'
import { ImageType, TermState } from '@/models/terms'
import { PostContracts, TermContracts } from '@/api'
import { EdgePlinthType, EdgeTableThickness } from '@/api/edges/edge.contracts.ts'

export const useEdgesStore = defineStore('edges', () => {
	const state = reactive({
		taxonomy: '' as TermContracts.TaxonomyName,
		plinthTypes: null as EdgePlinthType | null,
		tableThickness: null as EdgeTableThickness | null,
		frontEdgeViews: null as PostContracts.PostContract[] | null,

		loading: false,
		selectedPlinthType: null as TermState | null,
		selectedTableThickness: null as TermState | null,
		selectedFrontEdgeViewId: 0 as number,
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
		state.selectedPlinthType = state.plinthTypes?.children[0] ?? null
		state.selectedTableThickness = state.tableThickness?.children[0] ?? null
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