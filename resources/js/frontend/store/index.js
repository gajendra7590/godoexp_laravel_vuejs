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
            window.location.href = '/admin/login';
          }
      }
  });

const BASEURL = (window.location.origin) + '/api/admin/';

//All Mutations
import * as categoriesMutations from './mutations/categoriesMutations';
import * as experiencesMutations from './mutations/experiencesMutations'; 
const mutations = Object.assign({}, 
    categoriesMutations.default,
    experiencesMutations.default 
);

//All Actions 
import * as categoriesAction from './actions/categoriesAction';
import * as experiencesActions from './actions/experiencesActions';  
const actions = Object.assign({}, 
    categoriesAction.default,
    experiencesActions.default, 
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
