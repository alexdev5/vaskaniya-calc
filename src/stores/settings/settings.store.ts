import { defineStore } from 'pinia'
import { reactive } from 'vue'

export const useSettingsStore = defineStore('settings', () => {
	const state = reactive({
		showHiddenFieldsInCard: false,
	})

	return {
		state,
	}
})