<template>
<div id="profile">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         User Profile
        <small>update</small>
      </h1>
      <ol class="breadcrumb">
        <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
        <li class="active">User Profile</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                 <div class="col col-md-12">
                     <div class="row">
                        <div class="profileImageSection">
                            <div class="form-group col-md-4">
                                <div class="logoSection">
                                    <img class="profile-user-img img-responsive img-circle" src="dist/img/user2-160x160.jpg"
                                alt="User profile picture" id="inputImagePreview">
                                </div>
                                <div>
                                    <input type="file" name="company_logo" id="inputFileChooser" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Company Owner</label>
                            <input type="text" name="company_owner" class="form-control" placeholder="Company owner...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" placeholder="Company name...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Company Email</label>
                            <input type="text" name="company_email" class="form-control" placeholder="Company email...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Company Phone</label>
                            <input type="text" name="company_phone" class="form-control" placeholder="Company phone...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Company Description</label>
                            <textarea type="text" name="company_desc" rows="5" class="form-control" placeholder="Company description..."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>City</label>
                            <input type="text" name="company_city" class="form-control" placeholder="Company city...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>State</label>
                            <input type="text" name="company_state" class="form-control" placeholder="Company state...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Country</label>
                            <input type="text" name="company_country" class="form-control" placeholder="Company country...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Zip Code</label>
                            <input type="text" name="company_zip" class="form-control" placeholder="Company zip...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Facebook</label>
                            <input type="text" name="company_facebook" class="form-control" placeholder="Facebook link...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Instagram</label>
                            <input type="text" name="company_instagram" class="form-control" placeholder="Instagram link...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Twitter</label>
                            <input type="text" name="company_twiiter" class="form-control" placeholder="Twitter link...">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pinterest</label>
                            <input type="text" name="company_pinterest" class="form-control" placeholder="Pinterest link...">
                        </div>
                    </div>
                 </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Save Detail</button>
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

</div>
</template>
<script>
    import { BModal, VBModal } from 'bootstrap-vue';
    export default {
        name : "profile",
        components: {
            'b-modal': BModal
        },
        data: function () {
            return {
            }
        }
    }
</script>
<style scoped>

</style>
