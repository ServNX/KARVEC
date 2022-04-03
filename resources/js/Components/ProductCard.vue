<template>
  <div class="product-item">
    <div class="card product-card">
      <img :src="product.primary_image" class="card-img-top" alt="...">
      <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
        <Link :href="product_url"><i class="bi bi-search fs-1 fw-bold"></i></Link>
      </div>
    </div>
    <p class="text-truncate">
      {{ product.name }}
    </p>
    <div class="product-price d-flex align-items-center justify-content-between">
      <p class="fw-bold fs-5">
        {{
          product.price_lowest === product.price_highest
              ? product.price_lowest
              : `${product.price_lowest} - ${product.price_highest}`
        }}
      </p>
      <a href="#"><i class="bi bi-heart fs-4"></i></a>
    </div>
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'ProductCard',
  props: {
    product: { required: true }
  },
  components: { Link },
  computed: {
    product_url () {
      const group = this.$parent.$props.collection.group.handle;
      const collection = this.$parent.$props.collection.url_slug;
      const product = this.product.url_slug;

      return `/shop/${group}/${collection}/${product}`;
    }
  }
};
</script>
