import { createApp } from 'vue'
import App from './views/App.vue'
import './index.css'
import router from './router/index.js'
import axios from 'axios'

createApp(App).use(router).mount('#app')
