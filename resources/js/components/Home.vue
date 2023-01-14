<script>
import { RouterLink } from "vue-router";
import router from "../router";

export default {
    data() {
        return {
            currentUser: {},
        };
    },
    name: "Home",
    methods: {
        logOut() {
            axios
                .post("/users/logout", this.user)
                .then((res) => {
                    router.push("/logowanie");
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },
    },
};
</script>

<template>
    <div class="container">
        <form action="" method="POST" @submit.prevent="logOut()">
            <input type="submit" value="Wyloguj się" />
        </form>
    </div>
</template>

<style lang="scss" scoped>
@import "../../css/app.scss";
</style>
