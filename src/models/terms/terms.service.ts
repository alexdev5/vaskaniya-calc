export interface Image {
	id: number
	icon: string
	modified: string
	name: string
	fullName: string
	url: string
}

export interface CommonCategoryParams {
	termId: number
	title: string
	description?: string
	price?: number
	thumbnail?: Image[]
	childBlockImage?: Image[]
	imageFullSize?: Image[]
	isVisible?: boolean

	[key: string]: any
}

export interface TermFromFields extends Omit<CommonCategoryParams, 'termId'> {

}

export interface Acf {
	isVisible: boolean
	price?: number
	thumbnail: Image | null
	childBlockImage: Image | null
	imageFullSize?: Image | null
	childBlockNumber: string
	childBlockTitle: string
	blockNumber: string
	blockTitle: string
}

export interface AddImagesCommand {
	termId: number
	thumbnail?: object | null
	imageFullSize?: object | null
	childBlockImage?: object | null
}

export interface AssignImageCommand {
	termId: number
	imageId: number | null
	type: ImageType
}

export enum ImageType {
	None,
	Thumbnail,
	ImageFullSize,
	ChildBlockImage,
}

export interface CreateTermInDrawerParams {
	taxonomy: string
	title: string
	parentId?: number
}