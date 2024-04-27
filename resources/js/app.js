// import './bootstrap';
// import "primevue/resources/themes/lara-light-indigo/theme.css";
import 'primeicons/primeicons.css'
import "primevue/resources/primevue.min.css";
import 'primevue/resources/themes/aura-light-blue/theme.css'
import '../css/app.css'

import { createApp } from 'vue'
import PrimeVue from 'primevue/config';
import App from './App.vue'
import router from './router'

// Layouts
import AdminLayout from './components/layouts/AdminLayout.vue'
import GuestLayout from './components/layouts/GuestLayout.vue'

createApp(App)
.component('AdminLayout', AdminLayout)
.component('GuestLayout', GuestLayout)
.mixin({
    methods: {
        asset(path) {
            return location.origin + '/' + path
        }
    }
})
.use(router)
.use(PrimeVue)
.mount('#app')

