require('./bootstrap');

require('alpinejs');

import Vue from 'vue'

//Main pages
import Flash from './components/Flash.vue'
import Comment from './components/Comment.vue'
import Likeable from './components/Likeable.vue'

const app = new Vue({
    el: '#app',
    components: { Flash, Comment, Likeable }
});
