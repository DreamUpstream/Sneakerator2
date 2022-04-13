<script setup>
import { reactive, onMounted, ref } from "vue";
import feather from "feather-icons";
import axios from "axios";
import SideMenu from "../components/SideMenu.vue";
import Manage from "./Manage";
import ManageModal from "../components/ManageModal";

window.addEventListener("load", () => {
    feather.replace();
});
onMounted(() => {
    feather.replace();

    getSneakers();
});
const state = reactive({ loading: true });
const showModal = ref(false);
function getMeta(metaName) {
    const metas = document.getElementsByTagName("meta");
    for (let i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute("name") === metaName) {
            return metas[i].getAttribute("content");
        }
    }

    return "";
}
function getSneakers() {
    axios
        .get(ROOT_URL + "/api/getsneakers?user_id=" + getMeta("user-id"))
        .then((response) => {
            console.log(response);
            state.searchSuccess = true;
            state.loading = false;
        });
}
</script>

<template>
    <div>
        <div class="row d-flex justify-content-center">
            <div class="d-grid col-4 mt-4">
                <button
                    @click="showModal = true"
                    class="btn btn-outline-success shadow"
                    type="button"
                >
                    Add new
                </button>
            </div>

            <div class="container d-flex justify-content-center text-center">
                <div class="table-responsive col-12 col-md-10">
                    <table class="table table-fit mt-4 align-middle">
                        <thead>
                            <tr>
                                <th width="10"></th>
                                <th scope="col">Item</th>
                                <th scope="col">Pricing</th>
                                <th scope="col">Platforms</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="ms-2">
                                    <img
                                        src="https://images.stockx.com/images/Air-Jordan-1-Mid-Light-Smoke-Grey-Anthracite-Product.jpg?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&trim=color&q=90&dpr=2&updated_at=1643276910"
                                        class="tableImage"
                                        alt="..."
                                    />
                                </th>
                                <td>
                                    <span>Nike air force blabla</span><br />

                                    Style: 1378671
                                    <br />
                                    EU: 40
                                </td>

                                <td>
                                    <span>Cost price: 130€</span><br />
                                    Recommended price: 170€
                                </td>
                                <td>
                                    <img
                                        src="https://restocks.net/favicon.ico"
                                        class="me-1"
                                        style="width: 2rem"
                                        alt="..."
                                    />
                                    <img
                                        src="https://web-assets.stockx.com/static/logo/favicon.ico"
                                        style="width: 2rem"
                                        alt="..."
                                    />
                                </td>
                                <td>
                                    <div
                                        class="d-flex flex-row mb-3 justify-content-center"
                                    >
                                        <div>
                                            <button
                                                @click="showModal = true"
                                                type="button"
                                                class="btn btn-sm mt-2"
                                            >
                                                <i
                                                    data-feather="edit"
                                                    class="text-warning"
                                                >
                                                </i>
                                            </button>
                                        </div>
                                        <div>
                                            <button
                                                type="button"
                                                class="btn btn-sm mt-2"
                                            >
                                                <i
                                                    data-feather="trash"
                                                    class="text-danger"
                                                >
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div
                v-if="state.loading"
                class="d-flex justify-content-center mt-3"
            >
                <div class="loader"></div>
            </div>
        </div>

        <ManageModal
            :showModal="showModal"
            @onBootstrapModalClose="showModal = false"
        >
        </ManageModal>
    </div>
</template>
