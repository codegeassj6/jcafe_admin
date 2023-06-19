// import { createRouter, createWebHistory } from 'vue-router';
import * as VueRouter from 'vue-router'

const routes = [
    {
        path: '/',
        name: "Home",
        component: () => import(/* webpackChunkName: "Intro" */ "./views/Home.vue"),
    },

]

const router = VueRouter.createRouter({
    routes,
    history: VueRouter.createWebHistory(),
})

export default router;
