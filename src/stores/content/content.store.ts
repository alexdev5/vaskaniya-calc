import { defineStore } from 'pinia'
import { ref, readonly } from 'vue'

export const useContentStore = defineStore('content', () => {
	const content = ref({} as Content)

	async function setContent(payload: Content) {
		content.value = payload
	}

	return {
		setContent,
		content: readonly(content),
	}
})

export interface Content {
	common: { [key: string]: any }
}
