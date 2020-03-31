import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    editCompany({ commit, state },payload) {

        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.get(state.baseURL + 'company/editCompany')
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    saveCompany({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'company/saveCompany', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    }
}
