<template>
<Model v-model="show" :as="as" @closed="form.reset()" title="New Address">
  <div class="row g-4 text-dark">
    <div class="col-md-12">
      <div class="form-floating">
        <input v-model="form.line_one"
               type="text"
               id="line_one"
               class="form-control"
               placeholder="Street Address" />
        <label for="line_one">Street Address</label>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-floating">
        <input v-model="form.line_two"
               type="text"
               id="line_two"
               class="form-control"
               placeholder="Address Line 2" />
        <label for="line_two">Address Line 2</label>
      </div>
    </div>

    <div class="col-md-6">
      <label for="country">Country</label>
      <v-select id="country"
                class="form-control"
                v-model="form.country_id"
                :options="countries"
                :reduce="o => o.id"
                label="name"
      ></v-select>
    </div>
    <div class="col-md-6">
      <label for="state">State</label>
      <v-select id="state"
                class="form-control"
                v-model="form.state"
                :options="states"
                :reduce="o => o.name"
                label="name"
      ></v-select>
    </div>

    <div class="col-md-6">
      <div class="form-floating">
        <input v-model="form.city"
               type="text"
               id="city"
               class="form-control"
               placeholder="City" />
        <label for="city">City</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating">
        <input v-model="form.postcode"
               type="text"
               id="postcode"
               class="form-control"
               placeholder="Postal Code" />
        <label for="postcode">Postal Code</label>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-floating">
        <input v-model="form.contact_phone"
               type="text"
               id="contact_phone"
               class="form-control"
               placeholder="Phone #" />
        <label for="contact_phone">Phone #</label>
      </div>
    </div>
  </div>

  <template v-slot:buttons>
    <Link @click="submit()" as="button" class="btn btn-primary">Save</Link>
  </template>
</Model>
</template>

<style lang="scss" scoped>

</style>

<script>
import { useForm, Link } from '@inertiajs/inertia-vue3';
import vSelect from 'vue-select';
import Model from './Model';

export default {
  name: 'NewAddressModal',
  props: {
    as: { type: String, default: 'button' },
    countries: { required: true }
  },
  components: { Model, vSelect, Link },
  data () {
    return {
      show: false,
      form: useForm({
        line_one: null,
        line_two: null,
        country_id: null,
        city: null,
        state: null,
        postcode: null,
        contact_phone: null
      }),
    }
  },
  computed: {
    states () {
      if (this.form.country_id) {
        let country = _.find(this.countries, (c) => {
          return c.id === this.form.country_id;
        });

        return country.states;
      }

      return [];
    }
  },
  methods: {
    submit() {
      this.form.post('/user/addresses', {
        onSuccess: () => {
          this.show = false;
          return form.reset()
        },
      })
    }
  }
};
</script>
