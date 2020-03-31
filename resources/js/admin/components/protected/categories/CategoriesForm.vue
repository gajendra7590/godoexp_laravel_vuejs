<template>
<div id="categoryForm">
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
         Manage Category
        <small>{{ action }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">Manage Category</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Category</h3>
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
                                        :src="formData.image" alt="Category Image" id="inputImagePreview">
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
                                <label>Category Name</label>
                                <validation-provider rules="required" v-slot="{ errors }">
                                   <input type="text" v-model="formData.name" name="name" class="form-control" placeholder="Category name..">
                                   <span class="text-danger">{{ errors[0] }}</span>
                                   <span class="text-danger">{{ formErrors.name }}</span>
                                </validation-provider>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Category Title</label>
                                <validation-provider rules="required" v-slot="{ errors }">
                                   <input type="text" v-model="formData.title" name="title" class="form-control" placeholder="Category title..">
                                   <span class="text-danger">{{ errors[0] }}</span>
                                   <span class="text-danger">{{ formErrors.title }}</span>
                                </validation-provider>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <validation-provider rules="required" v-slot="{ errors }">
                                   <textarea type="text" v-model="formData.description" name="description" rows="5" class="form-control" placeholder="Description..."></textarea>
                                   <span class="text-danger">{{ errors[0] }}</span>
                                   <span class="text-danger">{{ formErrors.description }}</span>
                                </validation-provider>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Status</label>
                                 <validation-provider rules="required" v-slot="{ errors }">
                                    <select class="form-control" v-model="formData.status" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                    <span class="text-danger">{{ errors[0] }}</span>
                                    <span class="text-danger">{{ formErrors.status }}</span>
                                </validation-provider>
                            </div>
                            <div class="form-group col-md-6">
                                <label></label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="featured" v-model="formData.featured" true-value="1" false-value="0"> Is featured
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" value="" v-model="formData.id" >
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">{{ action | capitalize  }}</button>
                        <button type="button" @click.prevent="goBack" class="btn btn-danger">Back</button>
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
    import { required,email } from 'vee-validate/dist/rules';
    extend('required', {
        ...required,
        message: 'This field is required'
    });
    extend('email', {
        ...email,
        message: 'This field is required valid email address.'
    });

    import { mapState } from 'vuex';
    export default {
        name : "categoryForm",
        components: {
           ValidationProvider,
           ValidationObserver
        },
        data: function () {
            return {
                isLoading : true,
                action : 'save',
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
                this.$router.push('/admin/categories');
            },
           onSubmit : function(){
               let formData  = new FormData($('#vuejsForm')[0]);
               let $this = this;
               if($this.action == 'save'){
                   $this.isLoading = true;
                   $this.$store.dispatch('saveCategory',formData)
                   .then(function(response){
                       $this.isLoading = false;
                       if(response.status == true){
                            $this.$toastr.s("New category created successfully","Success");
                            $this.$router.push('/admin/categories');

                       }else if(response.status == false){
                           $this.formErrors = response.errors;
                           $this.$toastr.e(response.message,"Error");
                       }
                    });

               }else{
                   $this.isLoading = true;
                   $this.$store.dispatch('updateCategory',{data:formData,id: $this.id})
                   .then(function(response){
                       $this.isLoading = false;
                       if(response.status == true){
                            $this.$toastr.s("Category updated successfully","Success");
                            $this.$router.push('/admin/categories');
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
                  name : '',
                  title : '',
                  featured : '',
                  description : '',
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
                this.$store.dispatch('editCategory',this.$route.params.id)
                .then(function(result){
                     $this.formData = result;
                     $this.isLoading = false;
                }).catch(error => {
                    this.$toastr.e(error.message, 'Getting Error');
                    $this.isLoading = false;
                });
            }else{
                this.action = 'save';
                this.formData = this.formParam();
                this.isLoading = false;
            }
        }
    }
</script>
<style scoped>

</style>
