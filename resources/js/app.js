require('./bootstrap');
require('datatables.net-bs4');
require('chart.js');
require('chart');
require('jquery-ui');
require('adminlte');
require('vue-datepicker');
require('daterangepicker');

window.Vue = require('vue');

Vue.component('carrito', require('./components/CarritoCompra.vue').default);


const app = new Vue({
    el: '#app'
});
