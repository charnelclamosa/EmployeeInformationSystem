import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store'
import Login from '../views/layouts/TheLogin';
import Home from '../views/layouts/TheHome';
// import Footer from './components/general/TheFooter';
import Navigation from './components/general/TheNavigation';
import Users from '../views/layouts/master/Users';

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
                // footer: Footer,
                nav: Navigation
            },
            meta: {
                requiresAuth: true
            }
        },
        {
            path: '/users',
            name: 'users',
            components: {
                default: Users,
                // footer: Footer,
                nav: Navigation
            },
            meta: {
                requiresAuth: true
            }
        }
    ]
});
router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        const user = store.getters.getUserData;
        if (!user.hasOwnProperty('token')) {
            next('/login');
        } else {
            next();
        }
    } else {
        next();
    }
});
export default router;