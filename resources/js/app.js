require('./bootstrap');

require('alpinejs');

import Vue from 'vue'

//Main pages
import Flash from './components/Flash.vue'
import Comment from './components/Comment.vue'


const app = new Vue({
    el: '#app',
    components: { Flash, Comment }
});

window.events = new Vue();

window.flash = function (message) {
    window.events.$emit('flash', message);
}; // flash('my message')
