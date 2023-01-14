import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import LoginView from "../views/LoginView.vue";
import RegistrationView from "../views/RegistrationView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "Home",
            component: HomeView,
        },
        {
            path: "/logowanie",
            name: "Login",
            component: LoginView,
        },
        {
            path: "/rejestracja",
            name: "registration",
            component: RegistrationView,
        },
    ],
});

export default router;
