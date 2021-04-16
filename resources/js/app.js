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
Vue.prototype.$url = window.location.origin;
Vue.component('primary-button', require('./components/base/PrimaryButton').default);
Vue.component('outline-button', require('./components/base/OutlineButton').default);
Vue.component('block-button', require('./components/base/BlockButton').default);
Vue.component('base-header', require('./components/base/Header').default);
Vue.component('progress-bar', require('./components/base/ProgressBar').default);
Vue.component('dashboard-card', require('./components/base/DashboardCard').default);

const app = new Vue({
    el: '#app',
    store,
    router: Routes,
    vuetify: new Vuetify({ theme: { themes: { light: { primary: '#03588C', secondary: '#5095BF' } } } }),
    render: h => h(App)
});

export default app;