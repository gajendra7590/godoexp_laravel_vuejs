export default {
    getExperiences(state,data){
        state.experiences.list = data;
    },
    editExperience(state,data){
        state.experiences.editData = data;
    }
}
