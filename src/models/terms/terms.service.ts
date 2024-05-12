export interface Image {
    id: number
    icon: string
    modified: string
    name: string
    url: string
}

export interface Acf {
    isHidden: boolean
    price: number | null
    thumbnail: Image | null
    relatedImage: Image | null
}

export interface CommonCategoryParams {
    termId: number
    title: string
    description: string
    price?: number
    [key: string]: any
}

export interface AddImagesParams {
    termId: number
    thumbnail?: object | null
    imageFull?: object | null
    relatedImage?: object | null
}

export enum ImageType {
    None,
    Thumbnail,
    ImageFull,
    RelatedImage,
}