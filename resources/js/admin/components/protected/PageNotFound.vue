<template>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Not Found
            </h1>
            <ol class="breadcrumb">
                <li><router-link :to="{ name : 'dashboard'}"><i class="fa fa-dashboard"></i> Home</router-link></li>
                <li class="active">Page Not Found</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <router-link :to="{ name : 'dashboard'}">return to dashboard</router-link> or try using the search form.
                    </p>
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
            </section>
    </div>
</template>
<script>
    export default {
        name : "pagenotfoundC",
        data: function () {
            return {
            }
        }
    }
</script>
<style scoped>

</style>
