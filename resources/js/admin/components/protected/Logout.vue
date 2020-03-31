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
            isLoading : false
        }
    },
    methods:{
        logout(){
            let $this = this;
            this.$dialog.confirm("Are you sure to logged Out ?", {
                loader: true
            })
            .then(dialog => {
                $this.confirmLoggedOut();
            }).catch(function(error) {
                $this.cancelLoggedOut();
            });
        },
        cancelLoggedOut(){
            this.$toastr.s("Loggout action cancelled.");
            this.$router.push({ name : 'dashboard'});
        },
        confirmLoggedOut(){
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
    },
    created() {
        this.logout();
    }
}
</script>
<style scoped>

</style>
