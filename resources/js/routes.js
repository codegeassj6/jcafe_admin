// import { createRouter, createWebHistory } from 'vue-router';
import * as VueRouter from 'vue-router'

const routes = [
    {
        path: '/',
        name: "Home",
        component: () => import(/* webpackChunkName: "Intro" */ "./views/Home.vue"),
        children: [
          {
            path: '/dashboard',
            name: "Dashboard",
            component: () => import(/* webpackChunkName: "Dashboard" */ "./views/Dashboard.vue"),
          },
          {
            path: '/messages',
            name: "Message",
            component: () => import(/* webpackChunkName: "Message" */ "./views/Message.vue"),
          },
          {
            path: '/users',
            name: "User",
            component: () => import(/* webpackChunkName: "User" */ "./views/User.vue"),
          },
          {
            path: '/posts',
            name: "Post",
            component: () => import(/* webpackChunkName: "Post" */ "./views/Post.vue"),
          },
          {
            path: '/games',
            name: "Games",
            component: () => import(/* webpackChunkName: "Post" */ "./views/Games.vue"),
          },
          {
            path: '/orders',
            name: "Orders",
            component: () => import(/* webpackChunkName: "Post" */ "./views/Orders.vue"),
          }
        ]
    },
]

const router = VueRouter.createRouter({
    routes,
    history: VueRouter.createWebHashHistory(),
})

export default router;
