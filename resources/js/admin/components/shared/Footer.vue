<template>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
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
    }
}
</script>
<style scoped>

</style>
