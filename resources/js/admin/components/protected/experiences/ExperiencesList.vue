<template>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Experiences
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{name : 'dashboard'}"><i class="fa fa-dashboard"></i>Home</router-link></li>
        <li class="active">Experiences</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title pull-right">
                  <router-link :to="{ name : 'experiences_add'}" class="btn btn-sm btn-success">
                      <i class="fa fa-plus-circle"></i> Add New
                  </router-link>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                          <th>Image</th>
                          <th>Experience</th>
                          <th>Category</th>
                          <th>Featured</th>
                          <th>Created By</th>
                          <th>Status</th>
                          <th>Last Updated</th>
                          <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(experience,key) in experiencesList" :key="key">
                        <td>
                           <img v-lazy="experience.image" height="50" width="50" class="img-circle" />
                        </td>
                        <td :title="experience.title">{{ (experience.title).substring(0,40)+'...' }}</td>
                        <td>{{ experience.category.name }}</td>
                        <td>
                          <span v-html=" manageFeatured(experience.featured)"></span> 
                        </td>
                        <td>{{ experience.user.userName }}</td>
                        <td>
                            <span v-html="manageStatus(experience.status)"></span>
                        </td>
                        <td>{{ experience.created_at | moment('YYYY-MM-DD') }}</td>
                        <td>
                            <router-link :to="{ path: '/admin/experiences/edit/'+experience.id }" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </router-link>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
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
    import {mapState} from "vuex";

    export default {
        name : "experiencesList",
        components: {
        },
        data:function(){
            return {

            }
        },
        methods : {
            getExperiences :function( page ){
                this.$store.dispatch('getExperiences',{ page : page });
            },
            pageClickHandler : function(pageNum){
                this.getExperiences(pageNum);
            },
            manageStatus:function(val){
                if(val == '1'){ return "<span class='label label-success'>Active</span>"; }
                else{ return "<span class='label label-danger label-pill'>In Active</span>"; }
            },
            manageFeatured:function(val){
                if(val == '1'){ return "<span class='label label-success'>Yes</span>"; }
                else{ return "<span class='label label-danger label-pill'>No</span>"; }
            }
        },
        created(){
            this.getExperiences( 1 );
        },
        computed : mapState({
            experiencesList : state => state.data.list,
            page : state => state.data.list_total,
        })
    }
</script>
<style scoped>

</style>
