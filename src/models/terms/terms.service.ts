export interface Image {
    id: number
    icon: string
    modified: string
    name: string
    fullName: string
    url: string
}

export interface CommonCategoryParams {
    termId: number
    title: string
    description?: string
    price?: number
    thumbnail?: Image[]
    relatedImage?: Image[]
    imageFullSize?: Image[]
    isHidden?: boolean
    [key: string]: any
}

export interface Acf {
    isHidden: boolean
    price?: number
    thumbnail: Image | null
    relatedImage: Image | null
    imageFullSize?: Image | null
}

export interface AddImagesParams {
    termId: number
    thumbnail?: object | null
    imageFullSize?: object | null
    relatedImage?: object | null
}

export interface AssignImageParams {
    termId: number
    imageId: number
    type: ImageType
}

export enum ImageType {
    None,
    Thumbnail,
    ImageFullSize,
    RelatedImage,
}