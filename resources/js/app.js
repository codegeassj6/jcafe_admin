import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue'
import routes  from './routes'
import './helpers/axiosSetup'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'


const app = createApp(App)
app.use(routes).use(createPinia().use(piniaPluginPersistedstate)).mount('#app')
