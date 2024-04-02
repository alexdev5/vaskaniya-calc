import { Terms } from '@/models'

export class DimensionTermState {
    id!: number
    slug!: string
    name!: string
    description: string = ''
    acf!: Terms.Acf
    productTypeParentId?: number | null

    constructor(copy: ProductTypeContract | ConfigurationContract) {
        Object.assign(this, copy)
    }
}

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

