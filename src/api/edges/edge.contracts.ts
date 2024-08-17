import { PostContracts, TermContracts } from '@/api'

export interface EdgeContract {
	taxonomy: TermContracts.TaxonomyName,
	plinthTypes: TermContracts.TermContract[]
	tableThickness: TermContracts.TermContract[]
	frontEdgeViews: PostContracts.PostContract[]
}