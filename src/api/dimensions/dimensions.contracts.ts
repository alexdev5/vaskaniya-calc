import { Terms } from '@/models'
import { ImageContract, TaxonomyName } from '@/api/terms/terms.contracts'
import { PostContract } from '@/api/posts'

export interface DimensionsContract {
	taxonomy: TaxonomyName
	parent: ProductTypeContract
	productTypes: ProductTypeContract[]
	configurations: ConfigurationContract[]
	figures: PostContract[]
}

export interface ProductTypeContract {
	id: number
	slug: string
	name: string
	description?: string
	acf: Terms.Acf
}

export interface ConfigurationContract extends ProductTypeContract {
	productTypeParentId: number | null
}

export interface UpdateTermTitleCommand {
	termId: number,
	blockTitle: string,
	blockNumber: string,
}

export interface CreateFigureCommand {
	id?: number
	title?: string
	btnLabel: string
	taxonomy: string
	taxonomies: number[]
	area?: string // in m2
	description?: string
}

export interface PostFigureContract {
	id?: number
	title?: string
	btnLabel: string
	taxonomy: string
	taxonomies: number[]
	area?: string
	description?: string
	thumbnail: ImageContract | null
}