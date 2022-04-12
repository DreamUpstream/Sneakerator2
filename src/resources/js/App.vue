<script setup>
import Header from "./components/Header.vue";
import SideMenu from "./components/SideMenu.vue";
require("bootstrap");
</script>

<template>
    <div>
        <Header />
        <div class="container-fluid">
            <div class="row">
                <SideMenu />
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <RouterView />
                </main>
            </div>
        </div>
    </div>
</template>
