import { ImageContract, TaxonomyName, UpdateTermCommand } from '@/api/terms/terms.contracts'


export interface TermFromFields extends Omit<UpdateTermCommand, 'termId'> {
	id?: number,
	slug?: string,
}

export interface Acf {
	isHidden: boolean
	price?: number
	thumbnail: ImageContract | null
	childBlockImage: ImageContract | null
	imageFullSize?: ImageContract | null
	lastChildBlockNumber: string
	lastChildBlockTitle: string
	lastChildBlockInfo: string
	blockNumber: string
	blockTitle: string
	blockInfo: string
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
	taxonomy: TaxonomyName
	title: string
	parentId?: number
}

export enum ProductTypeTermSlug {
	TableTops = 'table-tops',
	BarCounters = 'bar-counters',
	WindowSills = 'window-sills',
	Backsplashes = 'backsplashes',
	Washbasins = 'washbasins',
	ArtObject = 'art-object',
}