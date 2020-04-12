import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    getCategory({ commit, state }, payload) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL + 'categories?page=' + payload.page)
            .then(function(response) {
                commit('getCategory', response.data.categories);
                commit('categoryCount', response.data.total_pages);

            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    editCategory({ commit, state }, id) {

        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.get(state.baseURL + 'categories/' + id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    saveCategory({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'categories', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateCategory({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'categories/'+payload.id,payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteCategory({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.delete(state.baseURL + 'categories/'+payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
}
