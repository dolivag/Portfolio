require('./bootstrap');

import VueRouter from 'vue-router'
import { createApp } from 'vue';
import ShopComponent from './components/ShopComponent'
import PaintingsComponent from './components/PaintingsComponent'

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


createApp({
    components: {
        ShopComponent,
        PaintingsComponent,
    }
}).use(router).mount('#app')
