import { defineStore } from 'pinia'
import { reactive, ref } from 'vue'
import { DimensionsService, TermsService } from '@/services'
import { ImageType, TermState } from '@/models/terms'
import { TaxonomyName } from '@/api/terms'

export const useDimensionsStore = defineStore('dimensions', () => {
	const state = reactive({
		taxonomy: '' as TaxonomyName,
		parent: null as TermState | null,
		productTypes: null as TermState[] | null,
		configurations: null as TermState[] | null,
		loading: false,
		currentProductType: null as TermState | null,
	})

	const setting = reactive({
		showAllConfigurations: false,
	})

	const termImageToUpload = reactive({
		type: ImageType.None,
		termId: 0,
		loading: false,
	})

	const imageDeleting = ref({} as Record<ImageType, boolean>)

	async function loadDimensions() {
		state.loading = true

		try {
			const result = await DimensionsService.dimensions()

			state.taxonomy = result.taxonomy
			state.parent = new TermState(result.parent)

			state.productTypes = (result.productTypes ?? []).map(
				productType => new TermState(productType),
			)
			state.configurations = (result.configurations ?? []).map(
				configuration => new TermState(configuration),
			)
		} catch (error: any) {
			console.log(error)
		} finally {
			state.loading = false
		}
	}

	async function removeImageFromTerm(termId: number, mediaType: ImageType) {
		imageDeleting.value[mediaType] = true

		try {
			await TermsService.assignImage({
				termId,
				imageId: null,
				type: mediaType,
			})
			await loadDimensions()
		} catch (error: any) {
			console.log(error)
		} finally {
			imageDeleting.value[mediaType] = false
		}
	}

	function setCardDefault() {
		state.currentProductType = state.productTypes?.[0] ?? null
	}

	return {
		state,
		setting,
		loadDimensions,
		termImageToUpload,
		removeImageFromTerm,
		imageDeleting,
		setCardDefault,
	}
})