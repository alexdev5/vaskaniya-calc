import { ref } from 'vue'
import { CreateFigureCommand } from '@/api/dimensions'
import { PostContract } from '@/api/posts'

export function usePostFigure() {
	const figureFields = ref<CreateFigureCommand>({
		title: '',
		btnLabel: '',
		taxonomy: '',
		taxonomies: [] as number[],
		area: undefined,
		notification: undefined,
	})

	function checkFigureFields() {
		// TODO: check required fields
		return true
	}

	function getBaseInputs(currentFigure: PostContract) {
		return {
			btnLabel: figureFields.value.btnLabel,
			title: currentFigure.title,
			notification: figureFields.value.notification, // acf
			area: figureFields.value.area, // acf
		}
	}

	return {
		figureFields,
		checkFigureFields,
		getBaseInputs,
	}
}