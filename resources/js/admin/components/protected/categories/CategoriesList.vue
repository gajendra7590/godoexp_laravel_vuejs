<template>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{name : 'dashboard'}"><i class="fa fa-dashboard"></i>Home</router-link></li>
        <li class="active">Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title pull-right">
                  <router-link :to="{ name : 'categories_add' }" class="btn btn-sm btn-success">
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
                        <th>Category name</th>
                        <th>Category title</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category,key) in categoriesLst" :key="key">
                        <td>
                           <img v-lazy="category.image" height="50" width="50" class="img-circle" />
                        </td>
                        <td>{{ category.name }}</td>
                        <td>{{ category.title }}</td>
                        <td>
                            <span v-html="manageStatus(category.status)"></span>
                        </td>
                        <td>{{ category.created_at | moment('YYYY-MM-DD hh:m:s') }}</td>
                        <td>
                            <router-link :to="{ path: '/admin/categories/edit/'+category.id }" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </router-link>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                            <!-- <span class='label label-success'>Active</span> -->
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>

            <paginate
                :pageCount="page"
                :page-range="3"
                :margin-pages="2"
                :clickHandler="pageClickHandler"
                :prevText="'Prev'"
                :nextText="'Next'"
                :containerClass="'pagination'">
            </paginate>
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
        name : "categoriesList",
        data:function(){
            return {

            }
        },
        methods : {
            getCategories :function( page ){
                this.$store.dispatch('getCategory',{page:page});
            },
            pageClickHandler : function(pageNum){
                this.getCategories(pageNum);
            },
            manageStatus:function(val){
                if(val == '1'){ return "<span class='label label-success'>Active</span>"; }
                else{ return "<span class='label label-danger label-pill'>In Active</span>"; }
            }
        },
        created(){
            this.getCategories(1);
        },
        computed : mapState({
              categoriesLst : state => state.categories.list,
              page : state => state.categories.list_total,
        })
    }
</script>
<style scoped>

</style>
