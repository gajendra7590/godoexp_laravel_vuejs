import Vue from 'vue';  
import VueLazyload from 'vue-lazyload'
import router from './frontend/routes/router';
import store from './frontend/store/index';
import App from './frontend/components/App.vue' ; 

require('./bootstrap');

const BASEURL =  (window.location.origin)+'/';  

Vue.use(VueLazyload,{
    preLoad: 1,
    error: BASEURL+'images/default.png',
    loading: BASEURL+'images/lazy_default.gif',
    attempt: 2
});

export default new Vue({
    el: '#app', 
    router: router,
    store:store,
    render: h => h(
        App
    ),

});
