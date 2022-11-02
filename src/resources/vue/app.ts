import './plugins'
import { createApp } from 'vue'
import MainApp from './MainApp.vue'
import router from './router'

const targetElement = document.getElementById('app')

if (targetElement) {
  const app = createApp(MainApp)
  app.use(router)
  app.mount(targetElement)
}
