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
    {
        path: '/profile',
        name: 'Profile',
        component: () => import('../views/Profile.vue')
    },
    {
        path: '/register',
        name: 'Register',
        component: () => import('../views/Register.vue')
    },
    {
        path: '/creation',
        name: 'Creation',
        component: () => import('../views/Creation.vue')
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import('../views/login.vue')
    },
]   

const router = createRouter({    
    history: createWebHistory(),
    routes
})

export default router