<template>
  <Layout can-alert>
    <template v-for="collection in collections.data" :key="collection.id">
      <Collection v-if="collection.products.length > 0"
                  :collection="collection"
      ></Collection>
    </template>
  </Layout>
</template>

<style lang="scss" scoped>

</style>

<script>
import Layout from '../../Layouts/Main/Layout';
import Collection from '../../Components/Collection';

export default {
  name: 'CollectionsPage',
  components: { Layout, Collection },
  props: {
    collections: { required: true }
  },
  computed: {}
};
</script>
