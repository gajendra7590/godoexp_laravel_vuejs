export default {
    getVendors(state, data) {
        state.data.list = data;
    },
    editVendor(state, data) {
        state.data.editData = data;
    },
    vendorsCount(state, total) {
        state.data.list_total = total;
    }
}