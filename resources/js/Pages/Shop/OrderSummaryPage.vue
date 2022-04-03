<template>
  <Layout can-alert>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <h5 class="text-uppercase">{{ name }}</h5>
        <h4 class="mt-5 theme-color mb-5">Thanks for your order</h4>
        <span>Payment Summary</span>
        <div class="mb-3">
          <hr>
        </div>

        <div v-for="line in lines" :key="line.id" class="card mb-3">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div class="d-flex flex-row align-items-center">
                <div>
                  <img v-if="line.thumbnail"
                       :src="line.thumbnail"
                       class="img-fluid rounded-3"
                       alt="Shopping item"
                       style="width: 65px;">
                  <div v-else style="width: 65px;"></div>
                </div>
                <div class="ms-3">
                  <h5>{{ line.description }}</h5>
                  <p class="small mb-0">{{ line.option }}</p>
                </div>
              </div>
              <div class="d-flex flex-row align-items-center">
                <div style="width: 50px;">
                  <h5 class="fw-normal mb-0">{{ line.unit_quantity }}</h5>
                </div>
                <div style="width: 80px;">
                  <h5 class="mb-0">{{ line.unit_price }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <small>Tax</small> <small>{{ taxTotal }}</small>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <span class="font-weight-bold">Total</span>
          <span class="font-weight-bold theme-color">{{ total }}</span>
        </div>
      </div>
    </div>
  </Layout>
</template>

<style lang="scss" scoped>
  hr {
    border-top: 2px dashed #fff;
    margin: 0.4rem 0
  }
</style>

<script>
import Layout from '../../Layouts/Main/Layout';

export default {
  name: 'OrderSummaryPage',
  components: { Layout },
  props: {
    name: { type: String, required: true },
    lines: { required: true },
    taxTotal: { required: true },
    total: { required: true }
  }
};
</script>
