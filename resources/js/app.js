require('./bootstrap');

import Vue from 'vue'

import App from './App.vue';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from './routes';


Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

window.Vue = require('vue');
  
window.events = new Vue();
window.flash = function(message) {
    window.events.$emit('flash',message);
}

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
