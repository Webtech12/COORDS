import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';

import ExampleComponent from './components/ExampleComponent';
import Cods from './components/Cods';

// Vue.use(VueRouter);
Vue.use(VueRouter, VueAxios, axios);


export default new VueRouter({
    routes: [
        {
            path: '/',
            component: Cods
        },
    ],
    mode: 'history'
})