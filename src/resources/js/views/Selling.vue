<script setup>
import { reactive, onUpdated, ref } from "vue";
import feather from "feather-icons";
import axios from "axios";
import Manage from "./Manage";
import ManageModal from "../components/ManageModal";

let invoiceStorage = ROOT_URL + "/storage/img/invoices/";

const state = reactive({
    loading: true,
    sneakers: undefined,
    secretCode: undefined,
    nothingFound: false,
});

onUpdated(() => {
    feather.replace();
});

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
axios
    .get(
        ROOT_URL +
            "/api/sneakers/login?email=" +
            getMeta("user-email") +
            "&password=" +
            getMeta("user-password")
    )
    .then((response) => {
        state.secretCode = response.data.token;
        axios
            .get(ROOT_URL + "/api/sneakers?user_id=" + getMeta("user-id"), {
                headers: {
                    "Content-type": "application/json; charset=UTF-8",
                    Authorization: "Bearer " + state.secretCode,
                },
            })
            .then((response) => {
                state.sneakers = response.data.sneakers;
                state.loading = false;
                if (state.sneakers.length === 0) {
                    state.nothingFound = true;
                } else {
                    state.nothingFound = false;
                }
            });
    });

function deleteSneaker(event) {
    const element = document.getElementById(event.target.id);
    element.remove();
    axios.delete(ROOT_URL + "/api/sneakers?id=" + event.target.id, {
        headers: {
            "Content-type": "application/json; charset=UTF-8",
            Authorization: "Bearer " + state.secretCode,
        },
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
                <div
                    class="table-responsive col-12 col-md-10"
                    v-if="state.sneakers"
                >
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
                            <tr
                                v-for="sneaker in state.sneakers"
                                :key="sneaker"
                                :id="sneaker.id"
                            >
                                <th scope="row" class="ms-2">
                                    <img
                                        :src="sneaker.image"
                                        class="tableImage"
                                        alt="..."
                                    />
                                </th>
                                <td>
                                    <span>{{ sneaker.name }}</span
                                    ><br />

                                    Style: {{ sneaker.style }}
                                    <br />
                                    EU: {{ sneaker.size }}
                                </td>

                                <td>
                                    <span>Cost price: {{ sneaker.cost }}€</span
                                    ><br />
                                    Sell price:
                                    {{
                                        Math.floor(
                                            sneaker.cost *
                                                (getMeta("user-profit") / 100 +
                                                    1)
                                        )
                                    }}€
                                </td>
                                <td>
                                    <img
                                        v-if="sneaker.restocks"
                                        src="https://restocks.net/favicon.ico"
                                        class="me-1"
                                        style="width: 2rem"
                                        alt="..."
                                    />
                                    <img
                                        v-if="sneaker.stockx"
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
                                            <a
                                                type="button"
                                                class="btn btn-sm mt-2"
                                                :href="
                                                    invoiceStorage +
                                                    sneaker.invoice
                                                "
                                                download
                                            >
                                                <i
                                                    data-feather="file-text"
                                                    class="text-primary"
                                                >
                                                </i>
                                            </a>
                                        </div>
                                        <div>
                                            <button
                                                type="button"
                                                class="btn btn-sm mt-2"
                                                :id="sneaker.id"
                                                @click="deleteSneaker"
                                            >
                                                <i
                                                    data-feather="trash"
                                                    class="text-danger"
                                                    :id="sneaker.id"
                                                    @click="deleteSneaker"
                                                >
                                                </i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 v-if="state.nothingFound">No sneakers found</h5>
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
            <Manage
        /></ManageModal>
    </div>
</template>
