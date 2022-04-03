<template>
  <Layout>
    <div class="row g-4">
      <div class="col-md-12">
        <NewAddressModal :countries="countries"></NewAddressModal>
      </div>
      <div class="col-md-12">

      </div>
      <div class="col-md-12">

      </div>
      <div class="col-md-12">

      </div>
    </div>
  </Layout>
</template>

<style lang="scss" scoped>

</style>

<script>
import Layout from '../../../Layouts/User/Layout';
import NewAddressModal from '../../../Components/NewAddressModal';

export default {
  name: 'UserAddressesPage',
  props: {
    countries: { required: true },
  },
  components: { NewAddressModal, Layout },
};
</script>
