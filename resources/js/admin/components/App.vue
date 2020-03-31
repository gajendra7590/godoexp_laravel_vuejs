<template>
    <div id="appComponent">
        <Headerc :userProfile="user" />
        <Sidebar :userProfile="user"/>
            <transition name="fade">
               <router-view></router-view>
            </transition>
        <Footerc :userProfile="user"/>
        <!-- <Asidec></Asidec> -->
    </div>
</template>

<script>
    import Header from '../components/shared/Header';
    import Sidebar from '../components/shared/Sidebar';
    import Footer from '../components/shared/Footer';
    import {  mapState } from "vuex";

    export default {
        name:"appComponent",
        components : {
           Headerc : Header,
           Sidebar : Sidebar,
           Footerc : Footer,
        },
        data : function(){
            return {

            }
        },
        created() {
            this.$store.dispatch('getProfile',{});
        },
        watch: {
            $route(to, from) {
                this.$store.state.data =  {
                    list : [],
                    list_total : 0,
                    editData : []
                }
            }
        },
        computed: mapState({
            user: state => state.userData,
        }),
    }
</script>
