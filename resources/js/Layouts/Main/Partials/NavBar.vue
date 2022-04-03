<template>
  <nav id="navbar" class="navbar">
    <ul>
      <li>
        <Link :class="{ 'active': $page.url === '/', 'nav-link': true }" href="/">Home</Link>
      </li>
      <li class="dropdown">
        <a :class="{ 'active': $page.url.startsWith('/shop') }" href="#">
          <span>Shop</span>
          <i class="bi bi-chevron-down"></i>
        </a>
        <ul>
          <li v-for="group in groups" :key="group.id">
            <Link :href="`/shop/${group.handle}`">{{ group.name }}</Link>
          </li>
        </ul>
      </li>
      <li>
        <Link :class="{ 'active': $page.url === '/portfolio', 'nav-link': true }" href="/portfolio">Portfolio</Link>
      </li>
      <li>
        <Link :class="{ 'active': $page.url === '/contact', 'nav-link': true }" href="/contact">Contact</Link>
      </li>
      <li>
        <Link :class="{ 'active': $page.url === '/cart', 'nav-link cart': true }" href="/cart"><i
            class="ri-shopping-cart-line"></i> Cart
          <span v-if="cart_count" class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger">
            {{ cart_count }}
            <span class="visually-hidden">unread messages</span>
          </span>
        </Link>
      </li>
      <li v-if="!user">
        <Link :class="{ 'active': $page.url === '/login', 'nav-link login': true }" href="/login"><i
            class="ri-login-box-line me-2"></i> Login
        </Link>
      </li>
      <li v-else class="dropdown">
        <a href="#">
          <span><i class="ri-user-3-fill me-2"></i> {{ user.customers[0].first_name }}</span>
          <i class="bi bi-chevron-down"></i>
        </a>
        <ul>
          <li>
            <Link href="/my-account">Account</Link>
          </li>
          <li>
            <Link as="button"
                  href="/logout"
                  method="post"
                  class="btn btn-link text-dark nav-link border-0"
            >
              Logout
            </Link>
          </li>
        </ul>
      </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>
</template>

<style lang="scss" scoped>

</style>

<script>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import helper from '@/helpers';

export default {
  name: 'NavBar',
  components: { Link },
  data () {
    return {};
  },
  mounted () {
    /**
     * Mobile nav toggle
     * todo: convert this logic to vue
     */
    helper.on('click', '.mobile-nav-toggle', function (e) {
      helper.select('#navbar').classList.toggle('navbar-mobile');
      this.classList.toggle('bi-list');
      this.classList.toggle('bi-x');
    });

    /**
     * Mobile nav dropdowns activate
     * todo: convert this logic to vue
     */
    helper.on('click', '.navbar .dropdown > a', function (e) {
      if (helper.select('#navbar').classList.contains('navbar-mobile')) {
        e.preventDefault();
        this.nextElementSibling.classList.toggle('dropdown-active');
      }
    }, true);
  },
  computed: {
    groups () {
      return usePage().props.value.nav.groups;
    },
    user () {
      return usePage().props.value.auth.user;
    },
    cart_count () {
      return usePage().props.value.cart.count;
    }
  }
};
</script>
