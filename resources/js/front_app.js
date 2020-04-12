import Vue from 'vue';  
import router from './frontend/routes/router';
import App from './frontend/components/App.vue' ; 

require('./bootstrap');

const BASEURL =  (window.location.origin)+'/';  

export default new Vue({
    el: '#app', 
    router: router,
    render: h => h(
        App
    ),

});
