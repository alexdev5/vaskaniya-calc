import { AxiosApi } from '@/api/axios/axios.api'

export class DimensionsApi extends AxiosApi {
    public baseUrl = '/dimensions'

    async dimensions() {
        return this.get(this.baseUrl + '/dimensions')
    }

    async create(params: any) {
        return this.post(`${this.baseUrl}`, params)
    }
}