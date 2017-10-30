import Vue from 'vue'
import VueRouter from 'vue-router'
import Example from '../components/Example.vue';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            name: "Example",
            path: '/',
            component: Example
        }
    ]
})