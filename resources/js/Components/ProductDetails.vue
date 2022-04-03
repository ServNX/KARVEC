<template>
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4 col-xl-6">
        <img :src="image" class="img-fluid" width="500" alt="" />
      </div>
      <div class="col-lg-8 col-xl-6">

        <div class="row">
          <div class="col-md-12">
            <h1>{{ product.data.name }}</h1>
          </div>
        </div><!-- end row -->


        <div class="row">
          <div class="col-md-12">
            <span class="fw-bold me-2">Sku:</span>
            <span class="font-monospace">{{ variant.sku }}</span>
          </div>
        </div><!-- end row -->

        <div class="row">
          <div class="col-md-12">
            <h2>{{ price }}</h2>
          </div>
        </div><!-- end row -->

        <div class="row">
          <div class="col-md-12 fs-4 text-primary">
            <span class="bi bi-star-fill me-1" aria-hidden="true"></span>
            <span class="bi bi-star-fill me-1" aria-hidden="true"></span>
            <span class="bi bi-star-fill me-1" aria-hidden="true"></span>
            <span class="bi bi-star-fill me-1" aria-hidden="true"></span>
            <span class="bi bi-star-half me-1" aria-hidden="true"></span>
            <span class="text-dark fs-6">(15)</span>
          </div>
        </div><!-- end row -->

        <div v-for="option in product.data.options" :key="option.option.id">
          <div class="form-floating mb-3">
            <select @change="optionChanged(option, $event)"
                    class="form-select"
                    id="floatingSelect"
            >
              <option v-for="value in option.values"
                      :key="value.id"
                      :value="value.id"
              >
                {{ value.name.en }}
              </option>
            </select>
            <label for="floatingSelect">{{ option.option.name.en }}</label>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <vue-number-input v-model="form.quantity"
                              :min="1"
                              :max="10"
                              controls
                              inline
            ></vue-number-input>
          </div>
          <div class="col-md-8">
            <button @click="form.post('/cart/store')" class="btn btn-primary me-3">
              <i class="ri-shopping-cart-line"></i> Add To Cart
            </button>
            <button class="btn btn-info">
              <i class="ri-handbag-line"></i> Buy Now
            </button>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-md-12">
            <div class="accordion accordion-flush">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseOne" aria-expanded="false"
                          aria-controls="flush-collapseOne">
                    Product Description
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse"
                     aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body" v-html="product.data.description"></div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseTwo" aria-expanded="false"
                          aria-controls="flush-collapseTwo">
                    Shipping Info
                  </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                     aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    Under Construction
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseThree" aria-expanded="false"
                          aria-controls="flush-collapseThree">
                    Returns & Refunds
                  </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                     aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    Under Construction
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end row -->

      </div>
    </div><!-- end row -->
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import VueNumberInput from '@chenfengyuan/vue-number-input';

export default {
  name: 'ProductDetails',
  props: {
    product: { required: true }
  },
  components: { VueNumberInput },
  data () {
    return {
      form: useForm({
        id: null,
        quantity: 1,
        buynow: false,
      }),
      selectedOptionValues: {}
    };
  },
  computed: {
    variant () {
      let variant = _.find(this.product.data.variants, (v) => {
        let ids = _.map(v.values, 'id');
        let selectedIds = _.values(this.selectedOptionValues);
        let diff = _.difference(ids, selectedIds);
        return !diff.length;
      });

      this.form.id = variant.id;
      return variant;
    },
    primary_media () {
      return _.filter(this.product.data.media, (o) => {
        return o.custom_properties.primary;
      });
    },
    image () {
      let media, id, name;

      media = this.primary_media;

      if (this.variant.media.length > 0) {
        media = this.variant.media;
      }

      id = media[0].id;
      name = media[0].name + '-medium.jpg';
      return `/storage/${id}/conversions/${name}`;
    },
    price () {
      return this.variant.prices[0].formatted;
    }
  },
  methods: {
    optionChanged (option, event) {
      let selectedValue = parseInt(event.target.value);
      let selectedOption = parseInt(option.option.id);

      this.selectedOptionValues[selectedOption] = selectedValue;
    }
  },
  beforeMount () {
    _.forEach(this.product.data.options, (option) => {
      this.selectedOptionValues[option.option.id] = option.values[0].id;
    });
  }
};
</script>
