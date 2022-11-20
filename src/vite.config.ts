import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/vue/app.ts'],
      refresh: ['resources/views/**']
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false
        }
      }
    })
  ],
  resolve: {
    alias: {
      '@': '/resources/vue',
      '@api': '/resources/vue/api',
      '@components': '/resources/vue/components',
      '@pages': '/resources/vue/pages',
      '@router': '/resources/vue/router',
      '@utils': '/resources/vue/utils',
      '~': '/resources/assets',
      vue: 'vue/dist/vue.esm-bundler.js'
    }
  },
  server: {
    host: '0.0.0.0',
    hmr: {
      host: 'localhost'
    }
  }
})
