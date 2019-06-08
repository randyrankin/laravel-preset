/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.directive('scroll', {
    inserted: function (el, binding) {
        let f = function (evt) {
            if (binding.value(evt, el)) {
                window.removeEventListener('scroll', f)
            }
        }
        window.addEventListener('scroll', f)
    }
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            open: false,
            ModalShowing: false
        }
    },
    methods: {
  		toggle() {
    		this.open = !this.open
    	},
        handleNavScroll: function (evt, el) {
            if (window.scrollY > 50) {
                el.setAttribute(
                    'class', 'z-50 sticky top-0 left-0 flex items-center justify-between flex-wrap py-4 px-6 bg-white shadow transition-slow'
                )             
            }
            else {
                el.setAttribute(
                    'class', 'z-50 sticky top-0 left-0 flex items-center justify-between flex-wrap py-4 px-6 bg-white transition-slow'
                )
            }
        }
  	}
});