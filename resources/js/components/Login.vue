<script>
import { RouterLink } from "vue-router";
import router from "../router";

export default {
    data() {
        return {
            user: {
                name: "",
                password: "",
            },
            error: "",
        };
    },
    name: "Login",
    methods: {
        validateForm() {
            this.error = "";
            setTimeout(() => {
                this.error = "";
            }, 5000);
            if (!this.user.name || !this.user.password) {
                this.error = "Nie wszystkie pola zostały uzupełnione.";
                return false;
            }

            return true;
        },
        async onSubmit() {
            if (this.validateForm()) {
                await axios
                    .post("/users/authenticate", this.user)
                    .then((res) => {
                        router.push("/");
                    })
                    .catch((err) => {
                        console.log(err.response.data.message);
                        this.error = "Niepoprawne dane logowania";
                    });
            }
        },
    },
};
</script>

<template>
    <div class="container">
        <h2>Panel logowania</h2>
        <form action="" method="POST" @submit.prevent="onSubmit()">
            <div class="elem">
                <label for="name">Nazwa użytkownika:</label>
                <input name="name" v-model="user.name" type="text" />
            </div>
            <div class="elem">
                <label for="password">Hasło:</label>
                <input
                    name="password"
                    v-model="user.password"
                    type="password"
                />
            </div>
            <div class="elem">
                <input type="submit" value="Zaloguj się" />
            </div>
            <p class="error">{{ error }}</p>
            <div class="elem">
                <p>
                    Nie masz jeszcze konta? <br />
                    <RouterLink class="link" to="/rejestracja"
                        >Zarejestruj się</RouterLink
                    >
                </p>
            </div>
        </form>
    </div>
</template>

<style lang="scss" scoped>
@import "../../css/app.scss";

@include form;
</style>
