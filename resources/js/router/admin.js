import AdminLoginPage from '../pages/admin/AdminLoginPage.vue'
import AdminHomePage from '../pages/admin/AdminHomePage.vue'
import AdminRoomsPage from '../pages/admin/AdminRoomsPage.vue'
import AdminClientsPage from '../pages/admin/AdminClientsPage.vue'
import AdminEmployeesPage from '../pages/admin/AdminEmployeesPage.vue'
import AdminBookingsPage from '../pages/admin/AdminBookingsPage.vue'

const as = 'admin'

const routes = [
    { path: `/${as}/login`, component: AdminLoginPage, name: `${as}.login` },
    { path: `/${as}/home`, component: AdminHomePage, name: `${as}.home` },
    { path: `/${as}/rooms`, component: AdminRoomsPage, name: `${as}.rooms` },
    { path: `/${as}/clients`, component: AdminClientsPage, name: `${as}.clients` },
    { path: `/${as}/employees`, component: AdminEmployeesPage, name: `${as}.employees` },
    { path: `/${as}/bookings`, component: AdminBookingsPage, name: `${as}.bookings` },
]

export default routes
