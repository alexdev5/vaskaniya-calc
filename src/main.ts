import { createApp } from 'vue'
import App from '@/App.vue'
import createRouter from '@/router'
import vuetify from '@/plugins/vuetify'
import { createPinia } from 'pinia'

import '@/styles/main.scss'

(async () => {
	const app = createApp(App)
	const router = createRouter()

	app.use(router)
	app.use(createPinia())

	app.use(vuetify)
	app.mount('#app')
})()


