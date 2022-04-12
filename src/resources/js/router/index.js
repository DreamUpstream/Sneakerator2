import { createRouter, createWebHistory } from "vue-router";

const Dashboard = () => import("../views/Dashboard.vue");

const router = createRouter({
    history: createWebHistory("/dashboard"),
    routes: [
        {
            path: "/",
            name: "home",
            component: Dashboard,
        },
    ],
});

export default router;
