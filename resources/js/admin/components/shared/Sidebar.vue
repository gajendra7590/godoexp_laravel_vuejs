<template>
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img class="img-circle"
            onError="this.onerror=null;this.src='/dist/img/user2-160x160.jpg';"
            :src="userProfile.image" alt="Profile Image">
        </div>
        <div class="pull-left info">
          <p>{{ ( typeof(userProfile.userName)!='undefined')?userProfile.userName:'' }}</p>
          <router-link :to="{ name : 'adminProfile' }"><i class="fa fa-circle text-success"></i> Online</router-link>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li :class="(activeLink == 'dashboard')?'active':''">
          <router-link :to="{ name : 'dashboard' }">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </router-link>
        </li>
        <li :class="(activeLink == 'experiences_list' || activeLink == 'experiences_add' || activeLink == 'experiences_edit' )?'active':''">
          <router-link :to="{ name : 'experiences_list' }">
            <i class="fa fa-calendar"></i> <span>Experiences</span>
          </router-link>
        </li>
        <li :class="(activeLink == 'categories_list' || activeLink == 'categories_add' || activeLink == 'categories_edit' )?'active':''">
          <router-link :to="{ name : 'categories_list' }">
            <i class="fa fa-book"></i> <span>Categories</span>
          </router-link>
        </li>
        <li :class="(activeLink == 'clients_list' || activeLink == 'clients_add' || activeLink == 'clients_edit' )?'active':''">
           <router-link :to="{ name : 'clients_list' }">
            <i class="fa fa-users"></i> <span>Clients</span>
          </router-link>
        </li>
        <li :class="(activeLink == 'vendors_list' || activeLink == 'vendors_add' || activeLink == 'vendors_edit' )?'active':''">
           <router-link :to="{ name : 'vendors_list' }">
            <i class="fa fa-user-secret"></i> <span>Vendors</span>
          </router-link>
        </li>
         <li :class="(activeLink == 'company_detail')?'active':''">
           <router-link :to="{ name : 'company_detail' }">
            <i class="fa fa-building-o"></i> <span>Company Detail</span>
          </router-link>
        </li>
        <li :class="(activeLink == 'testimonials_list' || activeLink == 'testimonial_add' || activeLink == 'testimonial_edit')?'active':''">
           <router-link :to="{ name : 'testimonials_list' }">
            <i class="fa fa-quote-left"></i> <span>Testimonials</span>
          </router-link>
        </li>
         <li :class="(activeLink == 'adminProfile' )?'active':''">
           <router-link :to="{ name : 'adminProfile' }">
            <i class="fa fa-user-circle-o"></i> <span>Profile</span>
          </router-link>
        </li>
        <li :class="(activeLink == 'changePassword' )?'active':''">
           <router-link :to="{ name : 'changePassword' }">
            <i class="fa fa-key"></i> <span>Change Password</span>
          </router-link>
        </li>
        <li :class="(activeLink == 'adminLogout' )?'active':''">
           <a href="javascript:void(0);" @click.prevent="logoutAction">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</template>
<script>
export default {
    name : "sidebarc",
    props : ['userProfile'],
    data: function () {
        return {
           activeLink : ''
        }
    },
    methods:{
        logoutAction(){
            let $this = this;
            this.$dialog.confirm("Are you sure to logged Out ?", {
                loader: true
            })
            .then(dialog => {
               $this.$router.push({ name : 'adminLogout'});
            });
        }
    },
    created(){
        this.activeLink = this.$route.name;
    },
    watch:{
        '$route' (to, from){
            this.activeLink = to.name;
        },
    },
}
</script>
<style scoped>

</style>
