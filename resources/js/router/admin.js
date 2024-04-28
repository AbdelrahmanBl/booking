import AdminLoginPage from '../pages/admin/AdminLoginPage.vue'
import AdminHomePage from '../pages/admin/AdminHomePage.vue'
import AdminRoomsPage from '../pages/admin/AdminRoomsPage.vue'
import AdminClientsPage from '../pages/admin/AdminClientsPage.vue'
import AdminEmployeesPage from '../pages/admin/AdminEmployeesPage.vue'
import AdminBookingsPage from '../pages/admin/AdminBookingsPage.vue'

const as = 'admin'

const routes = [
    { path: `/${as}`, redirect: `/${as}/login` },
    { path: `/${as}/login`, component: AdminLoginPage, name: `${as}.login`, meta: { auth: false } },
    { path: `/${as}/home`, component: AdminHomePage, name: `${as}.home`, meta: { auth: true } },
    { path: `/${as}/rooms`, component: AdminRoomsPage, name: `${as}.rooms`, meta: { auth: true } },
    { path: `/${as}/clients`, component: AdminClientsPage, name: `${as}.clients`, meta: { auth: true } },
    { path: `/${as}/employees`, component: AdminEmployeesPage, name: `${as}.employees`, meta: { auth: true } },
    { path: `/${as}/bookings`, component: AdminBookingsPage, name: `${as}.bookings`, meta: { auth: true } },
]

export default routes
