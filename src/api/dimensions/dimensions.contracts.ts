import { PostContracts, TermContracts } from '@/api'

export interface DimensionsContract {
    taxonomy: TermContracts.TaxonomyName
    parentTerm: TermContracts.TermContract
    productTypes: TermContracts.TermContract[]
    configurations: ConfigurationContract[]
    figures: PostContracts.PostContract[]
}

export interface ConfigurationContract extends TermContracts.TermContract {
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
