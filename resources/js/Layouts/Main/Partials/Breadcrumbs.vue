<template>
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Page Name</h2>

        <ol>
          <li><Link href="/">Home</Link></li>
        </ol>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped>

</style>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'Breadcrumbs',
  components: { Link },
  props: {
    pages: { type: Array }
  }
};
</script>
