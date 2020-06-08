/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');
import store from './store/clientStore';
import {mapGetters} from "vuex";

//
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { BProgress } from 'bootstrap-vue'
import { BModal } from 'bootstrap-vue'

Vue.component('soldecomponent', require('./components/SoldeComponent').default);
Vue.component('transactiontablecomponent', require('./components/TransactiontableComponent').default);
Vue.component('systemeinformationcomponent', require('./components/SystemeinformationComponent').default);
Vue.component('investissementlistecomponent', require('./components/InvestissementListeComponent').default);
Vue.component('btnaddcomponent', require('./components/BtnaddComponent').default);
Vue.component('b-progress', BProgress);
Vue.component('b-modal', BModal);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 Vue.component('ventetable', require('./components/vente/venteTable.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#clientApp',

    store ,

});
