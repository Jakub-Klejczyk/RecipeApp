<script>
import { RouterLink } from "vue-router";
import axios from "axios";
import router from "../router";

export default {
    data() {
        return {
            user: {
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
            },
            error: "",
        };
    },
    name: "Registration",
    methods: {
        validateForm() {
            this.error = "";
            setTimeout(() => {
                this.error = "";
            }, 5000);
            if (
                !this.user.name ||
                !this.user.email ||
                !this.user.password ||
                !this.user.password_confirmation
            ) {
                this.error = "Nie wszystkie pola zostały uzupełnione.";
                return false;
            }

            if (
                !this.user.email.match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                )
            ) {
                this.error = "Niepoprawna adres email.";
                return false;
            }

            if (this.user.password !== this.user.password_confirmation) {
                this.error = "Hasła muszą być takie same.";
                return false;
            }

            if (
                !this.user.password.match(
                    /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/
                )
            ) {
                this.error =
                    "Hasło musi się składać z co najmniej 8 znaków, w tym jednej litery oraz cyfry.";
                return false;
            }

            return true;
        },
        async onSubmit() {
            if (this.validateForm()) {
                await axios
                    .post("/users", this.user)
                    .then((res) => {
                        router.push("/");
                    })
                    .catch((err) => {
                        this.error = err.response.data.message;
                    });
            }
        },
    },
};
</script>

<template>
    <div class="container">
        <h2>Panel rejestracji</h2>
        <form action="" method="POST" @submit.prevent="onSubmit()">
            <div class="elem">
                <label for="name">Nazwa użytkownika:</label>
                <input name="name" v-model="user.name" type="text" />
            </div>
            <div class="elem">
                <label for="email">Email:</label>
                <input name="email" v-model="user.email" type="text" />
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
                <label for="password_confirmation">Powtórz hasło:</label>
                <input
                    name="password_confirmation"
                    v-model="user.password_confirmation"
                    type="password"
                />
            </div>
            <div class="elem">
                <input type="submit" value="Zarejestruj się" />
            </div>
            <p class="error">{{ error }}</p>
            <div class="elem">
                <p>
                    Masz już konto?
                    <RouterLink class="link" to="/logowanie"
                        >Zaloguj się</RouterLink
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
