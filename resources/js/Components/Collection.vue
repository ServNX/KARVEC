<template>
  <section class="collection">
    <div class="container" data-aos="fade-up" :data-aos-delay="aosDelay">
      <div class="section-title">
        <h2>{{ collection.name }}</h2>
        <div v-html="collection.description"></div>
      </div>

      <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4" data-aos="fade-up" data-aos-delay="100">
        <div v-for="product in publishedProducts" :key="product.id" class="col">
            <product-card :product="product"></product-card>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>
  @import "~/variables";

  .section-title {
    padding-bottom: 20px;
  }

  .section-title h2 {
    font-size: 24px;
    font-weight: 500;
    padding: 0;
    line-height: 1px;
    margin: 0 0 5px 0;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: $secondary;
    font-family: "Poppins", sans-serif;
  }

  .section-title h2::after {
    content: "";
    width: 120px;
    height: 1px;
    display: inline-block;
    background: $primary;
    margin: 4px 10px;
  }
</style>

<script>
import axios from '@/axios';
import ProductCard from './ProductCard';

export default {
  name: 'Collection',
  props: {
    collection: { required: true },
    aosDelay: { type: String, default: '100' }
  },
  components: {
    ProductCard
  },
  computed: {
    publishedProducts() {
      return _.filter(this.collection.products, (o) => {
        return o.status === 'published';
      });
    }
  }
};
</script>
