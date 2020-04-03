<template>
    <div class="content-wrapper">
        <loading :active.sync="isLoading"
            :can-cancel = "false"
            :is-full-page = "true"
            :opacity = "0.9"
            :width = '30'
            :height = '30'
            :zIndex =  '999999'
        />
        <!-- Main content -->
        <section class="content">
            <h3>You are preceeding to logged out...</h3>
        </section>
    </div>
</template>
<script>
export default {
    name : 'adminLogout',
    data : function(){
        return {
            isLoading : true
        }
    },
    methods:{
    },
    created() {
        let $this = this;
        $this.$store.dispatch('authLogout',{})
        .then(function(response){
            if(response.status == true){
                $this.$toastr.s("You have been logged out successfully","Success");
                localStorage.removeItem("token");
                setTimeout(function(){
                    window.location.href = '/admin/login';
                },500);
            }else if(response.status == false){
                $this.isLoading = false;
                $this.$toastr.e(response.message,"Error");
            }
        });
    }
}
</script>
<style scoped>

</style>
