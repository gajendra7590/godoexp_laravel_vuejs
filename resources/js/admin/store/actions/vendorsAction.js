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
                commit('getVendors', response.data.vendors);
                commit('vendorsCount', response.data.total_pages);

            })
            .catch(function(error) {
                console.log(error.response);
            });
    },

    editVendors({ commit, state }, id) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.get(state.baseURL + 'vendors/' + id)
            .then(function(response) {
                return resolve(response.data)
            })
            .catch(function(error) {
                return reject(error.response);
            });
        });
    },
    saveVendors({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'vendors', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateVendors({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'vendors/'+payload.id,payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteVendors({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.delete(state.baseURL + 'vendors/'+payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    }
}
