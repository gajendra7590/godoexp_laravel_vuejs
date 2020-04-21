import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Router Module  
import Home from '../components/public/Home.vue';
import Experiences from '../components/public/Experiences.vue';
import ExperiencesByCategory from '../components/public/ExperiencesByCategory.vue';
import ExperienceDetail from '../components/public/ExperienceDetail.vue';
import Categories from '../components/public/Categories.vue';  

//Other Pages
import AboutUs from '../components/public/extra/AboutUs.vue';
import ContactUs from '../components/public/extra/ContactUs.vue';
import Faq from '../components/public/extra/Faq.vue';
import PrivacyPolicy from '../components/public/extra/PrivacyPolicy.vue';
import TermsAndConditions from '../components/public/extra/TermsAndConditions.vue';

const PREFIX = '/godoexp_laravel_vuejs/'; 
const router = new VueRouter({
    base : PREFIX,
    mode: 'history',
    linkExactActiveClass: 'active',
    routes : [  
        {
            name : 'experiences_home',
            path: '/',
            component: Home,
            meta: { header_cls : '' } 
        },
        {
            name : 'experience_categories_list',
            path: '/categories',
            component: Categories,
            meta: { header_cls : '' } 
        }, 
        {
            name : 'experiences_list',
            path: '/experiences',
            component: Experiences,
            meta: { header_cls : '' }  
        }, 
        {
            name : 'experiences_list_by_cat',
            path: '/category/:category_name',
            component: ExperiencesByCategory,
            meta: { header_cls : '' }  
        },
        {
            name : 'experiences_detail',
            path: '/experience/:exp_slug',
            component: ExperienceDetail,
            meta: { header_cls : 'header_bg' }  
        },
        {
            name : 'about_us',
            path: '/about-us',
            component: AboutUs,
            meta: { header_cls : 'header_bg' }  
        },
        {
            name : 'contact_us',
            path: '/contact-us',
            component: ContactUs,
            meta: { header_cls : 'header_bg' }  
        },
        {
            name : 'faq',
            path: '/faq',
            component: Faq,
            meta: { header_cls : 'header_bg' }  
        },
        {
            name : 'privacy_policy',
            path: '/privacy-policy',
            component: PrivacyPolicy,
            meta: { header_cls : 'header_bg' }  
        },
        {
            name : 'terms_and_conditions',
            path: '/terms-and-conditions',
            component: TermsAndConditions,
            meta: { header_cls : 'header_bg' }  
        },  
        {
            name : '404_not_found',
            path: '**',
            redirect: '/' 
        }   
    ]
});
 
 

export default router;
