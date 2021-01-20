require('./bootstrap');

require('alpinejs');

// window.Vue = require('vue');
// Vue.component('flash', require('./components/Flash.vue').default);
// const app = new Vue({
//     el: '#app',
// });

import  Vue from  'vue'
Vue.component('flash', require('./components/Flash.vue').default);
const app = new Vue({
    el: '#app'
});
