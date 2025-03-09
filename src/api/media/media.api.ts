import { AxiosApi } from '@/api/axios'
import { MediaPageResponse } from '@/api/terms/term.contracts.ts'

export class MediaApi extends AxiosApi {
    public baseUrl = '/media'

    async getImages(query?: Record<string, any>): Promise<MediaPageResponse> {
        return this.get(`${this.baseUrl}/all`, query)
    }
}
