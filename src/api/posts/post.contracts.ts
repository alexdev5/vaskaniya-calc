import { ImageContract } from '@/api/terms'

export interface PostContract {
	id: number
	title: string
	content: string | null
	date: string
	excerpt: string
	postType: string
	thumbnail: ImageContract | null
	taxonomies: number[]
	acf: PostAcfContract | null
}

export interface PostAcfContract {
	btnLabel: string
	notification: string | null
}

export interface UploadImageCommand {
	postId: number
	image: File
}