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
    editClients({ commit, state }, id) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.get(state.baseURL + 'clients/' + id)
            .then(function(response) {
                return resolve(response.data)
            })
            .catch(function(error) {
                return reject(error.response);
            });
        });
    },
    saveClients({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'clients', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateClients({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'clients/'+payload.id,payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteClients({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.delete(state.baseURL + 'clients/'+payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    }
}
