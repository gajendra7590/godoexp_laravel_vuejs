import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    getVendors({ commit, state }, payload) {
        // console.log(payload)
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL + 'vendors?page=' + payload.page)
            .then(function(response) {
                commit('getVendors', response.data.clients);
                commit('vendorsCount', response.data.total_pages);

            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editVendor({ commit, state }, id) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL + 'vendors/' + id)
            .then(function(response) {
                commit('editVendor', response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    }
}