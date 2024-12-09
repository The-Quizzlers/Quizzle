import { createApp } from 'vue'
import App from './views/App.vue'
import './index.css'
import router from './router/index.js'

createApp(App).use(router).mount('#app')
