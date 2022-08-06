import { createWebHistory, createRouter } from "vue-router";
import HomeView from "./views/Home.vue";

export const routes = [{ path: "/", component: HomeView, name: "/" }];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
