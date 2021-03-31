import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from '../views/layouts/TheLogin';
import Home from '../views/layouts/TheHome';
import Navigation from './components/general/TheNavigation';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            redirect: '/login'
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/home',
            name: 'home',
            components: {
                default: Home,
                nav: Navigation
            }
        }
    ]
});
export default router;