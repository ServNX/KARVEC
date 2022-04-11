<template>
  <div class="d-flex justify-content-center align-items-center">
    <div v-if="$page.props.flash.error" class="alert alert-danger" v-html="$page.props.flash.error"></div>
    <div v-if="$page.props.flash.success" class="alert alert-success" v-html="$page.props.flash.success"></div>
    <div v-if="$page.props.flash.warning" class="alert alert-warning" v-html="$page.props.flash.warning"></div>
    <div v-if="$page.props.flash.info" class="alert alert-info" v-html="$page.props.flash.info"></div>
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
export default {
  name: 'Alert'
};
</script>
