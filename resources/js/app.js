require('./bootstrap');

import VueRouter from 'vue-router'
import { createApp } from 'vue';
import ShopComponent from './components/ShopComponent';
import PaintingsComponent from './components/PaintingsComponent';
import MainComponent from './components/MainComponent.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: ShopComponent,
            name: 'shops',
        },
        {
            path: '/shop/:id/paintings',
            component: PaintingsComponent,
            name: 'paintings',
        }
    ]
})

export default router;


createApp({
    components: {
        MainComponent,
    }
}).use(router).mount('#app')