import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Router Module
import Dashboard from '../components/protected/Dashboard.vue';
import Categories from '../components/protected/categories/CategoriesList.vue';
import Experiences from '../components/protected/experiences/ExperiencesList.vue';
import Vendors from '../components/protected/vendors/VendorsList.vue';
import Clients from '../components/protected/clients/ClientsList.vue';

import PageNotFound from '../components/protected/PageNotFound.vue';


const router = new VueRouter({
    mode: 'history',
    routes : [
        {
            name : 'dashboard_home',
            path: 'admin',
            component: Dashboard,
        },
        {
            name : 'dashboard',
            path: '/admin/dashboard',
            component: Dashboard,
        },
        {
            name : 'experiences_list',
            path: '/admin/experiences',
            component: Experiences,
        },
        {
            name : 'categories_list',
            path: '/admin/categories',
            component: Categories,
        },
        {
            name : 'clients_list',
            path: '/admin/clients',
            component: Clients,
        },
        {
            name : 'vendors_list',
            path: '/admin/vendors',
            component: Vendors,
        },
        {
            name : 'company_detail',
            path: '/admin/company-detail',
            component: Vendors,
        },
        {
            name : 'page_not_found',
            path : '**',
            component : PageNotFound
        }
    ]
});

export default router;
