import { defineStore } from 'pinia'
import { reactive } from 'vue'
import { DimensionsService } from '@/services'
import * as Dimensions from '@/models/dimensions'
import { DimensionTermState } from '@/models/dimensions'

export const useDimensionsStore = defineStore('dimensions', () => {
    const state = reactive({
        productTypes: null as Dimensions.DimensionTermState[] | null,
        configurations: null as Dimensions.DimensionTermState[] | null,
        loading: false,
    })

    async function loadDimensions() {
        state.loading = true

        try {
            const result = await DimensionsService.dimensions()
            state.productTypes = (result.productTypes ?? []).map(
                productType => new DimensionTermState(productType)
            )
            state.configurations = (result.configurations ?? []).map(
                configuration => new DimensionTermState(configuration)
            )
        } catch (error: any) {
            console.log(error)
        } finally {
            state.loading = false
        }
    }

    return {
        state,
        loadDimensions,
    }
})