<template>
  <Layout>
    <Hero></Hero>

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-end">
          <div class="col-lg-11">
            <div class="row justify-content-end">

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-bar-chart"></i>
                  <span data-purecounter-start="0" data-purecounter-end="58"
                        data-purecounter-duration="2" class="purecounter"></span>
                  <p>Sales This Month</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-journal-richtext"></i>
                  <span data-purecounter-start="0" data-purecounter-end="22" data-purecounter-duration="2"
                        class="purecounter"></span>
                  <p>Available Products</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-card-text"></i>
                  <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="2"
                        class="purecounter"></span>
                  <p>Completed Requests</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="bi bi-stack"></i>
                  <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="2"
                        class="purecounter"></span>
                  <p>Orders In-Progress</p>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-lg-6 video-box align-self-baseline" data-aos="zoom-in" data-aos-delay="100">
            <!--                    <img src="/images/about.jpg" class="img-fluid" alt="">
                                <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
            -->
            <div class="ratio ratio-16x9">
              <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source :src="`${asset_url}/videos/vid1.mp4`" type="video/mp4">
                Your browser does not support the video tag.
              </video>
            </div>
          </div>

          <div class="col-lg-6 pt-3 pt-lg-0 content">
            <h3>
              Karvec, An independently owned company that creates quality american made products of all kinds.
            </h3>
            <p class="fst-italic">
              Most of our products are made from premium woods, acrylics and sometimes PVC or aluminium.
            </p>
            <ul>
              <li>
                <i class="bx bx-check-double"></i>
                Quality products are always our main objective.
              </li>
              <li>
                <i class="bx bx-check-double"></i>
                We take pride in our customer service. We got you!
              </li>
              <li>
                <i class="bx bx-check-double"></i>
                Affordable pricing and FREE Shipping on most products.
              </li>
              <li>
                <i class="bx bx-check-double"></i>
                Don't have what you want, send in a custom request and we will get back with you with-in
                24hrs to let you know what we can do for you.
              </li>
            </ul>
            <p>
              Our mission is to offer a wide variety of products and services!
              We will mostly have Home Decor. We are currently prototyping other product categories like
              Commercial Signage & Electronic Enclosures.
            </p>
          </div>

        </div>

      </div>
    </section>

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/images/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Alisha Sheely</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Loved the quality and detail in our Cleveland coasters! Would buy again!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/images/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Ashley Roark</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  beautiful coasters and came across as an absolute hit with friends
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/images/testimonials/default_75x75.png" class="testimonial-img" alt="">
                <h3>Maribel Ortiz</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I recently purchased these coasters as a “cheeky” house warming gift for a friend. I
                  purchased a formal monogrammed set as well as this more casual cheeky set. I was very
                  pleased with the quality and my friend to whom they were gifted got a big kick out of
                  them!! They were a perfect match for his personality.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/images/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Bri Neitzel</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Bought these for my Uncle who loves the Cleveland Browns! They turned out amazing! Love
                  supporting small business, definitely worth the money!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/images/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>alexvegan</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I didn’t know what to buy a Brown fan for Christmas... until I saw these online. The
                  designs are clean and simple, and the wood coasters look great, not too kitschy. I was
                  pleasantly surprised by the thickness of each coaster and how they look in person. Would
                  recommend for any Browns fan!
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="/images/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>Taylor Whaley</h3>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  The quality of these coasters are phenomenal!! I am so impressed with the intricate
                  details, truly a one of a kind piece. Can’t wait to gift these to my fiancé who is a
                  hard core Browns fan! It was also packaged with care and the owner reached out to me
                  when my order shipped and when it was delivered.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/images/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/images/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/images/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/images/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/images/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/images/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Boxes Section ======= -->
    <section id="about-boxes" class="about-boxes">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="/images/home-decor.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-brush-4-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Home Decor</a></h5>
                <p class="card-text">
                  Majority of the products we make fall under the category of Home Decor. Sports themed
                  decor being our most popular amongst our customers. Signage and drink coasters are our
                  top sellers!
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <img src="/images/about-boxes-2.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-calendar-check-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Custom Requests</a></h5>
                <p class="card-text">
                  Already have an idea of what you want ? Maybe you want to
                  customize or personalize a product that we currently sell ? No problem, we can
                  collaborate
                  with you and mock up a design. Just submit the custom request form to get started!
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="/images/about-boxes-3.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-movie-2-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Personalized Products</a></h5>
                <p class="card-text">
                  We have a variety of personalizable products. Our clients love our Acrylic LED Signs for
                  kids bedrooms. Commonly used as night lights for younger ages. We also have cool signs
                  for teens, mostly focused around gaming setups.
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
              <i class="ri-gps-line"></i>
              <h4 class="d-none d-lg-block">Whats new in 2022 ?</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
              <i class="ri-body-scan-line"></i>
              <h4 class="d-none d-lg-block">Gifting</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
              <i class="ri-sun-line"></i>
              <h4 class="d-none d-lg-block">Promotional Giveaways</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
              <i class="ri-store-line"></i>
              <h4 class="d-none d-lg-block">Affiliate Program</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Karvec has made some major upgrades for the year 2022!</h3>
                <p class="fst-italic">
                  Karvec has recently maintenance all machinery and applied upgrades that will assure
                  consistent quality in our products! In addition we have added new machinery which
                  allows us to make larger products & decrease production times on mass orders to
                  retailers.
                </p>
                <p class="fst-italic">
                  We are working overtime prototyping a handful of new products. Some of these products
                  include Commercial Signage, LED Acrylic Signage and Electronic Enclosures! One of the
                  enclosures we are working on currently is for the Gecko G540 CNC motion controller.
                </p>
                <p class="fst-italic">
                  So to recap:
                </p>
                <ul>
                  <li>
                    <i class="ri-check-double-line"></i>
                    Maintenance & Upgrades to all original machinery!
                  </li>
                  <li>
                    <i class="ri-check-double-line"></i>
                    Added new larger machinery to aid in production time and new upcoming products.
                  </li>
                  <li>
                    <i class="ri-check-double-line"></i>
                    Working overtime preparing new product lines including an enclosure for the
                    Gecko G540 CNC motion controller.
                  </li>
                </ul>
                <p>
                  Its always been a priority to keep our machinery in a good reliable state. In addition
                  we have made it a priority to regularly improve our workflows and become more efficient.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/images/20220123_133226.jpg" alt="" class="img-fluid">
                <!--                            <div class="ratio ratio-1x1">
                                                <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                                                    <source src="/videos/vid2.mp4" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>-->
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Neque exercitationem debitis soluta quos debitis quo mollitia officia est</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                  reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                  </li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in
                    voluptate velit.
                  </li>
                  <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum asperiores
                    dolores quos qui a. Ipsum neque dolor voluptate nisi sed.
                  </li>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                    storacalaperda mastiro dolore eu fugiat nulla pariatur.
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/images/features-2.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Voluptatibus commodi ut accusamus ea repudiandae ut autem dolor ut assumenda</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                  reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                  </li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in
                    voluptate velit.
                  </li>
                  <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum asperiores
                    dolores quos qui a. Ipsum neque dolor voluptate nisi sed.
                  </li>
                </ul>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore
                  magna aliqua.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/images/features-3.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Omnis fugiat ea explicabo sunt dolorum asperiores sequi inventore rerum</h3>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                  reprehenderit in voluptate
                  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in
                  culpa qui officia deserunt mollit anim id est laborum
                </p>
                <p class="fst-italic">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore
                  magna aliqua.
                </p>
                <ul>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                  </li>
                  <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in
                    voluptate velit.
                  </li>
                  <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                    storacalaperda mastiro dolore eu fugiat nulla pariatur.
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="/images/features-4.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Materials</h2>
          <p>Materials We Use</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-stack"></i>
              <h4>PureBond Plywoods</h4>
              <p>
                A decorative veneer graces the face of these 7-ply plywood sheets, assembled on top of 2
                other veneers with a soy-based PureBond technology that is environmentally friendly and wont
                off-gas toxic fumes like UF plywood. It's an alternative to products that may degrade indoor
                air
                quality over time and its water resistance further strengthens its endurance for lasting
                performance.
              </p>
              <p>
                The decorative face veneer is a splendid appearance that forms the foundation for impressive
                DIY creations, such as Coasters, Catch-all Trays, Serving Trays, End Tables, Pet Food
                Centers, Footstools, Shelves and more.
              </p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-layout-three-columns"></i>
              <h4>Swaner Hardwoods</h4>
              <p>
                Every piece meets the highest grading standards for strength and appearance. Solid hardwoods
                can be used for small to large hobby projects or sign making. Classic American hardwoods
                that can add beauty and character to any home or business.
              </p>
              <p>
                Common species we use are Walnut, Red Oak, Hard Maple, Birch & African Mahogany.
              </p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4>Tuffak Polycarbonate</h4>
              <p>
                High performance polycarbonate. Ideal for architectural, lighting, security, signage,
                or transportation applications. Combining clarity with durability, TUFFAK provides
                clear, unobstructed views. A virtually unbreakable sheet that is ideal in diverse and
                innovative applications. The products withstand harsh environments, providing unparalleled
                quality and a stunning look for years.
              </p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="bi bi-file"></i>
              <h4><a href="#">Veranda Cellular PVC</a></h4>
              <p>
                Veranda Cellular PVC is perfect for exterior use. Panels can be used in many different
                applications.Veranda Cellular PVC won't split, cup, rot or decay. Is moisture and insect
                resistant, reversible & lightweight.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->
  </Layout>
</template>

<style lang="scss" scoped>

</style>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import Hero from '../Components/Hero';
import Layout from '../Layouts/Main/Layout';
import PureCounter from '@srexi/purecounterjs/js/purecounter';
import Swiper from 'swiper/bundle';

export default {
  name: 'HomePage',
  components: {
    Layout,
    Hero,
    Head
  },
  data () {
    return {
      asset_url: process.env.MIX_AWS_ASSET_URL
    };
  },
  mounted () {
    new PureCounter;

    new Swiper('.testimonials-slider', {
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      }
    });
  }
};
</script>
