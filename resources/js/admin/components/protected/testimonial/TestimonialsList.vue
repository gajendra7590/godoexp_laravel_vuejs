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
        Testimonials
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{name : 'dashboard'}"><i class="fa fa-dashboard"></i>Home</router-link></li>
        <li class="active">Testimonials</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title pull-right">
                  <router-link :to="{ name : 'testimonial_add' }" class="btn btn-sm btn-success">
                      <i class="fa fa-plus-circle"></i> Add New
                  </router-link>
              </h3>
            </div>
            <!-- {{ categoriesLst | json }} -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Client Name</th>
                        <th>Client Position</th>
                        <th>Client Message</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(testimonial,key) in testimonialsLst" :key="key">
                        <td>
                           <img v-lazy="testimonial.image" height="50" width="50" class="img-circle" />
                        </td>
                        <td>{{ testimonial.client_name }}</td>
                        <td>{{ testimonial.client_position }}</td>
                        <td style="width:35%" v-html="testimonial.client_message">
                        </td>
                        <td>{{ testimonial.created_at | moment('YYYY-MM-DD hh:m:s') }}</td>
                        <td>
                            <router-link :to="{ path: '/admin/testimonial/edit/'+testimonial.id }" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </router-link>
                            <button href="#" @click.prevent="deleteAction( testimonial.id )" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                            <!-- <span class='label label-success'>Active</span> -->
                        </td>
                    </tr>
                </tbody>
              </table>
              <div class="pagination_container pull-right">
                <paginate
                    :pageCount="page"
                    :page-range="3"
                    :margin-pages="2"
                    :clickHandler="pageClickHandler"
                    :prevText="'Prev'"
                    :nextText="'Next'"
                    :containerClass="'pagination'">
                </paginate>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</template>
<script>
    import { mapState } from 'vuex'
    export default {
        name : "testimonialsList",
        data:function(){
            return {
                isLoading : true
            }
        },
        methods : {
            getTestimonials :function( page ){
                this.$store.dispatch('getTestimonials',{page:page});
            },
            pageClickHandler : function(pageNum){
                this.getTestimonials(pageNum);
            },
            deleteAction: function(id){
                this.$dialog
                .confirm("Are you sure want to delete?,it'll be gone forever.", {
                    loader: true
                })
                .then(dialog => {
                   let $this = this;
                   this.$store.dispatch('deleteTestimonial',{id: id})
                   .then(function(response){
                        dialog.close();
                       if(response.status == true){
                           $this.$toastr.s("Testimonial deleted successfully","Success");
                           $this.getTestimonials(1);
                       }else if(response.status == false){
                           $this.$toastr.e("Error in delete Testimonial","Error");
                       }
                    });

                });
            }
        },
        mounted(){
             this.isLoading = false;
        },
        created(){
            this.getTestimonials(1);
        },
        computed : mapState({
              testimonialsLst : state => state.data.list,
              page : state => state.data.list_total,
        })
    }
</script>
<style scoped>

</style>
