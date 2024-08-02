import { AxiosApi } from '@/api/axios'
import { Terms } from '@/models'
import { CreateTaxonomyCommand } from '@/api/terms/terms.contracts'

export class TermsApi extends AxiosApi {
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

	async duplicateTerm(parentTermId: number) {
		return this.post(`${this.baseUrl}/duplicate-term`, {
			parentTermId,
		})
	}

	async create(command: CreateTaxonomyCommand) {
		return this.post(`${this.baseUrl}/create`, command)
	}
}