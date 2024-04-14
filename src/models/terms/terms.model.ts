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

export interface SettingsFormTerm {
    title: string
    description: string
    price?: number
    [key: string]: any
}