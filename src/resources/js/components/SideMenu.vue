<script setup>
import { useRoute } from "vue-router";
</script>

<template>
    <nav
        id="sidebarMenu"
        class="col-md-3 col-lg-2 d-md-block bg-light bg-gradient sidebar collapse"
    >
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item mt-2">
                    <router-link
                        class="nav-link"
                        :to="{
                            name: 'home',
                        }"
                        ><span data-feather="search"> </span>
                        Analyse</router-link
                    >
                </li>
                <li class="nav-item mt-2">
                    <!-- <a class="nav-link" href="#">
                        <span data-feather="dollar-sign"></span>
                        Selling
                    </a> -->
                    <router-link
                        class="nav-link"
                        :to="{
                            name: 'selling',
                        }"
                        ><span data-feather="dollar-sign"> </span>
                        Selling</router-link
                    >
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link" href="#">
                        <span data-feather="user"></span>
                        Profile
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link" href="#">
                        <span data-feather="help-circle"></span>
                        Help
                    </a>
                </li>
                <li class="nav-item mt-2">
                    <a class="nav-link" href="#">
                        <span data-feather="database"></span>
                        Buy Tokens
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>
