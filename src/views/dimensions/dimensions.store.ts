import { defineStore } from 'pinia'
import { reactive } from 'vue'
import { DimensionsService } from '@/services'

export const useDimensionsStore = defineStore('dimensions', () => {
    const state = reactive({
        dimensions: {},
        loading: false,
    })

    async function loadDimensions() {
        state.loading = true

        try {
            state.dimensions = DimensionsService.dimensions()
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