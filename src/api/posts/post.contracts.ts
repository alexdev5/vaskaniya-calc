export interface PostContract {
	id: number
	title: string
	content: string | null
	date: string
	excerpt: string
	postType: string
	categories: number[]
}

export interface UploadImageCommand {
	postId: number
	image: File
}