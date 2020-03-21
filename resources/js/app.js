import Vue from 'vue';
import vueMoment from 'vue-moment';
import App from './admin/components/App.vue' ;
import router from './admin/routes/router';
require('./bootstrap');

Vue.use(vueMoment);


export default new Vue({
    el: '#app',
    router: router,
    render: h => h(
        App
    ),

});
