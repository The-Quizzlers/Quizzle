import {createRouter, createWebHistory} from 'vue-router'
import Home from '../views/Home.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/quiz',
        name: 'Quiz',
        component: () => import('../views/Quiz.vue')
    },
]   

const router = createRouter({    
    history: createWebHistory(),
    routes
})

export default router