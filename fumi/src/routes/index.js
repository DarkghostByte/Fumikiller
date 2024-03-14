import * as VueRouter from 'vue-router'
import LoginComponent from '@/views/auth/LoginComponent.vue'

const routes =[
    {path :'/auth/index',name :'index',component:LoginComponent}
]

const router = VueRouter.createRouter({
    history:VueRouter.createWebHistory(),
    routes
})
export default router