import { defineStore } from 'pinia'
import { reactive } from 'vue'
import { ImageContract } from '@/api/terms/terms.contracts'
import { mediaApi } from '@/services'

export const useMediaStore = defineStore('media', () => {
	const state = reactive({
		media: [] as ImageContract[],
	})

	// page
	// perPage
	async function loadMedia(query?: Record<string, any>) {
		state.media = await mediaApi.getImages(query)
	}

	return {
		state,
		loadMedia,
	}
})