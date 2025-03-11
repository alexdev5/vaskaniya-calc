import { ConfigurationContract } from '@/api/dimensions'
import { Config } from '@/config'
import { TermContracts } from '@/api'

export class TermState {
    id!: number
    slug!: string
    title!: string
    description: string = ''
    acf!: TermContracts.AcfContract
    productTypeParentId?: number | null
    imageDefault = '/img-placeholder.jpeg'
    thumbnailImageUrl: string = ''

    constructor(copy: TermContracts.TermContract | ConfigurationContract) {
        Object.assign(this, copy)

        this.thumbnailImageUrl =
            copy.acf.thumbnail?.url ?? Config.getApiImagesDir(this.imageDefault)
    }
}
