import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(axios);

axios.interceptors.response.use(function(response) {
    return response;
  },function(err) {
      if( ( typeof(err.response)!=='undefined') ){
          if( (typeof(err.response.status)!== 'undefined') && (err.response.status == 401) && err.response.data.message == 'Unauthenticated.' ){
            localStorage.removeItem('token');
            alert('Your session has been expired please login..');
            window.location.href = '/';
          }
      }
  });

const BASEURL = (window.location.origin) + '/api/client/';

//All Mutations
import * as commosMutations from './mutations/commonMutations'; 
const mutations = Object.assign({}, 
    commosMutations.default 
);

//All Actions 
import * as commonActions from './actions/commonActions'; 
const actions = Object.assign({}, 
    commonActions.default, 
);



Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        baseURL: BASEURL,
        data: {
            list: [],
            list_total: 0,
            editData: [],
            categories : []
        },
        userData: []
    },
    mutations,
    actions
});

export default store;
