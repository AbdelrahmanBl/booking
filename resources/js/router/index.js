import { createWebHistory, createRouter } from 'vue-router'

import GuestRoutes from './guest'

const routes = [
    ...GuestRoutes,
//   { path: '/about', component: AboutView, name: 'about' },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
