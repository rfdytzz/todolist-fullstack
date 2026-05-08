import Home from '@/views/Home.vue'
import Todolist from '@/views/Todolist.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', component: Home},
    { path: '/todolist', component: Todolist},
  ],
})

export default router
