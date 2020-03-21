<template>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
        </div>
        <strong>Copyright &copy; {{ date | moment("YYYY") }}  <router-link :to="{ name : 'dashboard'}"> GoDo Experience</router-link>.</strong> All rights
        reserved.
  </footer>
</template>
<script>
export default {
    name : "footerc",
    data: function () {
        return {
           date : new Date()
        }
    },
    mounted() {
            console.log('footer component mounted.')
    }
}
</script>
<style scoped>

</style>
