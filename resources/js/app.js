import Vue from 'vue';
import VueToastr from "vue-toastr";
import VueLazyload from 'vue-lazyload';
import Paginate from 'vuejs-paginate';
import { BootstrapVue, IconsPlugin,ModalPlugin ,TablePlugin } from 'bootstrap-vue';
import vueMoment from 'vue-moment';
//loader
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

//dailog box
import VuejsDialog from 'vuejs-dialog';
import 'vuejs-dialog/dist/vuejs-dialog.min.css';

import router from './admin/routes/router';
import store from './admin/store/index';
import App from './admin/components/App.vue' ;
require('./bootstrap');

const BASEURL =  (window.location.origin)+'/';


Vue.use(vueMoment);
Vue.use({ BootstrapVue,IconsPlugin,ModalPlugin,TablePlugin });
Vue.use(VueToastr,{
    defaultTimeout: 3000,
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
    defaultType: "success",
});
Vue.use(VueLazyload,{
    preLoad: 1,
    error: BASEURL+'images/default.png',
    loading: BASEURL+'images/lazy_default.gif',
    attempt: 1
});

// Loader
Vue.use(Loading);
Vue.component('loading', Loading);
Vue.use(VuejsDialog,{
    html: true,
    loader: true,
    okText: 'Proceed',
    cancelText: 'Cancel',
    animation: 'bounce'
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
