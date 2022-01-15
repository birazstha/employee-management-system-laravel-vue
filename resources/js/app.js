/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';

import  {routes} from "./route";

Vue.use(VueRouter);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('employee-index', require('./components/employee/index.vue').default);

const router = new VueRouter({
    mode:'history',
    routes:routes
});
const app = new Vue({
    el: '#app',
    router:router
});
