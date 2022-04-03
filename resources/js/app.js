require('./bootstrap');
require('@popperjs/core');
const bootstrap = require('bootstrap');

/**
 * Helper Functions
 */
import helper from './helpers';

/**
 * VueJS
 */
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import store from './vuex';
import { InertiaProgress } from '@inertiajs/progress';

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup ({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(store)
            .component('editor', require('@tinymce/tinymce-vue').default)
            .mount(el);
    }
});

InertiaProgress.init();

/* UI Stuff */
import AOS from 'aos';
import GLightbox from 'glightbox';
import Isotope from 'isotope-layout';
import Swiper from 'swiper/bundle';

/**
 * Animation on scroll
 */
window.addEventListener('load', () => {
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });
});

/**
 * Preloader
 */
let preloader = helper.select('#preloader');
if (preloader) {
    window.addEventListener('load', () => {
        preloader.remove();
    });
}

/**
 * Global Tooltips
 */
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

/**
 * Back to top button
 */
let backtotop = helper.select('.back-to-top');
if (backtotop) {
    const toggleBacktotop = () => {
        if (window.scrollY > 100) {
            backtotop.classList.add('active');
        } else {
            backtotop.classList.remove('active');
        }
    };
    window.addEventListener('load', toggleBacktotop);
    helper.onscroll(document, toggleBacktotop);
}

/********************/

/**
 * Initiate glightbox
 */
GLightbox({
    selector: '.glightbox'
});

/**
 * Porfolio isotope and filter
 */
window.addEventListener('load', () => {

    let portfolioContainer = helper.select('.portfolio-container');

    if (portfolioContainer) {
        let portfolioIsotope = new Isotope(portfolioContainer, {
            itemSelector: '.portfolio-item'
        });

        let portfolioFilters = helper.select('#portfolio-flters li', true);

        helper.on('click', '#portfolio-flters li', function (e) {
            e.preventDefault();
            portfolioFilters.forEach(function (el) {
                el.classList.remove('filter-active');
            });
            this.classList.add('filter-active');

            portfolioIsotope.arrange({
                filter: this.getAttribute('data-filter')
            });
            portfolioIsotope.on('arrangeComplete', function () {
                AOS.refresh();
            });

        }, true);
    }

});

/**
 * Initiate portfolio lightbox
 */
GLightbox({
    selector: '.portfolio-lightbox'
});

/**
 * Portfolio details slider
 */
new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
    }
});
