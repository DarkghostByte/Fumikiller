import * as VueRouter from 'vue-router'
import LoginComponent from '@/views/auth/LoginComponent.vue'

const adminRoutes = [
    {path: 'home', component: () => import('@/views/admin/home/AdminHomeComponent.vue')},

    {path: 'clients', component: () => import('@/views/admin/clients/AdminClientsComponent.vue')},
    {path: 'clients/add-clients', component: () => import('@/views/admin/clients/AdminAddClientsComponent.vue')},
    {path: 'clients/edit-clients/:id', component: () => import('@/views/admin/clients/AdminEditClientsComponent.vue')},

    {path: 'works', component: () => import('@/views/admin/works/AdminWorksComponent.vue')},
    {path: 'works/add-works/:id', component: () => import('@/views/admin/works/AdminAddWorksComponent.vue')},
    {path: 'works/complete-works', component: () => import('@/views/admin/works/AdminCompleteWorksComponent.vue')},

    {path: 'calendar', component: () => import('@/views/admin/calendar/AdminCalendarComponent.vue')},
    {path: 'calendar/complete', component: () => import('@/views/admin/calendar/AdminCalendarCompleteComponent.vue')},



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