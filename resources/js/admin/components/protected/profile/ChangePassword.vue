<template>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Change Password
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">Change Password</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                 <div class="col col-md-12">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Old Password</label>
                            <input type="text" name="company_owner" class="form-control" placeholder="**********">
                        </div>
                        <div class="form-group col-md-12">
                            <label>New Password</label>
                            <input type="text" name="company_name" class="form-control" placeholder="**********">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Confirm new password</label>
                            <input type="text" name="company_name" class="form-control" placeholder="**********">
                        </div>
                    </div>

                 </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
              </div>
            </form>
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
    export default {
        name : "changePassword",
        data: function () {
            return {
            }
        }
    }
</script>
<style scoped>

</style>
