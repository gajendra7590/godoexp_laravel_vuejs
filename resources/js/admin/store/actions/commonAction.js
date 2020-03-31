import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    getProfile({ commit, state }, payload) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.get(state.baseURL + 'auth/profile')
            .then(function(response) {
               commit('getProfile', response.data);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    authLogin({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.post(state.baseURL + 'auth/login', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    authLogout({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.post(state.baseURL + 'auth/logout', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    }
}
