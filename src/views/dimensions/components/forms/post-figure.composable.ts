import { ref } from 'vue'
import { CreateFigureCommand } from '@/api/dimensions'

export function usePostFigure() {
	const figureFields = ref<CreateFigureCommand>({
		id: undefined,
		title: undefined,
		btnLabel: '',
		taxonomies: [],
		area: undefined,
		description: undefined,
		thumbnailId: undefined,
		file: undefined,
	})

	function checkFigureFields() {
		// TODO: check required fields
		return true
	}

	return {
		figureFields,
		checkFigureFields,
	}
}