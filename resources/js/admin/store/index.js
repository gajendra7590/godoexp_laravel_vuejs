import Vue from 'vue';
import Vuex from 'vuex';

const BASEURL =  (window.location.origin)+'/api/admin/';

//All Mutations
import * as categoriesMutation from './mutations/categoriesMutations';
import * as  experiencesMutations from './mutations/experiencesMutations';
const mutations = Object.assign({},
    categoriesMutation.default,
    experiencesMutations.default
);

//All Actions
import * as categoriesAction from './actions/categoriesAction';
import * as  experiencesActions from './actions/experiencesActions';

const actions = Object.assign({},
    categoriesAction.default,
    experiencesActions.default
);



Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        baseURL : BASEURL,
        categories : {
            list : [],
            list_total : 0,
            editData : []
        },
        experiences : {
            list : [],
            editData : []
        },
        userData : {
            username : "Gajendra Singh"
        }
    },
    mutations,
    actions
});

export default store;

