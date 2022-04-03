<template>
  <Layout can-alert>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-lg-7">
                <h5 class="mb-3">
                  <a href="#" class="text-body">
                    <div class="d-flex align-items-center">
                      <i class="ri ri-arrow-left-line me-2"></i> Continue shopping
                    </div>
                  </a>
                </h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have {{ lines.length }} item(s) in your cart</p>
                  </div>
                </div>

                <div v-for="line in lines" :key="line.id" class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                              :src="line.thumbnail"
                              class="img-fluid rounded-3"
                              alt="Shopping item"
                              style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{ line.description }}</h5>
                          <p class="small mb-0">{{ line.option }}</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">{{ line.quantity }}</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">{{ line.sub_total }}</h5>
                        </div>
                        <Link as="button"
                              method="post"
                              :href="`cart/remove/${line.id}`"
                              :disabled="form.processing"
                              class="btn btn-link text-dark-secondary"
                        >
                          <i class="ri ri-delete-bin-6-line"></i>
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">

                <div class="card bg-dark text-white rounded-3">
                  <div class="card-body">
                    <div class="row mb-4 text-dark">
                      <div class="col-md-12">
                        <h5 class="text-primary">Checkout Details</h5>
                      </div>
                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <select v-model="form.shipping_address"
                                  @change="addressChanged('shipping')"
                                  :disabled="form.processing"
                                  class="form-select"
                                  id="shipto"
                          >
                            <option v-for="address in addresses"
                                    :key="address.id"
                                    :value="address"
                            >
                              {{ formatAddress(address) }}
                            </option>
                          </select>
                          <label for="shipto">Shipping Address</label>
                        </div>
                      </div>
                      <div class="col-md-12 d-flex justify-content-between">
                        <div class="form-check text-white">
                          <input v-model="form.same_address"
                                 @change="addressChanged('shipping')"
                                 :disabled="form.processing"
                                 class="form-check-input"
                                 type="checkbox"
                                 id="sameAddress">
                          <label class="form-check-label" for="sameAddress">
                            Billing address is the same
                          </label>
                        </div>
                        <NewAddressModal as="link" :countries="countries"></NewAddressModal>
                      </div>
                      <div class="col-md-12">
                        <div v-if="!form.same_address" class="form-floating mb-3">
                          <select v-model="form.billing_address"
                                  @change="addressChanged('billing')"
                                  :disabled="form.processing"
                                  class="form-select"
                                  id="billto"
                          >
                            <option v-for="address in addresses"
                                    :key="address.id"
                                    :value="address"
                            >
                              {{ formatAddress(address) }}
                            </option>
                          </select>
                          <label for="billto">Billing Address</label>
                        </div>
                      </div>
                    </div>

                    <div class="mt-4">
                      <div class="form-outline form-white mb-4">
                        <div id="card-element"></div>
                      </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">{{ amounts.subtotal.formatted }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">Free</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Tax</p>
                      <p class="mb-2">{{ amounts.tax.formatted }}</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total (Incl. taxes)</p>
                      <p class="mb-2">{{ amounts.total.formatted }}</p>
                    </div>

                    <button :disabled="form.processing" @click="processPayment()" type="button"
                            class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between">
                        Process Payment <i class="ri ri-arrow-right-fill ms-2"></i>
                      </div>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<style lang="scss" scoped>
  @media (min-width: 1025px) {
    .h-custom {
      height: 100vh !important;
    }
  }
</style>

<script>
import { loadStripe } from '@stripe/stripe-js';
import Layout from '../../Layouts/Main/Layout';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import NewAddressModal from '../../Components/NewAddressModal';

export default {
  name: 'CartPage',
  props: {
    countries: { required: true },
    lines: { required: true },
    shipping_address: { required: true },
    billing_address: { required: true },
    addresses: { required: true },
    amounts: { required: true }
  },
  components: { NewAddressModal, Layout, Link },
  async mounted () {

    // Prepare our Stripe input element
    this.stripe = await loadStripe(process.env.MIX_STRIPE_KEY);
    const elements = this.stripe.elements();

    this.cardElement = elements.create('card', {
      classes: {
        base: 'form-control form-control-lg'
      }
    });

    this.cardElement.mount('#card-element');

    // We setup the default address data
    // todo: why does the meta data change to a string value when the address is updated ?
    let shipping_id;
    if (typeof this.shipping_address.meta === 'string') {
      shipping_id = JSON.parse(this.shipping_address.meta).address_id;
    } else {
      shipping_id = this.shipping_address.meta.address_id;
    }

    this.form.shipping_address = _.find(this.addresses, (add) => add.id === shipping_id);
    this.form.billing_address = this.form.shipping_address;
  },
  data () {
    return {
      stripe: {},
      cardElement: {},
      form: useForm({
        shipping_address: null,
        billing_address: null,
        type: null,
        same_address: true,
        payment_method_id: null
      }),
      paymentProcessing: false
    };
  },
  computed: {
    user () {
      return usePage().props.value.auth.user;
    }
  },
  methods: {
    addressChanged (type) {
      this.form.type = type;

      if (this.form.same_address) {
        this.form.billing_address = this.form.shipping_address;
      }

      this.form.post('/cart/address/update', {
        onSuccess: () => this.form.type = null
      });
    },
    formatAddress (address) {
      return `${address.line_one} ${address.city}, ${address.state} ${address.postcode}`;
    },
    async processPayment () {
      this.paymentProcessing = true;

      let customer = this.form.billing_address;

      const { paymentMethod, error } = await this.stripe.createPaymentMethod(
          'card', this.cardElement, {
            billing_details: {
              name: customer.first_name + ' ' + customer.last_name,
              email: customer.email,
              address: {
                line1: customer.line_one,
                city: customer.city,
                state: customer.state,
                postal_code: customer.postcode
              }
            }
          }
      );

      if (error) {
        this.paymentProcessing = false;
        console.error(error);
      } else {
        this.form.payment_method_id = paymentMethod.id;

        this.form.post('/cart/purchase', {
          onSuccess: () => {
            this.paymentProcessing = false;
          }
        });
      }
    }
  }
};
</script>
