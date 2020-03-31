import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    getExperiences({ commit, state }, payload) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL + 'experiences?page=' + payload.page)
            .then(function(response) {
                commit('getExperiences', response.data.experiences);
                commit('experiencesCount', response.data.total_pages);
            })
            .catch(function(error) {
                console.log(error.response);
            });
    },
    experienceCategories({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.get(state.baseURL + 'experiences/categories')
            .then(function(response) {
                return resolve(response.data);
            })
            .catch(function(error) {
                return reject(error.response);
            });
        });
    },
    editExperience({ commit, state }, id) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.get(state.baseURL + 'experiences/' + id)
            .then(function(response) {
                return resolve(response.data)
            })
            .catch(function(error) {
                return reject(error.response);
            });
        });
    },
    saveExperience({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'experiences', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    updateExperience({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'experiences/'+payload.id,payload.data)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    deleteExperience({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.delete(state.baseURL + 'experiences/'+payload.id)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    }
}
