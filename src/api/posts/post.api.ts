import { AxiosApi } from '@/api/axios'

export class PostApi extends AxiosApi {
	public baseUrl = '/posts'

	async uploadImage(postId: number, image: File) {
		return this.post(`${this.baseUrl}/upload-image`, {
				postId,
				image,
			},
			{
				headers: {
					'Content-Type': 'multipart/form-data',
				},
			},
		)
	}

	async assignImage(postId: number, imageId: number) {
		return this.post(`${this.baseUrl}/assign-image`, {
			postId,
			imageId,
		})
	}

	async removeImage(postId: number) {
		return this.post(`${this.baseUrl}/remove-image`, {
			postId,
		})
	}
}