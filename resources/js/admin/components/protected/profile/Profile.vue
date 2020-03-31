<template>
<div id="profile">
<loading :active.sync="isLoading"
    :can-cancel = "false"
    :is-full-page = "true"
    :opacity = "0.9"
    :width = '30'
    :height = '30'
    :zIndex =  '999999'
/>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         User Profile
        <small>update</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">User Profile</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <ValidationObserver v-slot="{ handleSubmit }">
            <form role="form" method="post" id="vuejsForm" enctype="multipart/form-data" @submit.prevent="handleSubmit(onSubmit)">
              <div class="box-body">
                 <div class="col col-md-12">
                     <div class="row">
                        <div class="profileImageSection">
                            <div class="form-group col-md-4">
                                <div class="logoSection">
                                    <img class="profile-user-img img-responsive img-circle"
                                    onError="this.onerror=null;this.src='/images/default.png';"
                                    :src="formData.image" alt="Profile Image" id="inputImagePreview">
                                </div>
                                <div>
                                    <input type="file" name="image" id="inputFileChooser" class="form-control">
                                    <span class="text-danger">{{ formErrors.image }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.first_name" name="first_name"
                                class="form-control" placeholder="First Name...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.first_name }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.last_name" name="last_name"
                                class="form-control" placeholder="Last Name...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.last_name }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <validation-provider rules="required|email" v-slot="{ errors }">
                                <input type="text" v-model="formData.email" name="email"
                                class="form-control" placeholder="Email address...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.email }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.phone" name="phone"
                                class="form-control" placeholder="Phone Number...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.phone }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>I Am( gender )</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <select class="form-control" v-model="formData.gender" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.gender }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Date Of Birth</label>
                            <validation-provider :rules="{ required:true,regex: /^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/ }" v-slot="{ errors }">
                                <input type="text" v-model="formData.dob_profile" name="dob"
                                class="form-control" placeholder="Date of birth...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.dob }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" v-model="formData.city" name="city"
                            class="form-control" placeholder="Your city...">
                            <span class="text-danger">{{ formErrors.city }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <input type="text" v-model="formData.state" name="state"
                            class="form-control" placeholder="Your state...">
                            <span class="text-danger">{{ formErrors.state }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Country</label>
                            <input type="text" v-model="formData.country" name="country"
                            class="form-control" placeholder="Your country...">
                            <span class="text-danger">{{ formErrors.country }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Zip Code</label>
                            <input type="text" v-model="formData.zip" name="zip"
                            class="form-control" placeholder="Your zip...">
                            <span class="text-danger">{{ formErrors.zip }}</span>
                        </div>
                    </div>
                 </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                    <div class="form-group col-md-12">
                        <button type="button" @click.prevent="goBack" class="btn btn-danger">Back</button>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
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

</div>
</template>
<script>
    import { ValidationProvider, ValidationObserver,Validator ,extend } from 'vee-validate';
    import { required,email,numeric,regex } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });
    extend('email', {
        ...email,
        message: 'This field is required valid email address.'
    });
    extend('numeric', {
        ...numeric,
        message: 'Enter valid numeric value'
    });
    extend('regex', {
        ...regex,
        message: 'Enter valid date of birth (dd/mm/yyyy)'
    });

    import { mapState } from 'vuex';
    export default {
        name : "userProfile",
        components: {
           ValidationProvider,
           ValidationObserver
        },
        data: function () {
            return {
                isLoading : true,
                formData : [],
                formErrors : []
            }
        },
        filters: {
            dateofBorth: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },
        methods : {
            goBack: function(){
                this.$router.push('/admin/dashboard');
            },
           onSubmit : function(){
                let formData  = new FormData($('#vuejsForm')[0]);
                let $this = this;
                $this.isLoading = true;
                $this.$store.dispatch('saveProfile',formData)
                .then(function(response){
                    $this.isLoading = false;
                    if(response.status == true){
                        $this.$toastr.s("Profile updated successfully","Success");
                        $this.$store.dispatch('getProfile',{});
                    }else if(response.status == false){
                        $this.formErrors = response.errors;
                        $this.$toastr.e(response.message,"Error");
                    }
                });
           },
           formParam : function(){
              return {
                  id : 0,
                  first_name : '',
                  last_name : '',
                  email : '',
                  profile_photo : '',
                  phone : '',
                  gender : '',
                  dob : '',
                  dob_profile : '',
                  city : '',
                  state : '',
                  country : '',
                  zip : '',
                  image : ''
              }
           }
        },
        created(){
            let $this = this;
            this.$store.dispatch('editProfile',[])
            .then(function(result){
                    if(result){
                         $this.formData = result;
                    }else{
                        $this.formParam();
                    }
                    $this.isLoading = false;
            }).catch(error => {
                this.$toastr.e(error.message, 'Getting Error');
                $this.isLoading = false;
            });

        }
    }
</script>
<style scoped>

</style>
