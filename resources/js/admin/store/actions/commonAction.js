import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    getWidgets({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.get(state.baseURL + 'dashboard/widgets', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    getScheduleDates({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.get(state.baseURL + 'experiences/schedule_dates/' + payload.id + '?y=' + payload.y + '&m=' + payload.m)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    saveScheduleDates({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.post(state.baseURL + 'experiences/schedule_dates/' + payload.id, payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
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
    },
    editProfile({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.get(state.baseURL + 'user/editProfile', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    saveProfile({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
            axios.post(state.baseURL + 'user/saveProfile', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },
    changePassword({ commit, state }, payload) {
        return new Promise(function(resolve, reject) {
            axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
            axios.post(state.baseURL + 'user/changePassword', payload)
                .then(function(response) {
                    return resolve(response.data)
                })
                .catch(function(error) {
                    return reject(error.response);
                });
        });
    },

}