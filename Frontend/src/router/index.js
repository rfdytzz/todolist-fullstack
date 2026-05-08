import Create from '@/views/Create.vue'
import Home from '@/views/Home.vue'
import Todolist from '@/views/Todolist.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', component: Home},
    { path: '/todolist', component: Todolist},
    { path: '/todolist/create', component: Create},
  ],
})

export default router
