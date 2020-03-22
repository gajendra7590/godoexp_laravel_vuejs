import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Router Module
import Dashboard from '../components/protected/Dashboard.vue';

import Categories from '../components/protected/categories/CategoriesList.vue';
import CategoriesForm from '../components/protected/categories/CategoriesForm.vue';

import Experiences from '../components/protected/experiences/ExperiencesList.vue';
import ExperiencesForm from '../components/protected/experiences/ExperienceForm.vue';

import Clients from '../components/protected/clients/ClientsList.vue';
import ClientsForm from '../components/protected/clients/ClientsForm.vue';

import Vendors from '../components/protected/vendors/VendorsList.vue';
import VendorsForm from '../components/protected/vendors/VendorsForm.vue';

import companyDetailForm from '../components/protected/company/companyDetailForm.vue';

import ChangePassword from '../components/protected/profile/ChangePassword.vue';
import Profile from '../components/protected/profile/Profile.vue';
import Logout from '../components/protected/Logout.vue';

import PageNotFound from '../components/protected/PageNotFound.vue';


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes : [
        {
            name : 'dashboard',
            path: '/admin/dashboard',
            component: Dashboard,
        },
        {
            name : 'adminProfile',
            path: '/admin/profile',
            component: Profile,
        },
        {
            name : 'changePassword',
            path: '/admin/change-password',
            component: ChangePassword,
        },
        {
            name : 'adminLogout',
            path: '/admin/logout',
            component: Logout,
        },
        {
            name : 'experiences_list',
            path: '/admin/experiences',
            component: Experiences,
        },
        {
            name : 'experiences_add',
            path : '/admin/experiences/add',
            component : ExperiencesForm
        },
        {
            name : 'experiences_edit',
            path : '/admin/experiences/edit/:id',
            component : ExperiencesForm
        },
        {
            name : 'categories_list',
            path: '/admin/categories',
            component: Categories,
        },
        {
            name : 'categories_add',
            path : '/admin/categories/add',
            component : CategoriesForm
        },
        {
            name : 'categories_edit',
            path : '/admin/categories/edit/:id',
            component : CategoriesForm
        },
        {
            name : 'clients_list',
            path: '/admin/clients',
            component: Clients,
        },
        {
            name : 'clients_add',
            path: '/admin/clients/add',
            component: ClientsForm,
        },
        {
            name : 'clients_edit',
            path: '/admin/clients/edit/:id',
            component: ClientsForm,
        },
        {
            name : 'vendors_list',
            path: '/admin/vendors',
            component: Vendors,
        },
        {
            name : 'vendors_add',
            path: '/admin/vendors/add',
            component: VendorsForm,
        },
        {
            name : 'vendors_edit',
            path: '/admin/vendors/edit/:id',
            component: VendorsForm,
        },
        {
            name : 'company_detail',
            path: '/admin/company-detail',
            component: companyDetailForm,
        },
        {
            name : 'page_not_found',
            path : '**',
            component : PageNotFound
        }
    ]
});

export default router;
