import MainPage from '../pages/guest/MainPage.vue'
import RoomPage from '../pages/guest/RoomPage.vue'

const as = 'guest'

const routes = [
  { path: '/', component: MainPage, name: `${as}.main` },
  { path: '/rooms/:room', component: RoomPage, name: `${as}.rooms.show` },
]

export default routes
