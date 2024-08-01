import { AxiosApi } from '@/api/axios'

export class MediaApi extends AxiosApi {
	public baseUrl = '/media'

	async getImages(query?: Record<string, any>) {
		return this.get(`${this.baseUrl}/all`, query)
	}
}