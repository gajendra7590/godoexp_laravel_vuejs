<template>
<div id="experienceForm">
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
         Manage Experiences
        <small>{{ action }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">Manage Experiences</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Manage Experiences</h3>
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
                                <!-- {{ formData }} -->
                                <!-- {{ formData }} -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Experience Title</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.title" name="title"
                                class="form-control" placeholder="Enter title...">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.title }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Experience Category</label>
                             <validation-provider rules="required" v-slot="{ errors }">
                                <select class="form-control" v-model="formData.category_id" name="category_id">
                                    <option value="">Select Category</option>
                                    <option v-for="category in categories" :value="category.id" :key="category.id">{{ category.name }}</option>
                                </select>
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.category_id }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Experience Price</label>
                             <validation-provider rules="required" v-slot="{ errors }">
                                <input type="text" v-model="formData.price" name="price" class="form-control"
                                placeholder="Enter price..">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.price }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Experience Status</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <select class="form-control" v-model="formData.status" name="status">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.status }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Experience Sub Title</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <textarea v-model="formData.sub_title" rows="3" name="sub_title"
                                class="form-control" placeholder="Enter sub title.."></textarea>
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.sub_title }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Experience Description</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <vue-editor id="editor1" v-model="formData.description"></vue-editor>
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.description }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Duration</label>
                            <validation-provider rules="required|numeric" v-slot="{ errors }">
                                <input type="text" v-model="formData.duration" name="duration"
                                class="form-control" placeholder="Duration..">
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.duration }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Duration Type</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <select class="form-control" v-model="formData.duration_type" name="duration_type">
                                    <option value="days">Days</option>
                                    <option value="hours">Hours</option>
                                    <option value="minutes">Minutes</option>
                                </select>
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.duration_type }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Group Size</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                               <input type="text" v-model="formData.group_size" name="group_size"
                               class="form-control" placeholder="Group Size">
                               <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.group_size }}</span>
                            </validation-provider>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Activity Level</label>
                            <validation-provider rules="required" v-slot="{ errors }">
                                <select class="form-control" v-model="formData.activity_level" name="activity_level">
                                    <option value="light">Light</option>
                                    <option value="moderate">Moderate</option>
                                    <option value="strenuous">Strenuous</option>
                                    <option value="extreme">Extreme</option>
                                </select>
                                <span class="text-danger">{{ errors[0] }}</span>
                                <span class="text-danger">{{ formErrors.activity_level }}</span>
                            </validation-provider>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Country</label>
                            <input type="text" v-model="formData.country" name="country"
                            class="form-control" placeholder="Country..">
                        </div>
                        <div class="form-group col-md-2">
                            <label>State</label>
                            <input type="text" v-model="formData.state" name="state"
                            class="form-control" placeholder="State..">
                        </div>
                        <div class="form-group col-md-2">
                            <label>City</label>
                            <input type="text" v-model="formData.city" name="city"
                            class="form-control" placeholder="City..">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Latitude</label>
                            <input type="text" v-model="formData.latitude" name="latitude"
                            class="form-control" placeholder="latitude..">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Longitude</label>
                            <input type="text" v-model="formData.longitude" name="longitude"
                            class="form-control" placeholder="longitude..">
                        </div>
                    </div>
                     <div class="row" v-if="action == 'update'">
                        <div class="form-group col-md-12">
                          <label>Upload Slider Images</label>
                          <vue-dropzone
                             ref="myVueDropzone"
                             id="dropzone"
                             :options="dropzoneOptions"
                             v-on:vdropzone-removed-file="removeThisFile"
                          >
                          </vue-dropzone>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label>Manage Experience Adons</label>
                           <a href="javascript:void(0);" @click.prevent="addNewAdons" class="btn btn-sm btn-success pull-right">
                               <i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a>
                        </div>
                        <div id="adonsContainer">
                            <div v-for="(item,key) in formData.adons"
                                 :key="key"
                                 v-show="!item.isDeleted"
                                 class="form-group col-md-12"
                                 >
                                 <div style="display:none;">{{ randomKey =  Date.now()+key }}</div>
                                <div class="form-group col-md-3">
                                    <label>Name</label>
                                    <input type="text"
                                            :name="'adons['+randomKey+'][ad_name]'"
                                            :value="item.name"
                                            class="form-control"
                                            placeholder="name..">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Description</label>
                                    <input type="text"
                                           :name="'adons['+randomKey+'][ad_description]'"
                                           :value="item.description"
                                           class="form-control"
                                           placeholder="description..">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Price</label>
                                    <input type="text"
                                           :name="'adons['+randomKey+'][ad_price]'"
                                           :value="item.price"
                                           class="form-control"
                                           placeholder="price..">
                                </div>
                                <div class="form-group col-md-3">
                                    <label></label>
                                    <input type="hidden"
                                           :name="'adons['+randomKey+'][ad_isDeleted]'"
                                           :value="item.isDeleted">
                                    <input type="hidden"
                                           :name="'adons['+randomKey+'][ad_id]'"
                                           :value="item.id">
                                    <a @click.prevent="removeAdons(item.id,key)" href="javascript:void(0);"
                                        class="btn btn-sm btn-danger remove_icon">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col-md-12">
                            <label>Featured</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="featured" v-model="formData.featured" true-value="1" false-value="0"> Is featured
                                </label>
                            </div>
                        </div>
                     </div>
                 </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">{{ action | capitalize }}</button>
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
    import { required,email,numeric } from 'vee-validate/dist/rules';
    import { VueEditor } from "vue2-editor";
    import vue2Dropzone from 'vue2-dropzone';
    import 'vue2-dropzone/dist/vue2Dropzone.min.css';

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
        name : "experiencesForm",
        components: {
           ValidationProvider,
           ValidationObserver,
           VueEditor,
           vueDropzone: vue2Dropzone
        },
        data: function () {
            return {
                isLoading : true,
                action : 'create',
                id : 0,
                formData : [],
                formErrors : [],
                categories : [],
                dropzoneOptions: { //Dropzone file upload
                    url: 'http://localhost:8000/api/admin/experience/media/'+this.$route.params.id,
                    thumbnailWidth: 200,
                    maxFilesize: null,
                    acceptedFiles : 'image/*',
                    addRemoveLinks: true,
                    dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Upload Slider Images",
                    dictRemoveFileConfirmation : 'Are you sure to delete?',
                    headers: {
                        "Authorization" : "Bearer "+localStorage.getItem('token')
                    },
                    renameFile : function(filename, file) {
                        var fileExt = (filename.name).split('.').pop();
                        var randonfilename = Math.round(Math.random() * Math.pow(5000, 5));
                        return randonfilename+'.'+fileExt;
                    }
                }
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
                this.$router.push('/admin/experiences');
            },
            addNewAdons : function(){
                let oldObj = this.formData.adons;
                let newObj = {
                    id: 'null',
                    experiences_id: 37,
                    name:'',
                    description: '',
                    price: '',
                }
                oldObj.push(newObj);
            },
            removeAdons : function(id,index){
                 if(id == 'null'){
                     let oldObj = this.formData.adons;
                     oldObj.splice(index, 1);
                 }else{
                    let oldObj = this.formData.adons;
                    this.$set(oldObj[index], 'isDeleted', true);
                 }

            },
            removeThisFile : function(file, error, xhr){
                 let $this = this;
                 var name =  null;
                 if( typeof(file.upload)!='undefined'){
                     name = file.upload.filename;
                 }else { name = file.name; }


                 if(this.$route.params.id != undefined){
                    let payload = { id : this.$route.params.id,filename : name}
                    this.$store.dispatch('deleteExperienceMedia',payload)
                    .then(function(response){
                        if(response.status == true ){
                            $this.$toastr.s('Slider image deleted',"Delete?");

                        }
                    });
                 }
            },
            setuploadedMedia(){
               if( typeof(this.formData.media.length)!=undefined && this.formData.media.length > 0){
                   let $this = this;
                   this.formData.media.forEach(function(element, i){
                        var file = {
                                name: element.image_name,
                                size: element.image_size,
                                type: element.image_mime
                        };
                        var url = element.image;
                        $this.$refs.myVueDropzone.manuallyAddFile(file, url);
                   });
               }
            },
            getFileName : function(){
                this.$uuid.v1();
            },
            getCategories : function(){
                 let $this = this;
                 this.$store.dispatch('experienceCategories')
                 .then(function(response){
                     $this.categories = response;
                 });
            },
           onSubmit : function(){
               let formData  = new FormData($('#vuejsForm')[0]);
               formData.append('description',this.formData.description);
               let $this = this;
               if($this.action == 'create'){
                   $this.isLoading = true;
                   $this.$store.dispatch('saveExperience',formData)
                   .then(function(response){
                       $this.isLoading = false;
                       if(response.status == true){
                            $this.$toastr.s("New experience created successfully","Success");
                            $this.$router.push('/admin/experiences');

                       }else if(response.status == false){
                           $this.formErrors = response.errors;
                           $this.$toastr.e(response.message,"Error");
                       }
                    });

               }else{
                   $this.isLoading = true;
                   $this.$store.dispatch('updateExperience',{data:formData,id: $this.id})
                   .then(function(response){
                       $this.isLoading = false;
                       if(response.status == true){
                            $this.$toastr.s("Experience updated successfully","Success");
                            $this.$router.push('/admin/experiences');
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
                  category_id : '',
                  title : '',
                  sub_title : '',
                  description : '',
                  price : '',
                  duration : '',
                  duration_type : '',
                  group_size : '',
                  activity_level : '',
                  country : '',
                  state : '',
                  city : '',
                  latitude : '',
                  longitude : '',
                  featured : '',
                  media : [],
                  adons : [],
                  image : '',
                  status : 1,
              }
           }
        },
        created(){
            this.getCategories(); //get categories
            if(this.$route.params.id != undefined){
                this.id = this.$route.params.id;
                this.action = 'update';
                let $this = this;
                this.$store.dispatch('editExperience',this.$route.params.id)
                .then(function(result){
                     $this.formData = result;
                     $this.setuploadedMedia();
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
<style>
    #editor1 {
       height: 350px;
    }
    .ql-editor {
        max-height: 350px;
    }

    .remove_icon {
        margin-top: 27px;
    }

</style>
