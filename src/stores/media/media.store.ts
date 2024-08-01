import { defineStore } from 'pinia'
import { reactive } from 'vue'
import { TermImage } from '@/api/terms/terms.contracts'
import { MediaService } from '@/services'

export const useMediaStore = defineStore('media', () => {
	const state = reactive({
		media: [] as TermImage[],
	})

	// page
	// perPage
	async function loadMedia(query?: Record<string, any>) {
		state.media = await MediaService.getImages(query)
	}

	return {
		state,
		loadMedia,
	}
})