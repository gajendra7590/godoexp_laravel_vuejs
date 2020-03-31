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

import Login from '../components/public/Login.vue';
import ForgotPassword from '../components/public/ForgotPassword.vue';

import Logout from '../components/protected/Logout.vue';

import PageNotFound from '../components/protected/PageNotFound.vue';


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes : [
        {
            name : 'adminLogin',
            path: '/admin/login',
            component: Login,
            meta: { requiresVisitor: true }
        },
        {
            name : 'adminForgotPassword',
            path: '/admin/forgot-password',
            component: ForgotPassword,
            meta: { requiresVisitor: true }
        },
        {
            name : 'adminRegister',
            path: '/admin/dashboard',
            component: Dashboard,
            meta: { requiresAuth: true }
        },
        {
            name : 'dashboard',
            path: '/admin/dashboard',
            component: Dashboard,
            meta: { requiresAuth: true }
        },
        {
            name : 'adminProfile',
            path: '/admin/profile',
            component: Profile,
            meta: { requiresAuth: true }
        },
        {
            name : 'changePassword',
            path: '/admin/change-password',
            component: ChangePassword,
            meta: { requiresAuth: true }
        },
        {
            name : 'adminLogout',
            path: '/admin/logout',
            component: Logout,
            meta: { requiresAuth: true }
        },
        {
            name : 'experiences_list',
            path: '/admin/experiences',
            component: Experiences,
            meta: { requiresAuth: true }
        },
        {
            name : 'experiences_add',
            path : '/admin/experiences/add',
            component : ExperiencesForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'experiences_edit',
            path : '/admin/experiences/edit/:id',
            component : ExperiencesForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'categories_list',
            path: '/admin/categories',
            component: Categories,
            meta: { requiresAuth: true }
        },
        {
            name : 'categories_add',
            path : '/admin/categories/add',
            component : CategoriesForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'categories_edit',
            path : '/admin/categories/edit/:id',
            component : CategoriesForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'clients_list',
            path: '/admin/clients',
            component: Clients,
            meta: { requiresAuth: true }
        },
        {
            name : 'clients_add',
            path: '/admin/clients/add',
            component: ClientsForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'clients_edit',
            path: '/admin/clients/edit/:id',
            component: ClientsForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'vendors_list',
            path: '/admin/vendors',
            component: Vendors,
            meta: { requiresAuth: true }
        },
        {
            name : 'vendors_add',
            path: '/admin/vendors/add',
            component: VendorsForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'vendors_edit',
            path: '/admin/vendors/edit/:id',
            component: VendorsForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'company_detail',
            path: '/admin/company-detail',
            component: companyDetailForm,
            meta: { requiresAuth: true }
        },
        {
            name : 'page_not_found',
            path : '**',
            component : PageNotFound,
            meta: { requiresAuth: true }
        }
    ]
});

router.beforeResolve((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!(!!localStorage.getItem('token'))) {
        window.location.href = '/admin/login';
      } else {
        next()
      }
    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
      if ((!!localStorage.getItem('token'))) {
        window.location.href = '/admin/home';
      } else {
         next()
      }
    }
    else {
      next() // make sure to always call next()!
    }
  })

export default router;
