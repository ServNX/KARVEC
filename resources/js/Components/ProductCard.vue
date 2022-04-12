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
      <button v-if="product.has_favorited !== null"
              @click="toggleFavorite"
              class="btn btn-link border-0"
      >
        <i :class="`bi ${favorited ? 'bi-heart-fill' : 'bi-heart'} fs-4`"></i>
      </button>
    </div>
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
import { Link, useForm } from '@inertiajs/inertia-vue3';

export default {
  name: 'ProductCard',
  props: {
    product: { required: true }
  },
  data () {
    return {
      favorited: false,
      form: useForm({
        'product_id': null
      })
    };
  },
  components: { Link },
  computed: {
    product_url () {
      const group = this.$parent.$props.collection.group.handle;
      const collection = this.$parent.$props.collection.url_slug;
      const product = this.product.url_slug;

      return `/shop/${group}/${collection}/${product}`;
    }
  },
  methods: {
    toggleFavorite () {
      this.favorited = !this.favorited;
      this.form.post('/product/favorite');
    }
  },
  mounted () {
    this.form.product_id = this.product.id;
    this.favorited = this.product.has_favorited;
  }
};
</script>
