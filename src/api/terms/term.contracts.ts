import { ImageType } from '@/models/terms'

export interface TermContract {
    id: number
    slug: string
    name: string
    title: string
    description?: string
    acf: AcfContract
}

export interface AcfContract {
    isHidden: boolean
    price?: number
    thumbnail: ImageContract | null
    thumbnailActive: ImageContract | null
    childBlockImage: ImageContract | null
    imageFullSize?: ImageContract | null
    lastChildBlockNumber: string
    lastChildBlockTitle: string
    lastChildBlockInfo: string
    blockNumber: string
    blockTitle: string
    blockInfo: string
}

export interface MediaPageResponse {
    data: ImageContract[]
    total: number
    page: number
    perPage: number
}

export interface ImageContract {
    id: number
    name: string
    title: string
    fullName: string
    modified: string
    date: string
    url: string
    type?: ImageType
}

export interface UpdateTermCommand {
    termId: number
    title: string
    description?: string
    price?: number
    name: string
    thumbnail?: ImageContract[] // todo: remove
    thumbnailActive?: ImageContract[] // todo: remove
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
    name?: string
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
