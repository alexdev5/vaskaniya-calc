import { PostContracts, TermContracts } from '@/api'

export interface EdgeContract {
	taxonomy: TermContracts.TaxonomyName,
	plinthType: EdgePlinthType
	tableThickness: EdgeTableThickness
	frontEdgeViews: PostContracts.PostContract[]
}

export interface EdgePlinthType extends TermContracts.TermContract {
	children: TermContracts.TermContract[]
}

export interface EdgeTableThickness extends TermContracts.TermContract {
	children: TermContracts.TermContract[]
}