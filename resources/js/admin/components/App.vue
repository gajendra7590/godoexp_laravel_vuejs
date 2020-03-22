<template>
    <div id="appComponent">
        <Headerc :userProfile="user" />
        <Sidebar :userProfile="user"/>
        <router-view></router-view>
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
        computed: mapState({
            user: state => state.userData,
        }),
    }
</script>
