import Vue from 'vue'
import VueRouter from 'vue-router'
// import Example from '../components/Example.vue';
import Index from '../pages/index';
import ClockPage from '../pages/clockPage'
import TimePage from '../pages/timePage'
import SharingPage from '../pages/sharingPage'
import AddClock from '../pages/addClock'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            name: "index",
            path: '/',
            component: Index
        },
        {
            name: "ClockPage",
            path: '/clockPage',
            component: ClockPage
        },
        {
            name: "TimePage",
            path: '/timePage',
            component: TimePage
        },
        {
            name: "SharingPage",
            path: '/sharingPage',
            component: SharingPage
        },
        {
            name: "AddClock",
            path: '/addClock',
            component: AddClock
        }
    ]
})