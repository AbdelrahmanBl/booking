import { createWebHistory, createRouter } from 'vue-router'

import ClientRoutes from './client'
import AdminRoutes from './admin'
import GuestRoutes from './guest'

const routes = [
    ...ClientRoutes,
    ...AdminRoutes,
    ...GuestRoutes,
//   { path: '/about', component: AboutView, name: 'about' },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
