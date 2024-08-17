import { AxiosApi } from '@/api/axios'
import { EdgeContract } from '@/api/edges/edge.contracts.ts'

export class EdgeApi extends AxiosApi {
	public baseUrl = '/edges'

	async edges(): Promise<EdgeContract> {
		return this.get(this.baseUrl)
	}
}