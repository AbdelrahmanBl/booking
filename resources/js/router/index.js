import { createWebHistory, createRouter } from 'vue-router'

import ClientRoutes from './client'
import AdminRoutes from './admin'
import GuestRoutes from './guest'
import AuthHelper from '../helpers/AuthHelper'

const routes = [
    ...ClientRoutes,
    ...AdminRoutes,
    ...GuestRoutes,
    {
        path: '/:notFound(.*)',
        name: 'page404',
        component: () => import('../pages/errors/404.vue'),
    }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

router.beforeEach((to, from, next) => {
    // handle none authed routes...
    if(to.meta.auth === undefined) {
        next()
    }
    // handle authed user hitting none authed route...
    else if(AuthHelper.isAuthUser() && ! to.meta.auth) {
        AuthHelper.isAuthAdminOrEmployee()
        ? next({ name: 'admin.home' })
        : next({ name: 'client.home' })
    }
    // handle authed user hitting invalid authed route...
    else if(AuthHelper.isAuthUser() && to.meta.auth) {
        if(to.name.search('admin.') > -1 && AuthHelper.isAuthClient()) {
            next({ name: 'client.home' })
        }
        else if(to.name.search('client.') > -1 && AuthHelper.isAuthAdminOrEmployee()) {
            next({ name: 'admin.home' })
        }
        else {
            next()
        }
    }
    // handle guest user hitting authed route...
    else if(AuthHelper.isGuestUser() && to.meta.auth) {
        to.name.search('admin.') > -1
        ? next({ name: 'admin.login' })
        : next({ name: 'client.login' })
    }
    else {
        next()
    }
})

export default router
