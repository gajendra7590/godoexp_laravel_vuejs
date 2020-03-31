<template>
        <div class="login-box-body">
            <loading :active.sync="isLoading"
                :can-cancel = "false"
                :is-full-page = "true"
                :opacity = "0.9"
                :width = '30'
                :height = '30'
                :zIndex =  '999999'
            />
            <p class="login-box-msg">Admin Login</p>
            <ValidationObserver v-slot="{ handleSubmit }">
                <form role="form" method="post" id="vuejsForm" enctype="multipart/form-data" @submit.prevent="handleSubmit(onSubmit)">
                    <div class="form-group has-feedback">
                         <validation-provider rules="required|email" v-slot="{ errors }">
                            <input type="text" v-model="loginForm.email" name="email" class="form-control" placeholder="Email">
                            <span class="text-danger">{{ errors[0] }}</span>
                         </validation-provider>
                    </div>
                    <div class="form-group has-feedback">
                       <validation-provider rules="required" v-slot="{ errors }">
                            <input type="password" v-model="loginForm.password" name="password" class="form-control" placeholder="Password">
                            <span class="text-danger">{{ errors[0] }}</span>
                         </validation-provider>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
             </ValidationObserver>
             <router-link :to="{ name : 'adminForgotPassword'}">I forgot my password</router-link>
        </div>
</template>
<script>
import { ValidationProvider, ValidationObserver,Validator ,extend } from 'vee-validate';
import { required,email } from 'vee-validate/dist/rules';
extend('required', {
    ...required,
    message: 'This field is required'
});
extend('email', {
    ...email,
    message: 'Required valid email address.'
});
export default {
    name:"loginApp",
    components: {
        ValidationProvider,
        ValidationObserver
    },
    data : function(){
        return {
            isLoading : false,
            loginForm : {
                email : '',
                password : ''
            },
            formErrors : [],
        }
    },
     methods : {
        onSubmit : function(){
            let formData  = new FormData($('#vuejsForm')[0]);
            let $this = this;
            $this.isLoading = true;
            $this.$store.dispatch('authLogin',formData)
            .then(function(response){
                if(response.status == true){
                    $this.$toastr.s("Welcome Back, "+response.user,"Success");
                    localStorage.setItem("token", response.token.access_token);
                    setTimeout(function(){
                        window.location.href = '/admin/dashboard';
                    },500);
                }else if(response.status == false){
                   $this.isLoading = false;
                   $this.formErrors = ( typeof(response.errors)!=undefined?response.errors:[]);
                   $this.$toastr.e(response.message,"Error");
                }
            });
        }
     }
}
</script>
<style scoped>

</style>
