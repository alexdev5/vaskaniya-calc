import { TermContracts } from '@/api'

export interface TermFromFields
    extends Omit<TermContracts.UpdateTermCommand, 'termId'> {
    id?: number
    slug?: string
}

export interface AddImagesCommand {
    termId: number
    thumbnail?: object | null
    imageFullSize?: object | null
    childBlockImage?: object | null
    thumbnailActive?: object | null
}

export interface AssignImagesCommand {
    termId: number
    thumbnailId?: number | null
    imageFullSizeId?: number | null
    childBlockImageId?: number | null
    thumbnailActiveId?: number | null
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
    ThumbnailActive,
}

export interface CreateTermInDrawerParams {
    taxonomy: TermContracts.TaxonomyName
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
