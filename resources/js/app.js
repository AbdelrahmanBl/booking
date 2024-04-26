// import './bootstrap';
// import "primevue/resources/themes/lara-light-indigo/theme.css";
import 'primeicons/primeicons.css'
import "primevue/resources/primevue.min.css";
import 'primevue/resources/themes/aura-light-green/theme.css'
import '../css/app.css'

import { createApp } from 'vue'
import PrimeVue from 'primevue/config';
import App from './App.vue'
import router from './router'

// Layouts
import AdminLayout from './components/layouts/AdminLayout.vue'
import ClientLayout from './components/layouts/ClientLayout.vue'
import GuestLayout from './components/layouts/GuestLayout.vue'

createApp(App)
.component('AdminLayout', AdminLayout)
.component('ClientLayout', ClientLayout)
.component('GuestLayout', GuestLayout)
.use(router)
.use(PrimeVue)
.mount('#app')

