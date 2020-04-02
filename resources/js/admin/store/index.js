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
import * as commonMutations from './mutations/commonMutations';
import * as categoriesMutations from './mutations/categoriesMutations';
import * as experiencesMutations from './mutations/experiencesMutations';
import * as clientsMutations from './mutations/clientsMutations';
import * as vendorsMutations from './mutations/vendorsMutations';
import * as testimonialsMutations from './mutations/testimonialsMutations';
const mutations = Object.assign({},
    commonMutations.default,
    categoriesMutations.default,
    experiencesMutations.default,
    clientsMutations.default,
    vendorsMutations.default,
    testimonialsMutations.default,
);

//All Actions
import * as commonAction from './actions/commonAction';
import * as categoriesAction from './actions/categoriesAction';
import * as experiencesActions from './actions/experiencesActions';
import * as clientsAction from './actions/clientsAction';
import * as vendorsAction from './actions/vendorsAction';
import * as companyAction from './actions/companyAction';
import * as testimonialsAction from './actions/testimonialsAction';

const actions = Object.assign({},
    commonAction.default,
    categoriesAction.default,
    experiencesActions.default,
    clientsAction.default,
    vendorsAction.default,
    companyAction.default,
    testimonialsAction.default
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
