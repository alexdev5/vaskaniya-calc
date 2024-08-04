import { Terms } from '@/models'
import { ConfigurationContract, ProductTypeContract } from '@/api/dimensions'
import { Config } from '@/config'

export class TermState {
	id!: number
	slug!: string
	title!: string
	description: string = ''
	acf!: Terms.Acf
	productTypeParentId?: number | null
	imageDefault = '/img-placeholder.jpeg'
	thumbnailImageUrl: string = ''

	constructor(copy: ProductTypeContract | ConfigurationContract) {
		Object.assign(this, copy)

		this.thumbnailImageUrl = copy.acf.thumbnail?.url ?? Config.getApiImagesDir(this.imageDefault)
	}
}
