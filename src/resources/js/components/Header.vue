<script setup>
import axios from "axios";

import { useTokensStore } from "../stores/tokens";
let logoutUrl = ROOT_URL;
function logout() {
    axios.post(logoutUrl + "/logout").then((response) => {
        window.location.replace(ROOT_URL);
    });
}

const tokensStore = useTokensStore();

tokensStore.get(getMeta("user-id"));

function getMeta(metaName) {
    const metas = document.getElementsByTagName("meta");

    for (let i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute("name") === metaName) {
            return metas[i].getAttribute("content");
        }
    }

    return "";
}
</script>

<template>
    <div>
        <header
            class="navbar navbar-dark sticky-top sneakerator-darker flex-md-nowrap p-0 shadow"
        >
            <div
                class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-success bg-gradient shadow text-center"
            >
                {{ getMeta("user-name") }}
                <span data-feather="database" style="margin-bottom: 2px"></span
                >{{ tokensStore.tokens }}
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
                    <a class="nav-link px-3" @click="logout()" href="#"
                        >Sign out</a
                    >
                </div>
            </div>
        </header>
    </div>
</template>
