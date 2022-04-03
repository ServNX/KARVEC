<template>
  <Layout can-alert>
    <product-details :product="product"></product-details>
  </Layout>
</template>

<style lang="scss" scoped>

</style>

<script>
import Layout from '../../Layouts/Main/Layout';
import ProductDetails from '../../Components/ProductDetails';

export default {
  name: 'ProductDetailsPage',
  props: {
    product: { required: true }
  },
  components: { Layout, ProductDetails }
};
</script>
