export default {
    getExperiences(state, data) {
        state.data.list = data;
    },
    editExperience(state, data) {
        state.data.editData = data;
    },
    experiencesCount(state, total) {
        state.data.list_total = total;
    }
}