import { createApp } from 'vue'
import App from '@/App.vue'
import createRouter from '@/router'
import vuetify from '@/plugins/vuetify'
import { createPinia } from 'pinia'

import '@/styles/main.scss'

import contentCommon from '../dist/admin/content.json'

import {
    useContentStore,
} from '@/stores'

(async () => {
    const app = createApp(App)
    const router = createRouter()

    app.use(router)
    app.use(createPinia())

    // TODO: get content from server
    //const content = await ContentService.getContent()
    await useContentStore().setContent(contentCommon)

    app.use(vuetify)
    app.mount('#app')
})()


