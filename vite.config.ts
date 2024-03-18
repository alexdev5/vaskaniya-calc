import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

// https://vitejs.dev/config/
export default defineConfig({
  server: {
    host: '0.0.0.0',
    port: Number(process.env.VUE_APP_PORT || 60600),
  },
  build: {
    outDir: './dist/admin/app',
    rollupOptions: {
      output: {
        manualChunks: () => 'vascaniya-calc.js'
      }
    },
  },
  plugins: [vue()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src'),
      '@styles': path.resolve(__dirname, './src/styles'),
      '@admin': path.resolve(__dirname, './src/views/admin'),
      '@research': path.resolve(__dirname, './src/views/research'),
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: '' +
            '@import "@/styles/global/media"; ' +
            '@import "@/styles/global/variables";' +
            '@import "@/styles/mixins/index"; ' +
            '',
      },
    },
  },
})
