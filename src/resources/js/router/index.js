import { createRouter, createWebHistory } from "vue-router";

const Dashboard = () => import("../views/Dashboard.vue");
const Selling = () => import("../views/Selling.vue");
const Help = () => import("../views/Help.vue");

const router = createRouter({
    history: createWebHistory("/dashboard"),
    routes: [
        {
            path: "/",
            name: "home",
            component: Dashboard,
        },
        {
            path: "/selling",
            name: "selling",
            component: Selling,
        },
        {
            path: "/help",
            name: "help",
            component: Help,
        },
    ],
});

// router.afterEach((to, from) => {
//     feather.replace();
// });

export default router;
