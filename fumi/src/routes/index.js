import * as VueRouter from 'vue-router'
import LoginComponent from '@/views/auth/LoginComponent.vue'

const adminRoutes = [
    {path: 'home', component: () => import('@/views/admin/home/AdminHomeComponent.vue')},

    {path: 'clients', component: () => import('@/views/admin/clients/AdminClientsComponent.vue')},
    {path: 'clients/agregarComercio-clients', component: () => import('@/views/admin/clients/AdminAddClientsComponent.vue')},
    {path: 'clients/agregarParticular-clients', component: () => import('@/views/admin/clients/AdminAddParticularClientsComponent.vue')},
    {path: 'clients/edit-clients/:id', component: () => import('@/views/admin/clients/AdminEditClientsComponent.vue')},

    {path: 'works', component: () => import('@/views/admin/works/AdminWorksComponent.vue')},
    {path: 'worksComplete', component: () => import('@/views/admin/works/AdminWorksCompleteComponent.vue')},
    {path: 'worksComplete/:id', component: () => import('@/views/admin/works/AdminWorksCompleteIdComponent.vue')},
    {path: 'works/add-works/:id', component: () => import('@/views/admin/works/AdminAddWorksComponent.vue')},
    {path: 'works/complete-works/:id', component: () => import('@/views/admin/works/AdminCompleteWorksComponent.vue')},
    {path: 'works/edit-workComplete/:id', component: () => import('@/views/admin/works/AdminEditWorksCompleteComponent.vue')},

    {path: 'calendar', component: () => import('@/views/admin/calendar/AdminCalendarComponent.vue')},
    {path: 'calendar/complete', component: () => import('@/views/admin/calendar/AdminCalendarCompleteComponent.vue')},

    {path: 'admin', component: () => import('@/views/admin/admin/AdminAdminComponent.vue')},
    {path: 'admin/city', component: () => import('@/views/admin/admin/AdminCityComponent.vue')},
    {path: 'admin/cologne', component: () => import('@/views/admin/admin/AdminCologneComponent.vue')},
    {path: 'admin/settlements', component: () => import('@/views/admin/admin/AdminSettlementsComponent.vue')},
    {path: 'admin/clientsView', component: () => import('@/views/admin/admin/AdminClientsViewComponent.vue')},
    {path: 'admin/orderView', component: () => import('@/views/admin/admin/AdminOrderViewComponent.vue')},

    {path: 'certificate', component: () => import('@/views/admin/certificate/AdminCertificateViewComponent.vue')},
    {path: 'certificate/add-certificate/:id', component: () => import('@/views/admin/certificate/AdminAddCertificateComponent.vue')},
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