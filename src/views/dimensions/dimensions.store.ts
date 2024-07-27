import { defineStore } from 'pinia'
import { reactive } from 'vue'
import { DimensionsService } from '@/services'
import { TermState } from '@/models/terms'

export const useDimensionsStore = defineStore('dimensions', () => {
	const state = reactive({
		parent: null as TermState | null,
		productTypes: null as TermState[] | null,
		configurations: null as TermState[] | null,
		loading: false,
		currentProductType: null as TermState | null,
	})

	const setting = reactive({
		showAllConfigurations: false,
	})

	async function loadDimensions() {
		state.loading = true

		try {
			const result = await DimensionsService.dimensions()

			state.parent = new TermState(result.parent)

			console.log(state.parent.acf)
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

	return {
		state,
		setting,
		loadDimensions,
	}
})