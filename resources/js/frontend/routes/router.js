import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//Router Module  
import Home from '../components/public/Home.vue';
import Experiences from '../components/public/Experiences.vue';
import ExperienceDetail from '../components/public/ExperienceDetail.vue';
import Categories from '../components/public/Categories.vue';  

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes : [  
        {
            name : 'experiences_home',
            path: '/',
            component: Home, 
        },
        {
            name : 'experiences_list',
            path: '/experiences',
            component: Experiences, 
        }, 
        {
            name : 'experience_categories_list',
            path: '/experiences/categories',
            component: Categories, 
        }, 
        {
            name : '404_not_found',
            path: '**',
            redirect: '/' 
        }   
    ]
});
 
 

export default router;
