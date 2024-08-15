import { dimensionsApi, termsApi } from '@/services'
import { content } from '@/content'
import { computed, reactive } from 'vue'
import { UpdateSortIndexCommand, UpdateTermCommand } from '@/api/terms'

export function useTerm(callback?: () => Promise<void>) {
	const progress = reactive({
		creating: false,
		changing: false,
		duplicating: false,
		removing: false,
		savingCardSettings: false,
		moving: false,
	})

	const loading = computed(() =>
		progress.creating ||
		progress.changing ||
		progress.duplicating ||
		progress.removing ||
		progress.moving ||
		progress.savingCardSettings,
	)

	async function changeVisibility(
		termId: number,
		visibility: boolean,
	) {
		progress.changing = true

		try {
			await termsApi.changeVisible(termId, visibility)

			if (callback) await callback()

			console.log(content.common.term.visibilityChangedSuccessfully)
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
			await termsApi.duplicate(id, taxonomy)

			if (callback) await callback()

			console.log(content.common.term.visibilityChangedSuccessfully)
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
			await termsApi.remove(id, taxonomy)

			if (callback) await callback()

			console.log(content.common.term.visibilityChangedSuccessfully)
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
				await termsApi.addImages({
					termId,
					imageFullSize: formFields.imageFullSize?.[0] ?? null,
					thumbnail: formFields.thumbnail?.[0] ?? null,
					childBlockImage: formFields.childBlockImage?.[0] ?? null,
				})
			}

			await dimensionsApi.updateTerm({
				termId,
				title: formFields.title,
				description: formFields.description,
				price: formFields.price,
			})

			if (callback) await callback()

			console.log(content.common.notifications.updated)
		} catch (error: any) {
			console.error(error)
		} finally {
			progress.savingCardSettings = false
		}
	}

	async function dragTerm(element: any, params: Omit<UpdateSortIndexCommand, 'id' | 'sortIndex'>) {
		if (!Number(element.item.dataset.id)) throw new Error('data-id is empty')

		progress.moving = true

		try {
			await termsApi.updateSortIndex({
				id: Number(element.item.dataset.id),
				sortIndex: element.newIndex,
				parentId: params.parentId,
				taxonomy: params.taxonomy,
			})
		} catch (error) {
			console.log(error)
		} finally {
			progress.moving = false
		}
	}

	return {
		progress,
		loading,
		removeTerm,
		saveCardSettings,
		duplicateTerm,
		changeVisibility,
		dragTerm,
	}
}