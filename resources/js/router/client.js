import ClientBookingsPage from '../pages/client/ClientBookingsPage.vue'
import ClientLoginPage from '../pages/client/ClientLoginPage.vue'
import ClientRegisterPage from '../pages/client/ClientRegisterPage.vue'

const as = 'client'

const routes = [
  { path: '/home', component: ClientBookingsPage, name: `${as}.home` },
  { path: '/login', component: ClientLoginPage, name: `${as}.login` },
  { path: '/register', component: ClientRegisterPage, name: `${as}.register` },
]

export default routes
