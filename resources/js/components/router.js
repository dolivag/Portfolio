import { createRouter, createWebHistory } from "vue-router";
import PlayerComponent from './PlayerComponent.vue';
import LoginComponent from './LoginComponent.vue';
import RegisterComponent from './RegisterComponent.vue';
import MainComponent from './MainComponent.vue';
import RankingComponent from './RankingComponent.vue';
import WinnerComponent from './WinnerComponent.vue';
import LooserComponent from './LooserComponent.vue';


const routeInfos = [


    {
        path: '/player',
        name: 'player',
        component: PlayerComponent,
    },
    {
        path: '/login',
        name: 'login',
        component: LoginComponent,
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterComponent,
    },
    {
        path: '/ranking',
        name: 'ranking',
        component: RankingComponent,
    },
    {
        path: '/winner',
        name: 'winner',
        component: WinnerComponent,
    },
    {
        path: '/looser',
        name: 'looser',
        component: LooserComponent,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routeInfos
});

export default router;