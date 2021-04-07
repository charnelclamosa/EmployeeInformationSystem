require('./bootstrap');
import Vue from "vue";
import Vuetify from "vuetify";
import App from "./components/App.vue";
import Routes from "./router";
import VueRouter from "vue-router";
import store from "./store";
import "@mdi/font/css/materialdesignicons.css";
import 'vuetify/dist/vuetify.min.css';
import Vuelidate from 'vuelidate';
import Notifications from 'vue-notification';

window.Vue = require('vue').default;

Vue.use(Vuetify, {
    icons: {
        iconfont: "mdi"
    }
});
Vue.use(VueRouter);
Vue.use(Vuelidate);
Vue.use(Notifications);

Vue.component('primary-button', require('./components/base/PrimaryButton').default);

const app = new Vue({
    el: '#app',
    store,
    router: Routes,
    vuetify: new Vuetify(),
    render: h => h(App)
});

export default app;