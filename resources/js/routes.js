import * as VueRouter from "vue-router";
import { userStore } from "./stores/userStore";

// const user_store = userStore();

const routes = [
    {
        path: "/",
        name: "Home",
        component: () =>
            import(/* webpackChunkName: "Intro" */ "./views/Home.vue"),
        meta: { disableIfLoggedIn: true },
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        meta: { requiresAuth: true },
        component: () =>
            import(/* webpackChunkName: "Dashboard" */ "./views/Dashboard.vue"),
    },
    {
        path: "/messages",
        name: "Message",
        meta: { requiresAuth: true },
        component: () =>
            import(/* webpackChunkName: "Message" */ "./views/Message.vue"),
    },
    {
        path: "/users",
        name: "User",
        component: () =>
            import(/* webpackChunkName: "User" */ "./views/User.vue"),
        meta: { requiresAuth: true },
    },
    {
        path: "/posts",
        name: "Post",
        component: () =>
            import(/* webpackChunkName: "Post" */ "./views/Post.vue"),
        meta: { requiresAuth: true },
    },
    {
        path: "/games",
        name: "Games",
        component: () =>
            import(/* webpackChunkName: "Post" */ "./views/Games.vue"),
        meta: { requiresAuth: true },
    },
    {
        path: "/orders",
        name: "Orders",
        component: () =>
            import(/* webpackChunkName: "Post" */ "./views/Orders.vue"),
        meta: { requiresAuth: true },
    },
];

const router = VueRouter.createRouter({
    routes,
    history: VueRouter.createWebHashHistory(),
    // history: true,

});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!userStore().user) {
            console.log("not login");
            // next({
            //   name: "Home",
            //   query: { redirect: to.fullPath },
            // });
            next({ path: "/", query: { redirect: to.fullPath } });
            return false;
        }
    }

    if (to.matched.some((record) => record.meta.disableIfLoggedIn)) {
        if (userStore().user) {
            next({ path: "/dashboard", query: { redirect: to.fullPath } });
            return false;
        }
    }

    next();
});

export default router;
