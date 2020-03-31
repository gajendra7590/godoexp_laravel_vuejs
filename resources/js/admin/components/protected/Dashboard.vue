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
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                <h3>{{ dashbaord.clients_count }}</h3>

                <p>Total Clients</p>
                </div>
                <div class="icon">
                   <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <router-link :to="{ name : 'clients_list'}" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </router-link>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                <h3>{{ dashbaord.vendors_count }}</h3>

                <p>Total Vendors</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-secret" aria-hidden="true"></i>
                </div>
                <router-link :to="{ name : 'vendors_list'}" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </router-link>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>{{ dashbaord.experiences_count }}</h3>

                <p>Total Experiences</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                </div>
                <router-link :to="{ name : 'experiences_list'}" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </router-link>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                <h3>{{ dashbaord.categories_count }}</h3>

                <p>Total Categories</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list-alt" aria-hidden="true"></i>
                </div>
                <router-link :to="{ name : 'categories_list'}" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </router-link>
            </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</template>
<script>
    export default {
        name : "dashbaordC",
        data: function () {
            return {
                isLoading : true,
                dashbaord : {
                    experiences_count : 0,
                    clients_count : 0,
                    vendors_count : 0,
                    categories_count : 0,
                },
            }
        },
        created(){
            let $this = this;
            this.$store.dispatch('getWidgets',[])
            .then(function(result){
               $this.isLoading = false;
               $this.dashbaord = result;
            }).catch(error => {
                this.$toastr.e(error.message, 'Getting Error');
                $this.isLoading = false;
            });

        }
    }
</script>
<style scoped>

</style>
