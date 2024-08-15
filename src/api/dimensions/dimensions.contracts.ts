import { Terms } from '@/models'
import { TaxonomyName } from '@/api/terms'
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

export interface CreateFigureCommand {
	title?: string
	btnLabel: string
	taxonomy: string
	taxonomies: number[]
	area?: string // in m2
	notification?: string
}

export interface UpdateFigureCommand {
	id: number
	title?: string
	btnLabel: string
	area?: string // in m2
	notification?: string
}