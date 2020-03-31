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
         Company Detail
        <small>manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">Company Detail</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Company Detail</h3>
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
                                    :src="formData.image" alt="Company Image" id="inputImagePreview">
                                </div>
                                <div>
                                    <input type="file" name="image" id="inputFileChooser" class="form-control">
                                    <span class="text-danger">{{ formErrors.image }}</span>
                                </div>
                                <!-- {{ formData }} -->
                                <!-- {{ formData }} -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Company Owner</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_owner" name="company_owner"
                                class="form-control" placeholder="Company Owner...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_owner }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company Name</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_name" name="company_name"
                                class="form-control" placeholder="Company Name...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_name }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Company Email</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_email" name="company_email"
                                class="form-control" placeholder="Company email...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_email }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company Phone</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_phone" name="company_phone"
                                class="form-control" placeholder="Company phone...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_phone }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Company Description</label>
                            <textarea type="text" v-model="formData.company_desc"  name="company_desc" rows="5" class="form-control" placeholder="Company description..."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_city" name="company_city"
                                class="form-control" placeholder="Company city...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_city }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_state" name="company_state"
                                class="form-control" placeholder="Company state...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_state }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Country</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_country" name="company_country"
                                class="form-control" placeholder="Company country...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_country }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Zip Code</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.company_zip" name="company_zip"
                                class="form-control" placeholder="Company zip...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.company_zip }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Facebook</label>
                            <input type="text" v-model="formData.company_facebook" name="company_facebook" class="form-control" placeholder="Facebook link...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Instagram</label>
                            <input type="text" v-model="formData.company_instagram" name="company_instagram" class="form-control" placeholder="Instagram link...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Twitter</label>
                            <input type="text" v-model="formData.company_twiiter" name="company_twiiter" class="form-control" placeholder="Twitter link...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pinterest</label>
                            <input type="text" v-model="formData.company_pinterest" name="company_pinterest" class="form-control" placeholder="Pinterest link...">
                        </div>
                    </div>
                 </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                    <div class="form-group col-md-12">
                         <input type="hidden" name="company_id" v-model="formData.id" class="form-control">
                        <button type="button" @click.prevent="goBack" class="btn btn-danger">Back</button>
                        <button type="submit" class="btn btn-primary">Save Detail</button>
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
    import { required,email,numeric } from 'vee-validate/dist/rules';

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

    import { mapState } from 'vuex';
    export default {
        name : "companyDetailForm",
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
            capitalize: function (value) {
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
                $this.$store.dispatch('saveCompany',formData)
                .then(function(response){
                    $this.isLoading = false;
                    if(response.status == true){
                        $this.$toastr.s("Company detail updated successfully","Success");
                    }else if(response.status == false){
                        $this.formErrors = response.errors;
                        $this.$toastr.e(response.message,"Error");
                    }
                });
           },
           formParam : function(){
              return {
                  id : 0,
                  company_id : '',
                  company_owner : '',
                  company_name : '',
                  company_logo : '',
                  company_desc : '',
                  company_phone : '',
                  company_city : '',
                  company_state : '',
                  company_country : '',
                  company_zip : '',
                  company_email : '',
                  company_facebook : '',
                  company_instagram : '',
                  company_twiiter : '',
                  company_pinterest : '',
                  image : ''
              }
           }
        },
        created(){
            let $this = this;
            this.$store.dispatch('editCompany',[])
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
