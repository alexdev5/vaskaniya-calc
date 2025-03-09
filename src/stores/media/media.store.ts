import { defineStore } from 'pinia'
import { reactive } from 'vue'
import { mediaApi } from '@/services'
import { ImageContract } from '@/api/terms/term.contracts.ts'

export const useMediaStore = defineStore('media', () => {
    const state = reactive({
        data: [] as ImageContract[],
        totalPage: 0,
    })

    // page
    // perPage
    async function loadMedia(query?: Record<string, any>) {
        const res = await mediaApi.getImages(query)
        state.data = res.data
        state.totalPage = Math.ceil(res.total / res.perPage)
        console.log(state)
    }

    return {
        state,
        loadMedia,
    }
})
