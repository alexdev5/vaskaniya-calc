import axios from 'axios'
import { configConstants } from '@/config'

//axios.defaults.withCredentials = true

export abstract class AxiosApi {
	public apiBaseUrl = configConstants.baseApiURL + '/wp-json/vs-calculator/v1'

	protected async post(url: string, fields: any, config?: any): Promise<any> {
		return (
			await this.axios({
				method: 'post',
				url: `${this.apiBaseUrl}${url}`,
				...{ data: fields },
				...config,
			})
		).data
	}

	protected async put(url: string, fields: any, config?: any): Promise<any> {
		return (
			await this.axios({
				method: 'put',
				url: `${this.apiBaseUrl}${url}`,
				...{ data: fields },
				...config,
			})
		).data
	}

	protected async get(url: string, fields: any = {}, config?: any): Promise<any> {
		return (
			await this.axios({
				method: 'get',
				url: `${this.apiBaseUrl}${url}`,
				params: fields,
				...config,
			})
		).data
	}

	protected async delete(url: string, fields: any = {}, config?: any): Promise<any> {
		return (
			await this.axios({
				method: 'delete',
				url: `${this.apiBaseUrl}${url}`,
				...{ data: fields },
				...config,
			})
		).data
	}

	get axios() {
		const axiosModule = axios.create({
			baseURL: this.apiBaseUrl,
		})
		/* axiosModule.interceptors.request.use(async (config: any) => {
			 if(AuthService.isValidToken) {
				 config.headers['Accept'] = 'application/json'
				 config.headers['Authorization'] = `Bearer ${AuthService.getToken()}`
			 } else {
				 //AuthService.removeTokens()
			 }
			 return config
		 })

		 axiosModule.interceptors.response.use(async (config: any) => {
			 if(AuthService.isValidToken) {
				 config.headers['Accept'] = 'application/json'
				 config.headers['Authorization'] = `Bearer ${AuthService.getToken()}`
			 }

			 return config
		 }, async (error: any) => {
			 if(error.response.status === 401) {
				 AuthService.logout()
			 }

			 return Promise.reject(error)
		 })*/

		return axiosModule
	}
}