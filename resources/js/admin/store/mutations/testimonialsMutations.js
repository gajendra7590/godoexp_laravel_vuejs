 export default {
     getTestimonials(state, data) {
         state.data.list = data;
     },
     editTestimonials(state, data) {
         state.data.editData = data;
     },
     testimonialsCount(state, total) {
         state.data.list_total = total;
     }
 }
