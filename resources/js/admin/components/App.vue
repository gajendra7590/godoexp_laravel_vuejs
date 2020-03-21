<template>
    <div id="appComponent">
        <Headerc></Headerc>
        <Sidebar></Sidebar>
        <router-view></router-view>
        <Footerc></Footerc>
        <!-- <Asidec></Asidec> -->
    </div>
</template>

<script>
    import Header from '../components/shared/Header';
    import Sidebar from '../components/shared/Sidebar';
    import Footer from '../components/shared/Footer';
    // import Aside from '../components/shared/Aside';

    export default {
        name:"appComponent",
        components : {
           Headerc : Header,
           Sidebar : Sidebar,
           Footerc : Footer,
        //    Asidec : Aside,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
