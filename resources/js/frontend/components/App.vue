<template>
    <div id="appComponent"> 
        <Headerc /> 
               <router-view></router-view> 
        <Footerc />  
    </div>
</template> 
<script>
    import Header from '../components/shared/Header';
    import Footer from '../components/shared/Footer';  
    export default {
        name:"appComponent",
        components : {
           Headerc : Header, 
           Footerc : Footer,
        },
        data : function(){
            return {

            }
        } 
    }
</script>
