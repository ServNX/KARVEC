<template>
  <Layout>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your login and password!</p>

                  <div class="form-floating mb-4 text-dark">
                    <input v-model="form.email"
                           type="email"
                           id="email"
                           class="form-control"
                           placeholder="Email" />
                    <label for="email">Email</label>
                  </div>

                  <div class="form-floating mb-4 text-dark">
                    <input v-model="form.password"
                           type="password"
                           id="password"
                           class="form-control"
                           placeholder="Password" />
                    <label for="password">Password</label>
                  </div>

                  <p class="small mb-5 pb-lg-2">
                    <Link class="text-white-50" href="#">Forgot password?</Link>
                  </p>

                  <button @click="form.post('/login')"
                          class="btn btn-outline-primary btn-lg px-5">
                    Login
                  </button>
                </div>

                <div>
                  <p class="mb-0">
                    Don't have an account?
                    <Link href="/register" class="text-white-50 fw-bold">Sign Up</Link>
                  </p>
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

export default {
  name: 'LoginPage',
  components: { Layout, Link },
  data () {
    return {
      form: useForm({
        email: null,
        password: null
      })
    };
  }
};
</script>
