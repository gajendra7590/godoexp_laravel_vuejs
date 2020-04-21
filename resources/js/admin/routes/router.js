import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Router Module
import Dashboard from '../components/protected/Dashboard.vue';

import Categories from '../components/protected/categories/CategoriesList.vue';
import CategoriesForm from '../components/protected/categories/CategoriesForm.vue';

import Experiences from '../components/protected/experiences/ExperiencesList.vue';
import ExperiencesForm from '../components/protected/experiences/ExperienceForm.vue';
import ExperienceEventCalendar from '../components/protected/experiences/ExperienceEventCalendar.vue';

import Clients from '../components/protected/clients/ClientsList.vue';
import ClientsForm from '../components/protected/clients/ClientsForm.vue';

import Vendors from '../components/protected/vendors/VendorsList.vue';
import VendorsForm from '../components/protected/vendors/VendorsForm.vue';

import companyDetailForm from '../components/protected/company/companyDetailForm.vue';

import Testimonials from '../components/protected/testimonial/TestimonialsList.vue';
import TestimonialsForm from '../components/protected/testimonial/TestimonialsForm.vue';

import ChangePassword from '../components/protected/profile/ChangePassword.vue';
import Profile from '../components/protected/profile/Profile.vue';

import Login from '../components/public/Login.vue';
import ForgotPassword from '../components/public/ForgotPassword.vue';

import Logout from '../components/protected/Logout.vue';

import PageNotFound from '../components/protected/PageNotFound.vue';

const PREFIX = '/godoexp_laravel_vuejs/admin/';

const router = new VueRouter({
    base : PREFIX,
    mode: 'history',
    linkExactActiveClass: 'active',
    routes : [
        {
            name : 'adminLogin',
            path: '/login',
            component: Login,
            meta: { requiresVisitor: true ,title :'Admin Login'}
        },
        {
            name : 'adminForgotPassword',
            path: '/forgot-password',
            component: ForgotPassword,
            meta: { requiresVisitor: true ,title :'Change Password'}
        },
        {
            name : 'dashboard',
            path: '/dashboard',
            component: Dashboard,
            meta: { requiresAuth: true ,title :'Home : Dashboard'}
        },
        {
            name : 'adminProfile',
            path: '/profile',
            component: Profile,
            meta: { requiresAuth: true ,title :'Update Profile'}
        },
        {
            name : 'changePassword',
            path: '/change-password',
            component: ChangePassword,
            meta: { requiresAuth: true ,title :'Change Password'}
        },
        {
            name : 'adminLogout',
            path: '/logout',
            component: Logout,
            meta: { requiresAuth: true ,title :'Logged Out'}
        },
        {
            name : 'experiences_list',
            path: '/experiences',
            component: Experiences,
            meta: { requiresAuth: true ,title :'Experiences List'}
        },
        {
            name : 'experiences_add',
            path : '/experiences/add',
            component : ExperiencesForm,
            meta: { requiresAuth: true ,title :'Add New Experience'}
        },
        {
            name : 'experiences_edit',
            path : '/experiences/edit/:id',
            component : ExperiencesForm,
            meta: { requiresAuth: true ,title :'Edit Experience'}
        },
        {
            name : 'experiences_schedule',
            path : '/experiences/schedule/:id',
            component : ExperienceEventCalendar,
            meta: { requiresAuth: true ,title :'Manage Experience Schedules'}
        },

        {
            name : 'categories_list',
            path: '/categories',
            component: Categories,
            meta: { requiresAuth: true ,title :'Categories List'}
        },
        {
            name : 'categories_add',
            path : '/categories/add',
            component : CategoriesForm,
            meta: { requiresAuth: true ,title :'Add New Category'}
        },
        {
            name : 'categories_edit',
            path : '/categories/edit/:id',
            component : CategoriesForm,
            meta: { requiresAuth: true ,title :'Edit Category'}
        },
        {
            name : 'clients_list',
            path: '/clients',
            component: Clients,
            meta: { requiresAuth: true ,title :'Clients List' }
        },
        {
            name : 'clients_add',
            path: '/clients/add',
            component: ClientsForm,
            meta: { requiresAuth: true , title:'Add New Client' }
        },
        {
            name : 'clients_edit',
            path: '/clients/edit/:id',
            component: ClientsForm,
            meta: { requiresAuth: true , title:'Edit Client'  }
        },
        {
            name : 'vendors_list',
            path: '/vendors',
            component: Vendors,
            meta: { requiresAuth: true , title:'Vendors List'  }
        },
        {
            name : 'vendors_add',
            path: '/vendors/add',
            component: VendorsForm,
            meta: { requiresAuth: true , title:'Add New Vendor'  }
        },
        {
            name : 'vendors_edit',
            path: '/vendors/edit/:id',
            component: VendorsForm,
            meta: { requiresAuth: true , title:'Edit Vendor'  }
        },
        {
            name : 'testimonials_list',
            path: '/testimonials',
            component: Testimonials,
            meta: { requiresAuth: true , title:'Testimonial List'  }
        },
        {
            name : 'testimonial_add',
            path: '/testimonial/add',
            component: TestimonialsForm,
            meta: { requiresAuth: true , title:'Add New Testimonial'  }
        },
        {
            name : 'testimonial_edit',
            path: '/testimonial/edit/:id',
            component: TestimonialsForm,
            meta: { requiresAuth: true , title:'Edit Testimonial'  }
        },
        {
            name : 'company_detail',
            path: '/company-detail',
            component: companyDetailForm,
            meta: { requiresAuth: true , title:'Update Company Detail' }
        },
        {
            name : 'page_not_found',
            path : '**',
            component : PageNotFound,
            meta: { requiresAuth: true , title:'Page Not found' }
        }
    ]
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    next()
});

router.beforeResolve((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!(!!localStorage.getItem('token'))) {
        alert('Your session has been expired please login..');
        window.location.href = PREFIX+'login';
      } else {
        next()
      }
    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
      if ((!!localStorage.getItem('token'))) {
        window.location.href = PREFIX+'home';
      } else {
         next()
      }
    }
    else {
      next() // make sure to always call next()!
    }
  })

export default router;
