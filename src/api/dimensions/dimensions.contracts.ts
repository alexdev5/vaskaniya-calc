import { Terms } from '@/models'

export interface DimensionsContract {
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

export interface UpdateParentTitleCommand {
    termId: number,
    title: string,
    titleNumber: string,
}