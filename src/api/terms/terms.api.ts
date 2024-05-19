import { AxiosApi } from '@/api/axios'
import { Terms } from '@/models'

export class TermsApi extends AxiosApi {
    public baseUrl = '/terms'

    async addImages(params: Terms.AddImagesParams) {
        return this.post(`${this.baseUrl}/add-images`, params, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
    }

    async assignImage(params: Terms.AssignImageParams) {
        return this.post(`${this.baseUrl}/assign-image`, params)
    }
}