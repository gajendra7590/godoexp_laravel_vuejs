<template>
    <header class="Header" id="headerC">
        <nav class="navbar widget__Nav">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#goDOExprinc"> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>
                     </button>
                    <router-link 
                        :to="{ name : 'experiences_home'}" 
                        class="navbar-brand widget__header--logo"  
                        title="Go Do Experience">
                        <img src="http://61.246.140.190/godoexperience/asset/images/icons/godo_logo.png"  alt="Go/Do Experience"  class="img-responsive">
                    </router-link>
                </div>
                <div class="collapse navbar-collapse" id="goDOExprinc">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="#">host a home</a>
                        </li>
                        <li>
                           <a href="#">host an experience</a>
                        </li>
                        <li>
                           <a href="/godoexperience/contact-us">Help</a>
                        </li>
                        <li>
                           <a href="/godoexperience/register">sign up</a>
                        </li>
                        <li>
                           <a href="/godoexperience/login">log in</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>
<script>
export default {
    name : 'headerC',
    data : function() {
        return { 
        } 
    }
}
</script>