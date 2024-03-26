import * as VueRouter from 'vue-router'
import LoginComponent from '@/views/auth/LoginComponent.vue'

const adminRoutes = [
    {path: 'home', component: () => import('@/views/admin/home/AdminHomeComponent.vue')},
    {path: 'clients', component: () => import('@/views/admin/clients/AdminClientsComponent.vue')},
    {path: 'clients/add-clients', component: () => import('@/views/admin/clients/AdminAddClientsComponent.vue')},
    {path: 'works', component: () => import('@/views/admin/works/AdminWorksComponent.vue')},
]


const routes =[
    {path :'/auth/index',name :'index',component:LoginComponent},

    {path:'/admin',name:'admin-home',
    component: import('@/views/admin/layouts/AdminLayoutComponent.vue'),
    children: adminRoutes
    },

]

const router = VueRouter.createRouter({
    history:VueRouter.createWebHistory(),
    routes
})
export default router