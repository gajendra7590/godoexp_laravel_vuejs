import Vue from 'vue';
import router from './admin/routes/router';
import store from './admin/store/index';
import VueToastr from "vue-toastr";
import VueLazyload from 'vue-lazyload';
import Paginate from 'vuejs-paginate';

const BASEURL =  (window.location.origin)+'/';

import { BootstrapVue, IconsPlugin,ModalPlugin ,TablePlugin } from 'bootstrap-vue'

import vueMoment from 'vue-moment';
import App from './admin/components/App.vue' ;
require('./bootstrap');

Vue.use(vueMoment);
Vue.use({ BootstrapVue,IconsPlugin,ModalPlugin,TablePlugin });
Vue.use(VueToastr);
Vue.use(VueLazyload,{
    preLoad: 1,
    error: BASEURL+'images/default.png',
    loading: BASEURL+'images/lazy_default.gif',
    attempt: 1
});

Vue.component('paginate', Paginate);



export default new Vue({
    el: '#app',
    router: router,
    store : store,
    render: h => h(
        App
    ),

});
