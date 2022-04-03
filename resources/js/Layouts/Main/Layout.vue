<template>
  <div>
    <Header></Header>
    <Breadcrumbs v-if="breadcrumbs && !canAlert"></Breadcrumbs>

    <main>
      <section v-if="canAlert" class="h-100" style="background-color: #eee; padding-top: 75px;">
        <div class="container py-5 h-100">
          <Alert></Alert>
          <slot />
        </div>
      </section>

      <div v-else>
        <slot />
      </div>
    </main>

    <Footer></Footer>
  </div>
</template>

<style lang="scss" scoped>

</style>

<script>
import Header from './Partials/Header';
import Footer from './Partials/Footer';
import Breadcrumbs from './Partials/Breadcrumbs';
import Alert from '../../Components/Alert';

export default {
  name: 'MainLayout',
  props: {
    breadcrumbs: { type: Boolean, default: false },
    canAlert: { type: Boolean, default: false }
  },
  components: { Alert, Breadcrumbs, Footer, Header }
};
</script>
