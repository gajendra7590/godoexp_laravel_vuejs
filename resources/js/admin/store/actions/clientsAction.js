import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    getClients({ commit, state }, payload) {
        // console.log(payload)
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL + 'clients?page=' + payload.page)
            .then(function(response) {
                commit('getClients', response.data.clients);
                commit('clientsCount', response.data.total_pages);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editClient({ commit, state }, id) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL + 'clients/' + id)
            .then(function(response) {
                commit('editClient', response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    }
}