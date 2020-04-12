 export default {
     getCategory(state, data) {
         state.data.list = data;
     },
     editCategory(state, data) {
         state.data.editData = data;
     },
     categoryCount(state, total) {
         state.data.list_total = total;
     }
 }