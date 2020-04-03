<template>
      <header class="main-header">
    <!-- Logo -->
     <router-link :to="{ name : 'dashboard' }" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>DE</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GoDo</b> Experience</span>
    </router-link>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img class="user-image"
                    onError="this.onerror=null;this.src='/dist/img/user2-160x160.jpg';"
                    :src="userProfile.image" alt="Profile Image">
              <span class="hidden-xs">
                 {{ ( typeof(userProfile.userName)!='undefined')?userProfile.userName:'' }}
               </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img class="img-circle"
                    onError="this.onerror=null;this.src='/dist/img/user2-160x160.jpg';"
                    :src="userProfile.image" alt="Profile Image">
                <p>
                  {{ ( typeof(userProfile.userName)!='undefined')?userProfile.userName:'' }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <router-link :to="{ name : 'adminProfile' }" class="btn btn-default btn-flat">Profile</router-link>
                </div>
                <div class="pull-right">
                  <a href="javascript:void(0);" @click.prevent="logoutAction" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

</template>
<script>
import {  mapState, Store } from "vuex";
export default {
    name : "headerc",
    props: ['userProfile'],
    data: function (props) {
        return {
           //userData : []
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
}
</script>
<style scoped>

</style>
