import { ref } from 'vue'
import { TermFromFields } from '@/models/terms'

export function useTermSettingsForm() {
	const settingsForm = ref<TermFromFields | null>(null)

	return {
		settingsForm,
	}
}