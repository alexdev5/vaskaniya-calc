import { AxiosApi } from '@/api/axios'
import { AddImagesParams } from '@/models/terms'

export class TermsApi extends AxiosApi {
    public baseUrl = '/terms'

    async addImages(params: AddImagesParams) {
        return this.post(`${this.baseUrl}/add-images`, params, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
    }
}