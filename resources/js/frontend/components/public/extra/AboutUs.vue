<template>
    <main class="inner-Page">
        <div class="inner-Page-content">
            <div class="cst-breadcrumbs">
                <h1>About us</h1>
                <ul>
                    <li><a href="<?= Url::to(['/']);?>">home</a></li>
                    <li><span>/</span></li>
                    <li><a href="javascript:void(0)">about us</a></li>
                </ul>
            </div>
        </div>
    </main>
</template>
<script>
    export default {
        name : 'aboutusC',
        data : function(){
            return {

            }
        } 
    }
</script>
<style lang="scoped">
    
</style>