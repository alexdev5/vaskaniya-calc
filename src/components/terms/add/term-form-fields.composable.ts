import { ref } from 'vue'
import { TermFromFields } from '@/models/terms'

export function useTermFormFields() {
	const settingsForm = ref<TermFromFields | null>(null)

	return {
		settingsForm,
	}
}