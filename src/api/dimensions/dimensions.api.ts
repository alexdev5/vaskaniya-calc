import { AxiosApi } from '@/api/axios/axios.api'
import { DimensionsContract } from '@/api/dimensions/dimensions.contracts.ts'
import { CommonCategoryParams } from '@/models/terms'

export class DimensionsApi extends AxiosApi {
    public baseUrl = '/dimensions'

    async dimensions(): Promise<DimensionsContract> {
        return this.get(this.baseUrl)
    }

    async create(params: any) {
        return this.post(`${this.baseUrl}`, params)
    }

    async updateTerm(params: CommonCategoryParams) {
        return this.post(`${this.baseUrl}/update-term`, params)
    }

}