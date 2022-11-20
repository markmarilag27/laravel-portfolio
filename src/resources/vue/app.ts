import './plugins'
import { createApp } from 'vue'
import MainApp from './MainApp.vue'
import router from './router'
import { VueQueryPlugin } from '@tanstack/vue-query'

const targetElement = document.getElementById('app')

if (targetElement) {
  const app = createApp(MainApp)
  app.use(VueQueryPlugin)
  app.use(router)
  router.isReady().then(() => app.mount(targetElement))
}
