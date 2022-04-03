<template>
  <header id="header" :class="['fixed-top', home ? null : 'header-inner-pages']">
    <div class="container d-flex align-items-center justify-content-between">
      <Link href="/" class="logo"><img src="/images/logo.png" alt="" class="img-fluid"></Link>

      <nav-bar></nav-bar>
    </div>
  </header>
</template>

<style lang="scss" scoped>

</style>

<script>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import NavBar from './NavBar';
import helper from '@/helpers';

export default {
  name: 'Header',
  components: { Link, NavBar },
  computed: {
    home () {
      return usePage().props.value.home;
    }
  },
  mounted () {
    let header = helper.select('#header');

    const headerScrolled = () => {
      if (window.scrollY > 100) {
        header.classList.add('header-scrolled');
      } else {
        header.classList.remove('header-scrolled');
      }
    };
    window.addEventListener('load', headerScrolled);
    helper.onscroll(document, headerScrolled);
  }

};
</script>
