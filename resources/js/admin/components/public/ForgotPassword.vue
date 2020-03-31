<template>
    <div class="login-box-body">
            <p class="login-box-msg">Admin Forgot Password</p>
                <form action="../../index2.html" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
                 <router-link :to="{ name : 'adminLogin'}">sign in</router-link>
        </div>
</template>
<script>
export default {
    name:"forgotPasswordApp",
    data : function(){
        return {

        }
    },
}
</script>
<style scoped>

</style>
