import { defineStore } from 'pinia'
import { reactive } from 'vue'
import { Media } from '@/models/terms/terms.contracts'
import { MediaService } from '@/services'

export const useMediaStore = defineStore('media', () => {
	const state = reactive({
		media: [] as Media[],
	})

	// page
	// perPage
	async function loadMedia(query?: Record<string, any>) {
		state.media = await MediaService.all(query)
	}

	return {
		state,
		loadMedia,
	}
})