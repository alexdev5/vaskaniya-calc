import { Terms } from '@/models'
import { ConfigurationContract, ProductTypeContract } from '@/api/dimensions'

export class TermState {
	id!: number
	slug!: string
	title!: string
	description: string = ''
	acf!: Terms.Acf
	productTypeParentId?: number | null

	constructor(copy: ProductTypeContract | ConfigurationContract) {
		Object.assign(this, copy)
	}
}
