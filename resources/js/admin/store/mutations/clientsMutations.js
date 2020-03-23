export default {
    getClients(state, data) {
        state.data.list = data;
    },
    editClient(state, data) {
        state.data.editData = data;
    },
    clientsCount(state, total) {
        state.data.list_total = total;
    }
}