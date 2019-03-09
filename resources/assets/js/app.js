
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('topo', require('./components/Topo.vue'));
Vue.component('topoadmin', require('./components/Topoadmin.vue'));
Vue.component('painel', require('./components/Painel.vue'));
Vue.component('painel-cat', require('./components/PainelCat.vue'));
Vue.component('paineladmin', require('./components/Paineladmin.vue'));
Vue.component('footer', require('./components/Footer.vue'));
Vue.component('pagina', require('./components/Pagina.vue'));
Vue.component('tabela-lista', require('./components/TabelaLista.vue'));
Vue.component('tabela-lista2', require('./components/TabelaLista2.vue'));
Vue.component('modal', require('./components/modal/Modal.vue'));
Vue.component('modal-link', require('./components/modal/ModalLink.vue'));
Vue.component('input-categoria', require('./components/categoria.vue'));
Vue.component('input-caracteristica', require('./components/caracteristica.vue'));


const app = new Vue({
    el: '#app',
    mounted: function () {
        document.getElementById('app').style.display = "block";
    }
});
