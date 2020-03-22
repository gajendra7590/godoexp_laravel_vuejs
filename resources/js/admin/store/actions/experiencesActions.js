import Vue from 'vue';
import axios from 'axios';
Vue.use(axios);

export default {
    getExperiences( { commit, state }, payload ){
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL+'experiences', payload)
            .then(function (response) {
                commit('getExperiences',response.data);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    },
    editExperience( { commit, state }, id ){
        axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
        axios.get(state.baseURL+'experiences/'+id)
            .then(function (response) {
                commit('editExperience',response.data);
            })
            .catch(function (error) {
                console.log(error.response);
            });
    }
}
