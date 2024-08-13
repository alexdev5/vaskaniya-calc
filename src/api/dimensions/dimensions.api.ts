import { AxiosApi } from '@/api/axios/axios.api'
import { CreateFigureCommand, DimensionsContract } from '@/api/dimensions/dimensions.contracts.ts'
import { UpdateTermCommand } from '@/api/terms'

export class DimensionsApi extends AxiosApi {
	public baseUrl = '/dimensions'

	async dimensions(): Promise<DimensionsContract> {
		return this.get(this.baseUrl)
	}

	async create(params: any) {
		return this.post(`${this.baseUrl}`, params)
	}

	async updateTerm(params: UpdateTermCommand) {
		return this.post(`${this.baseUrl}/update-term`, params)
	}

	// create-or-update
	async changeFigure(params: CreateFigureCommand) {
		return this.post(`${this.baseUrl}/change-figure`, params)
	}
}