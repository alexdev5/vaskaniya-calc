import { AxiosApi } from '@/api/axios'
import { Terms } from '@/models'
import { TermContracts } from '@/api'

export class TermApi extends AxiosApi {
	public baseUrl = '/terms'

	async addImages(params: Terms.AddImagesCommand) {
		return this.post(`${this.baseUrl}/add-images`, params, {
			headers: {
				'Content-Type': 'multipart/form-data',
			},
		})
	}

	async assignImage(params: Terms.AssignImageCommand) {
		return this.post(`${this.baseUrl}/assign-image`, params)
	}

	async changeVisible(termId: number, visible: boolean) {
		return this.post(`${this.baseUrl}/change-visible`, {
			termId,
			visible,
		})
	}

	async duplicate(id: number, taxonomy: string) {
		return this.post(`${this.baseUrl}/duplicate`, {
			id,
			taxonomy,
		})
	}

	async remove(id: number, taxonomy: string) {
		return this.post(`${this.baseUrl}/remove`, {
			id,
			taxonomy,
		})
	}

	async create(command: TermContracts.CreateTaxonomyCommand) {
		return this.post(`${this.baseUrl}/create`, command)
	}

	async updateSortIndex(command: TermContracts.UpdateSortIndexCommand) {
		return this.post(`${this.baseUrl}/update-sort-index`, command)
	}

	async updateInfoBlock(command: TermContracts.UpdateTermInfoBlockCommand) {
		return this.post(`${this.baseUrl}/update-info-block`, command)
	}

	async updateChildInfoBlock(command: TermContracts.UpdateTermChildInfoBlockCommand) {
		return this.post(`${this.baseUrl}/update-child-info-block`, command)
	}
}