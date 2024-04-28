import ClientBookingsPage from '../pages/client/ClientBookingsPage.vue'
import ClientLoginPage from '../pages/client/ClientLoginPage.vue'
import ClientRegisterPage from '../pages/client/ClientRegisterPage.vue'

const as = 'client'

const routes = [
  { path: '/home', component: ClientBookingsPage, name: `${as}.home`, meta: { auth: true } },
  { path: '/login', component: ClientLoginPage, name: `${as}.login`, meta: { auth: false } },
  { path: '/register', component: ClientRegisterPage, name: `${as}.register`, meta: { auth: false } },
]

export default routes
