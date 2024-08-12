export interface TermImage {
	id: number
	title: string
	fullName: string
	url: string
}

export interface ImageContract {
	id: number
	icon: string
	modified: string
	name: string
	fullName: string
	url: string
}

export interface UpdateTermCommand {
	termId: number
	title: string
	description?: string
	price?: number
	thumbnail?: ImageContract[] // todo: remove
	childBlockImage?: ImageContract[] // todo: remove
	imageFullSize?: ImageContract[] // todo: remove
	isHidden?: boolean

	[key: string]: any
}

export enum TaxonomyName {
	Tags = 'vs-products-tags',
	Categories = 'vs-products-categories',
	CategoryStone = 'vs-products-category-stone',
}

export interface CreateTaxonomyCommand {
	title: string
	taxonomy: string
	parentId?: number
	description?: string
	price?: number
}

export interface UpdateSortIndexCommand {
	id: number
	parentId: number
	sortIndex: number
	taxonomy: string
}

export interface UpdateTermInfoBlockCommand {
	id: number
	taxonomy: TaxonomyName
	number: number
	title: string
	info?: string
}

export interface UpdateTermChildInfoBlockCommand {
	id: number
	taxonomy: TaxonomyName
	childNumber: number
	childTitle: string
	childInfo?: string
}