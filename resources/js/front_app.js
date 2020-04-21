import Vue from 'vue';  
import VueLazyload from 'vue-lazyload';
import VueContentPlaceholders from 'vue-content-placeholders';
import vueMoment from 'vue-moment';

//Custom
import router from './frontend/routes/router';
import store from './frontend/store/index';
import App from './frontend/components/App.vue' ; 

require('./bootstrap');

const BASEURL =  (window.location.origin)+'/godoexp_laravel_vuejs/';   

Vue.use(VueLazyload,{
    preLoad: 1,
    error: BASEURL+'public/images/default.png',
    loading: BASEURL+'public/images/lazy_default.gif',
    attempt: 2
});

Vue.use(VueContentPlaceholders)
Vue.use(vueMoment);


export default new Vue({
    el: '#app', 
    router: router,
    store:store,
    render: h => h(
        App
    ),

});
