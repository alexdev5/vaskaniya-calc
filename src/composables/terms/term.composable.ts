import { TermsService } from '@/services'
import { content } from '@/content'

export function useTerm() {
	async function createTerm() {

	}

	async function changeVisibility(
		termId: number,
		visibility: boolean,
		callback?: () => Promise<void>,
	) {
		try {
			await TermsService.changeVisible(termId, visibility)

			if (callback) await callback()

			console.log(content.term.visibilityChangedSuccessfully)
		} catch (error) {
			console.log(error)
		} finally {

		}
	}

	async function duplicateTerm(
		parentTermId: number,
		callback?: () => Promise<void>,
	) {
		try {
			await TermsService.duplicateTerm(parentTermId)

			if (callback) await callback()

			console.log(content.term.visibilityChangedSuccessfully)
		} catch (error) {
			console.log(error)
		} finally {

		}
	}

	return {
		createTerm,
		duplicateTerm,
		changeVisibility,
	}
}