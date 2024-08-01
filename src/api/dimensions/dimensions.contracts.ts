import { Terms } from '@/models'
import { TaxonomyName } from '@/api/terms/terms.contracts'

export interface DimensionsContract {
	taxonomy: TaxonomyName
	parent: ProductTypeContract
	productTypes: ProductTypeContract[]
	configurations: ConfigurationContract[]
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