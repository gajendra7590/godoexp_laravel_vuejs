import Vue from 'vue';
import VueToastr from "vue-toastr";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import router from './admin/routes/router';
import store from './admin/store/index';
import App from './admin/components/Auth.vue' ;
require('./bootstrap');

const BASEURL =  (window.location.origin)+'/';

Vue.use(VueToastr,{
    defaultTimeout: 3000,
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
    defaultType: "success",
});
// Loader
Vue.use(Loading);
Vue.component('loading', Loading);

export default new Vue({
    el: '#app_auth',
    router: router,
    store : store,
    render: h => h(
        App
    ),

});
