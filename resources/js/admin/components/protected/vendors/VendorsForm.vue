<template>
<div id="vendorsForm">
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
         Manage Vendors
        <small>{{ action }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">Manage Vendors</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Vendors</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <ValidationObserver v-slot="{ handleSubmit }">
                <form role="form" method="post" id="vuejsForm" enctype="multipart/form-data" @submit.prevent="handleSubmit(onSubmit)">
                <div class="box-body">
                 <div class="col col-md-12">
                     <div class="row">
                        <div class="profileImageSection">
                            <div class="profileImageSection">
                                <div class="form-group col-md-4">
                                    <div class="logoSection">
                                        <img class="profile-user-img img-responsive img-circle"
                                        onError="this.onerror=null;this.src='/images/default.png';"
                                        :src="formData.image" alt="Category Image" id="inputImagePreview">
                                    </div>
                                    <div>
                                        <input type="file" name="image" id="inputFileChooser" class="form-control">
                                        <span class="text-danger">{{ formErrors.image }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                   <input type="text" v-model="formData.first_name" name="first_name" class="form-control" placeholder="First Name..">
                                   <span class="text-danger">{{ errors[0] }}</span>
                                   <span class="text-danger">{{ formErrors.first_name }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                   <input type="text" v-model="formData.last_name" name="last_name" class="form-control" placeholder="Last Name..">
                                   <span class="text-danger">{{ errors[0] }}</span>
                                   <span class="text-danger">{{ formErrors.last_name }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <validation-provider rules="required|email" v-slot="{ errors }">
                                   <input type="text" v-model="formData.email" name="email" class="form-control" placeholder="Email..">
                                   <span class="text-danger">{{ errors[0] }}</span>
                                   <span class="text-danger">{{ formErrors.email }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6" v-if="action == 'create'">
                            <label>Password</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                   <input type="password" v-model="formData.password" name="password" class="form-control" placeholder="*******">
                                   <span class="text-danger">{{ errors[0] }}</span>
                                   <span class="text-danger">{{ formErrors.password }}</span>
                            </validation-provider>
                        </div>
                         <div class="form-group col-md-6" v-if="action == 'update'">
                            <label>Password ( *Leave empty if don`t want update )</label>
                            <input type="password" v-model="formData.password" name="password" class="form-control"
                             placeholder="*******">
                            <span class="text-danger">{{ formErrors.password }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Phone Number</label>
                            <input type="text" v-model="formData.phone" name="phone" class="form-control" placeholder="phone..">
                            <span class="text-danger">{{ formErrors.phone }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender</label>
                            <select class="form-control" v-model="formData.gender" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <span class="text-danger">{{ formErrors.gender }}</span>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Country</label>
                            <select class="form-control" v-model="formData.country" name="country">
                                <option value="india">India</option>
                                <option value="usa">USA</option>
                                <span class="text-danger">{{ formErrors.country }}</span>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <input type="text" v-model="formData.state" name="state" class="form-control" placeholder="state..">
                            <span class="text-danger">{{ formErrors.state }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" v-model="formData.city" name="city" class="form-control" placeholder="city..">
                            <span class="text-danger">{{ formErrors.city }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Zip Code</label>
                            <input type="text" v-model="formData.zip" name="zip" class="form-control" placeholder="zip..">
                            <span class="text-danger">{{ formErrors.zip }}</span>
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-md-6">
                            <label>Status</label>
                            <select class="form-control" v-model="formData.status" name="status">
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                                <span class="text-danger">{{ formErrors.status }}</span>
                            </select>
                         </div>
                    </div>
                 </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                    <div class="form-group col-md-12">
                        <button type="button" @click.prevent="goBack" class="btn btn-danger">Back</button>
                        <button type="submit" class="btn btn-primary">{{ action | capitalize }}</button>
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
    import { ValidationProvider,ValidationObserver ,extend } from 'vee-validate';
    import { required,email } from 'vee-validate/dist/rules';
    extend('required', {
        ...required,
        message: 'The field is required'
    });
    extend('email', {
        ...email,
        message: 'The field is required && valid email address.'
    });

    import { mapState } from 'vuex';
    export default {
        name : "vendorFormC",
        components: {
           ValidationProvider,
           ValidationObserver
        },
        data: function () {
            return {
                isLoading : true,
                action : 'create',
                id : 0,
                formData : [],
                formErrors : [],
            }
        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        },
        methods : {
            goBack: function(){
                this.$router.push('/admin/vendors');
            },
           onSubmit : function(){
               let formData  = new FormData($('#vuejsForm')[0]);
               let $this = this;
               if($this.action == 'create'){
                   $this.isLoading = true;
                   $this.$store.dispatch('saveVendors',formData)
                   .then(function(response){
                       $this.isLoading = false;
                       if(response.status == true){
                            $this.$toastr.s("New Vendor created successfully","Success");
                            $this.$router.push('/admin/vendors');

                       }else if(response.status == false){
                           $this.formErrors = response.errors;
                           $this.$toastr.e(response.message,"Error");
                       }
                    });

               }else{
                   $this.isLoading = true;
                   $this.$store.dispatch('updateVendors',{data:formData,id: $this.id})
                   .then(function(response){
                       $this.isLoading = false;
                       if(response.status == true){
                            $this.$toastr.s("Vendor updated successfully","Success");
                            $this.$router.push('/admin/vendors');
                       }else if(response.status == false){
                           $this.$toastr.e(response.message,"Error");
                            $this.formErrors = response.errors;
                       }
                    });
               }

           },
           formParam : function(){
              return {
                  id : 0,
                  first_name : '',
                  last_name : '',
                  email : '',
                  password : '',
                  phone : '',
                  gender : '',
                  dob : '',
                  country : '',
                  state : '',
                  city : '',
                  zip : '',
                  status : 1,
                  image : '',
              }
           }
        },
        created(){
            if(this.$route.params.id != undefined){
                this.id = this.$route.params.id;
                this.action = 'update';
                let $this = this;
                this.$store.dispatch('editVendors',this.$route.params.id)
                .then(function(result){
                     $this.formData = result;
                     $this.isLoading = false;
                }).catch(error => {
                    this.$toastr.e(error.message, 'Getting Error');
                    $this.isLoading = false;
                });
            }else{
                this.action = 'create';
                this.formData = this.formParam();
                this.isLoading = false;
            }
        }
    }
</script>
<style scoped>

</style>
