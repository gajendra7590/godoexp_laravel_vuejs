export default {
    getAll(state, data) {
        state.data.list = data;
    },
    getOne(state, data) {
        state.data.editData = data;
    },
    getCount(state, total) {
        state.data.list_total = total;
    }
}