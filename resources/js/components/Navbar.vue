<script>
export default {
    data() {
        return {};
    },
    name: "Navbar",
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
    <nav>
        <li><RouterLink class="link" to="/">Strona główna</RouterLink></li>
        <div>
            <li>
                <RouterLink class="link" to="/przepisy"
                    >Zarządzaj przepisami</RouterLink
                >
            </li>
            <li><input type="submit" value="Wyloguj się" /></li>
        </div>
    </nav>
</template>

<style lang="scss" scoped>
@import "../../css/app.scss";

nav {
    position: relative;
    top: 0;
    width: 100vw;
    background-color: $primary-color;
    height: 64px;
    display: flex;
    justify-content: space-between;
    align-items: center;

    li {
        list-style: none;
        padding-right: 2rem;
        color: $light-color;
        &:first-child {
            padding-left: 2rem;
        }
    }

    .link {
        color: $light-color;
        text-decoration: none;
    }

    div {
        display: flex;
        justify-content: flex-end;

        input {
            border: none;
            color: $light-color;
            background-color: $primary-color;
            font-size: 1rem;
            font-family: "Roboto", sans-serif;
            font-weight: 500;
        }
    }
}
</style>
