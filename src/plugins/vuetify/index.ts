import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import '@/styles/plugins/vuetify/index.scss'

import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import theme from './theme'


export default createVuetify({
  components,
  defaults: {
    VBtn: {

    },
    VSelect: {
      variant: 'outlined',
      density: 'compact',
      color: 'primary',
      hideDetails: 'auto',
      VChip: {
        color: 'primary',
        label: true,
      },
    },
  },
  directives,
  theme,
})