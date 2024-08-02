import { DimensionsService, TermsService } from '@/services'
import { content } from '@/content'
import { computed, reactive } from 'vue'
import { UpdateTermCommand } from '@/api/terms'

export function useTerm(callback?: () => Promise<void>) {
	const progress = reactive({
		creating: false,
		changing: false,
		duplicating: false,
		removing: false,
		savingCardSettings: false,
	})

	const loading = computed(() =>
		progress.creating ||
		progress.changing ||
		progress.duplicating ||
		progress.removing ||
		progress.savingCardSettings,
	)

	async function changeVisibility(
		termId: number,
		visibility: boolean,
	) {
		progress.changing = true

		try {
			await TermsService.changeVisible(termId, visibility)

			if (callback) await callback()

			console.log(content.term.visibilityChangedSuccessfully)
		} catch (error) {
			console.log(error)
		} finally {
			progress.changing = false
		}
	}

	async function duplicateTerm(
		id: number,
		taxonomy: string,
	) {
		progress.duplicating = true

		try {
			await TermsService.duplicate(id, taxonomy)

			if (callback) await callback()

			console.log(content.term.visibilityChangedSuccessfully)
		} catch (error) {
			console.log(error)
		} finally {
			progress.duplicating = false
		}
	}

	async function removeTerm(
		id: number,
		taxonomy: string,
	) {
		progress.removing = true

		try {
			await TermsService.remove(id, taxonomy)

			if (callback) await callback()

			console.log(content.term.visibilityChangedSuccessfully)
		} catch (error) {
			console.log(error)
		} finally {
			progress.removing = false
		}
	}

	async function saveCardSettings(termId: number, formFields: UpdateTermCommand) {
		progress.savingCardSettings = true

		try {
			if (
				formFields.imageFullSize?.length ||
				formFields.thumbnail?.length ||
				formFields.childBlockImage?.length
			) {
				await TermsService.addImages({
					termId,
					imageFullSize: formFields.imageFullSize?.[0] ?? null,
					thumbnail: formFields.thumbnail?.[0] ?? null,
					childBlockImage: formFields.childBlockImage?.[0] ?? null,
				})
			}

			await DimensionsService.updateTerm({
				termId,
				title: formFields.title,
				description: formFields.description,
				price: formFields.price,
			})

			if (callback) await callback()

			console.log(content.notifications.updated)
		} catch (error: any) {
			console.error(error)
		} finally {
			progress.savingCardSettings = false
		}
	}

	return {
		progress,
		loading,
		removeTerm,
		saveCardSettings,
		duplicateTerm,
		changeVisibility,
	}
}