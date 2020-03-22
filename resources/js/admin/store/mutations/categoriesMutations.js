 export default {
    getCategory(state,data){
        state.categories.list = data;
    },
    editCategory(state,data){
        state.categories.editData = data;
    },
    categoryCount(state,total){
        state.categories.list_total = total;
    }
}
