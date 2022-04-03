<template>
  <Layout>
    <section class="h-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body p-0">

                <div class="row g-0">

                  <!-- LEFT COLUMN -->
                  <div class="col-lg-6 p-5">
                    <h3 class="text-primary fw-normal mb-5">General Information</h3>

                    <div class="row text-dark g-4">

                      <div class="col-md-12">
                        <div class="form-floating">
                          <input v-model="form.email"
                                 type="text"
                                 id="email"
                                 class="form-control"
                                 placeholder="Email" />
                          <label for="email">Email</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating">
                          <input v-model="form.password"
                                 type="password"
                                 id="password"
                                 class="form-control"
                                 placeholder="Password" />
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input v-model="form.password_confirmation"
                                 type="password"
                                 id="password_confirmation"
                                 class="form-control"
                                 placeholder="Confirm Password" />
                          <label for="password_confirmation">Confirm Password</label>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-floating">
                          <select v-model="form.title" id="title" class="form-select">
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Miss">Miss</option>
                          </select>
                          <label for="title">Title</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating">
                          <input v-model="form.first_name"
                                 type="text"
                                 id="first_name"
                                 class="form-control"
                                 placeholder="First Name" />
                          <label for="first_name">First Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input v-model="form.last_name"
                                 type="text"
                                 id="last_name"
                                 class="form-control"
                                 placeholder="Last Name" />
                          <label for="last_name">Last Name</label>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="mb-4 pb-2">
                          <div class="form-floating">
                            <input v-model="form.company_name"
                                   type="text"
                                   id="company_name"
                                   class="form-control"
                                   placeholder="Company Name" />
                            <label for="company_name">Company Name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- RIGHT COLUMN -->
                  <div class="col-lg-6 bg-dark text-white p-5">
                    <h3 class="fw-normal mb-5 text-primary">Contact Details</h3>

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
                        <label class="text-light" for="country">Country</label>
                        <v-select id="country"
                                  class="form-control"
                                  v-model="form.country_id"
                                  :options="countries"
                                  :reduce="o => o.id"
                                  label="name"
                        ></v-select>
                      </div>
                      <div class="col-md-6">
                        <label class="text-light" for="state">State</label>
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

                      <div class="col-md-12">
                        <div class="form-check d-flex justify-content-start mb-4 pb-3">
                          <input
                              class="form-check-input me-3"
                              type="checkbox"
                              value=""
                              id="terms"
                          />
                          <label class="form-check-label text-white" for="terms">
                            I accept the
                            <Link target="_blank" href="#"><u>Terms and Conditions</u></Link>
                            of your site.
                          </label>
                        </div>
                      </div>
                    </div>

                    <button @click="form.post('/register')" type="button" class="btn btn-primary btn-lg">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </Layout>
</template>

<style lang="scss" scoped>

</style>

<script>
import Layout from '../../Layouts/Main/Layout';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import vSelect from 'vue-select';

export default {
  name: 'RegistrationPage',
  components: { Layout, Link, vSelect },
  props: {
    countries: { required: true }
  },
  data () {
    return {
      form: useForm({
        email: null,
        password: null,
        password_confirmation: null,
        title: null,
        first_name: null,
        last_name: null,
        company_name: null,
        line_one: null,
        line_two: null,
        city: null,
        state: null,
        postcode: null,
        country_id: null,
        contact_phone: null
      })
    };
  },
  computed: {
    errors () {
      return this.form.errors;
    },
    states () {
      if (this.form.country_id) {
        let country = _.find(this.countries, (c) => {
          return c.id === this.form.country_id;
        });

        return country.states;
      }

      return [];
    }
  }
};
</script>
