import Vue from 'vue';
import Vuex from 'vuex';

const BASEURL = (window.location.origin) + '/api/admin/';

//All Mutations
// import * as commonMutations from './mutations/commonMutations';
import * as categoriesMutations from './mutations/categoriesMutations';
import * as experiencesMutations from './mutations/experiencesMutations';
import * as clientsMutations from './mutations/clientsMutations';
import * as vendorsMutations from './mutations/vendorsMutations';
const mutations = Object.assign({},
    // commonMutations.default,
    categoriesMutations.default,
    experiencesMutations.default,
    clientsMutations.default,
    vendorsMutations.default,
);

//All Actions
import * as categoriesAction from './actions/categoriesAction';
import * as experiencesActions from './actions/experiencesActions';
import * as clientsAction from './actions/clientsAction';
import * as vendorsAction from './actions/vendorsAction';
// import * as commonAction from './actions/commonAction';

const actions = Object.assign({},
    categoriesAction.default,
    experiencesActions.default,
    clientsAction.default,
    vendorsAction.default
);



Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        baseURL: BASEURL,
        data: {
            list: [],
            list_total: 0,
            editData: [],
        },
        userData: {
            username: "Gajendra Singh"
        }
    },
    mutations,
    actions
});

export default store;