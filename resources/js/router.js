import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';

// Vue.use(VueRouter);
Vue.use(VueRouter, VueAxios, axios);


export default new VueRouter({
    routes: [
        {
            path: '/',
        },
    ],
    mode: 'history'
})