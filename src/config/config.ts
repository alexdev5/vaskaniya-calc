const baseApiURL = 'https://st.wooh.cc'
const apiDistDir = baseApiURL + '/wp-content/plugins/vaskaniya-calc/dist'

export const configConstants = {
	baseApiURL,
	apiDistDir,
	apiAssetsDir: apiDistDir + '/assets',
	apiImagesDir: apiDistDir + '/assets/images',
}

export class Config {
	static getApiImagesDir(url?: string) {
		if (url) return configConstants.apiImagesDir + url

		return configConstants.baseApiURL + configConstants.apiImagesDir
	}
}