import { createWebHistory, createRouter } from "vue-router";
import HomeView from "./views/Home.vue";
import TestView from "./views/Test.vue";

export const routes = [
    { path: "/", component: HomeView, name: "/" },
    { path: "/test", component: TestView, name: "/test" },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
