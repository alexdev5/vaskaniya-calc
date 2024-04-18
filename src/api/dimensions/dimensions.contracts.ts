import { Terms } from '@/models'

export interface DimensionsContract {
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
