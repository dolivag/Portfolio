import { createRouter, createWebHistory } from "vue-router";
import PlayerComponent from './PlayerComponent';
import LoginComponent from './LoginComponent';
import RegisterComponent from './RegisterComponent';
import MainComponent from './MainComponent';


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
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routeInfos
});

export default router;