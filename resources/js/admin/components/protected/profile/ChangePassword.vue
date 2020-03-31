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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Change Password
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">Change Password</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <ValidationObserver v-slot="{ handleSubmit }">
            <form role="form" method="post" id="vuejsForm" enctype="multipart/form-data" @submit.prevent="handleSubmit(onSubmit)">
              <div class="box-body">
                 <div class="col col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Old Password</label>
                            <validation-provider :rules="{ required:true }" v-slot="{ errors }">
                                <input type="password" v-model="formData.old_password" name="old_password"
                                class="form-control" placeholder="*******">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.old_password }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-12">
                            <label>New Password</label>
                             <validation-provider :rules="{ required:true,min:6 }" v-slot="{ errors }">
                                <input type="password" v-model="formData.new_password" name="new_password"
                                class="form-control" placeholder="*******">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.new_password }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Confirm new password</label>
                            <validation-provider :rules="{ required:true,min:6 }" v-slot="{ errors }">
                                <input type="password" v-model="formData.new_password_confirmation" name="new_password_confirmation"
                                class="form-control" placeholder="*******">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.new_password_confirmation }}</span>
                            </validation-provider>
                        </div>
                    </div>

                 </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                    <div class="form-group col-md-12">
                        <button type="button" @click.prevent="goBack" class="btn btn-danger">Back</button>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
              </div>
            </form>
            </ValidationObserver>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

</template>
<script>
    import { ValidationProvider, ValidationObserver,Validator ,extend } from 'vee-validate';
    import { required,min,confirmed} from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });
    extend('min', {
        ...min,
        message: 'Required min 6 digit'
    });
    extend('confirmed', {
        ...confirmed,
        message: 'New password & Confirm new password not matched'
    });
    import { mapState } from 'vuex';
    export default {
        name : "changePassword",
        components: {
           ValidationProvider,
           ValidationObserver
        },
        data: function () {
            return {
                isLoading : false,
                formData : {
                    old_password : '',
                    new_password : '',
                    new_password_confirmation : ''
                },
                formErrors : []
            }
        },
        methods : {
            goBack: function(){
                this.$router.push('/admin/dashboard');
            },
            resetForm : function(){
                this.formData = {
                    old_password : '',
                    new_password : '',
                    new_password_confirmation : ''
                }
            },
           onSubmit : function(){
                this.formErrors= [];
                let formData  = new FormData($('#vuejsForm')[0]);
                let $this = this;
                $this.isLoading = true;
                $this.$store.dispatch('changePassword',formData)
                .then(function(response){
                    $this.isLoading = false;
                    if(response.status == true){
                        // $this.resetForm();
                        $this.$toastr.s("Password changed successfully","Success");
                    }else if(response.status == false){
                        $this.formErrors = response.errors;
                        $this.$toastr.e(response.message,"Error");
                    }
                });
           },
        }
    }
</script>
<style scoped>

</style>
