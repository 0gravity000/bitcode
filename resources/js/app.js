/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-navi', require('./components/AdminNavi.vue').default);
Vue.component('admin-tag-navi', require('./components/AdminTagNavi.vue').default);
Vue.component('post', require('./components/Post.vue').default);
Vue.component('post-show', require('./components/PostShow.vue').default);

//highlight-vue.js
Vue.use(hljsVuePlugin);

//import VueHighlightJS from 'vue-highlight.js';
// Highlight.js languages (All languages)
//import 'vue-highlight.js/lib/allLanguages'
// Import Highlight.js theme    https://highlightjs.org/static/demo/
//import 'highlight.js/styles/default.css';
//Vue.use(VueHighlightJS);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
