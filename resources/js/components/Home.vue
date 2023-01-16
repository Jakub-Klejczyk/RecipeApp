<script>
import { RouterLink } from "vue-router";
import router from "../router";
import Navbar from "./Navbar.vue";

export default {
    components: { Navbar },
    data() {
        return {
            currentUser: {},
        };
    },
    name: "Home",
    methods: {},
};
</script>

<template>
    <div class="container">
        <Navbar />
        <div class="hero">
            <h1>PrzepisyNet</h1>
        </div>
        <div class="content">
            <div class="elem">
                <img src="../../css/img/no_img.webp" alt="" />
                <div class="text">
                    <h3>title</h3>
                    <p>autor</p>
                    <ul>
                        <li>przepis</li>
                        <li>przepis</li>
                        <li>przepis</li>
                        <li>przepis</li>
                        <li>przepis</li>
                    </ul>
                    <p>krótki opis</p>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "../../css/app.scss";

.container {
    .hero {
        width: 100vw;
        height: 240px;
        color: $tertiary-color;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
    }

    .content {
        display: flex;
        align-items: center;
        flex-direction: column;
        gap: 2rem;
        .elem {
            width: 90vw;
            height: 180px;
            background-color: $secondary-color;
            padding: 10px;
            display: flex;
            gap: 4rem;

            .text {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                ul {
                    display: flex;
                    gap: 1rem;
                    li {
                        list-style: none;
                    }
                }
            }

            img {
                width: 160px;
                height: 160px;
            }
        }
    }
}
</style>
