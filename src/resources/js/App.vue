<script setup>
import Header from "./components/Header.vue";
</script>

<template>
    <div>
        <Header />
        <div class="container py-3">
            <main class="py-3">
                <RouterView />
            </main>
        </div>
    </div>
</template>
