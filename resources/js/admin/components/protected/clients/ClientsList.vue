<template>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients
        <small>list</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{name : 'dashboard'}"><i class="fa fa-dashboard"></i>Home</router-link></li>
        <li class="active">Clients</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title pull-right">
                  <router-link :to="{ name : 'clients_add' }" class="btn btn-sm btn-success">
                      <i class="fa fa-plus-circle"></i> Add New
                  </router-link>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="clientListTabel" class="table table-bordered table-hover adminTableList">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(client,key) in clientsLst" :key="key">
                        <td><img v-lazy="client.image" height="50" width="50" class="img-circle" /></td>
                        <td>{{ client.first_name }}</td>
                        <td>{{ client.last_name }}</td>
                        <td>{{ client.email }}</td>
                        <td>{{ (client.phone!='')?client.phone:'--' }}</td>
                        <td>
                            <span v-html="manageGender(client.gender)"></span>
                        </td>
                        <td>
                            <span v-html="manageStatus(client.status)"></span>
                        </td>
                        <td>{{ client.created_at | moment('YYYY-MM-DD hh:m:s') }}</td>
                        <td>
                            <router-link :to="{ path: '/admin/clients/edit/'+client.id }" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </router-link>
                            <button href="#" @click.prevent="deleteAction( client.id )" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
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
        name : "clientList",
        data:function(){
            return {

            }
        },
        methods : {
            getClients :function( page ){
                this.$store.dispatch('getClients',{page:page});
            },
            pageClickHandler : function(pageNum){
                this.getClients(pageNum);
            },
            manageStatus:function(val){
                if(val == '1'){ return "<span class='label label-success'>Active</span>"; }
                else{ return "<span class='label label-danger label-pill'>In Active</span>"; }
            },
            manageGender:function(val){
                if(val == 'male'){ return "<i title='Male' class='fa fa-male male_female' aria-hidden='true'></i>"; }
                else if(val == 'female'){ return "<i title='Female' class='fa fa-female male_female' aria-hidden='true'></i>"; }
                else{ return '--'; }
            },
             deleteAction: function(id){
                this.$dialog
                .confirm("If you delete this record, it'll be gone forever.", {
                    loader: true
                })
                .then(dialog => {
                   let $this = this;
                   this.$store.dispatch('deleteClients',{id: id})
                   .then(function(response){
                        dialog.close();
                       if(response.status == true){
                           $this.$toastr.s("Client deleted successfully","Success");
                           $this.getClients(1);
                       }else if(response.status == false){
                           $this.$toastr.e("Error in delete Client","Error");
                       }
                    });

                });
            }
        },
        created(){
            this.getClients(1);
        },
        computed : mapState({
              clientsLst : state => state.data.list,
              page : state => state.data.list_total,
        })
    }
</script>
<style scoped>

</style>
