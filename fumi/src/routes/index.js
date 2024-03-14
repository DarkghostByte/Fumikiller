import * as VueRouter from 'vue-router'

const routers =[
    {path :'/auth/index',name :'index',component:()=>import('@/views/auth/LoginComponent.vue')}
]

const router = VueRouter.createRouter({
    history:VueRouter.createWebHistory(),
    routes
})
export default router