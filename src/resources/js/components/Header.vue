<script setup>
import axios from "axios";
let logoutUrl = ROOT_URL;
function logout() {}
</script>

<template>
    <div>
        <header
            class="navbar navbar-dark sticky-top sneakerator-darker flex-md-nowrap p-0 shadow"
        >
            <div
                class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-success bg-gradient shadow"
            >
                Gabrielius
            </div>
            <button
                class="navbar-toggler position-absolute d-md-none collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="w-100" />
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" @click="logout()">Sign out</a>
                </div>
            </div>
        </header>
    </div>
</template>
