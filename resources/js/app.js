require('./bootstrap');

import { createApp } from 'vue';
import MainComponent from './components/MainComponent.vue';
import router from './components/router.js';

createApp({
    components: {
        MainComponent
    }
}).use(router).mount('#app')