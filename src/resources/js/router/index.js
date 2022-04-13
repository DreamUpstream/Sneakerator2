import { createRouter, createWebHistory } from "vue-router";

const Dashboard = () => import("../views/Dashboard.vue");
const Selling = () => import("../views/Selling.vue");

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
    ],
});

// router.afterEach((to, from) => {
//     feather.replace();
// });

export default router;
