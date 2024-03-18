import type { VuetifyOptions } from 'vuetify'

const theme: VuetifyOptions['theme'] = {
    themes: {
        light: {
            dark: false,
            colors: {
                'primary': '#1B1D1E',
                'secondary': '#82868b',
                'success': '#32783C',
                'info': '#2962FF'
            },
        },
        overrides: {
        },
    },
}

export default theme