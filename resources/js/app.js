require('./bootstrap');

require('alpinejs');

import Vue from 'vue'

//Main pages
import Flash from './components/Flash.vue'


const app = new Vue({
    el: '#app',
    components: { Flash }
});

window.events = new Vue();

window.flash = function (message) {
    window.events.$emit('flash', message);
}; // flash('my message')
