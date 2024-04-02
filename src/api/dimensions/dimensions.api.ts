import { AxiosApi } from '@/api/axios/axios.api'
import * as Dimensions from '@/models/dimensions'

export class DimensionsApi extends AxiosApi {
    public baseUrl = '/dimensions'

    async dimensions(): Promise<Dimensions.DimensionsContract> {
        return this.get(this.baseUrl + '/dimensions')
    }

    async create(params: any) {
        return this.post(`${this.baseUrl}`, params)
    }
}