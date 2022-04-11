import { createRouter, createWebHistory } from "vue-router";

const HomeView = () => import("../views/HomeView.vue");

const router = createRouter({
    history: createWebHistory("/shop"),
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeView,
        },
    ],
});

export default router;
