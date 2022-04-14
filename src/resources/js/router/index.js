import { createRouter, createWebHistory } from "vue-router";

const Dashboard = () => import("../views/Dashboard.vue");
const Selling = () => import("../views/Selling.vue");
const Help = () => import("../views/Help.vue");

const router = createRouter({
    history: createWebHistory("/dashboard"),
    routes: [
        {
            path: "/",
            name: "selling",
            component: Selling,
        },
        {
            path: "/analyse",
            name: "analyse",
            component: Dashboard,
        },
        {
            path: "/help",
            name: "help",
            component: Help,
        },
    ],
});

export default router;
