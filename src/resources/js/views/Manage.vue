<script setup>
import { reactive, onMounted } from "vue";
import router from "../router";
import feather from "feather-icons";
import Chart from "chart.js";
import axios from "axios";

onMounted(() => {
    feather.replace();
});

const state = reactive({
    loading: false,
    searchQuery: "",
    foundResults: undefined,
    searchSuccess: false,
    selected: false,
    selectedStyle: undefined,
    secretCode: undefined,
    price: "",
    size: "",
    stockx: false,
    restocks: false,
    selectedUrl: undefined,
    selectedName: undefined,
    selectedColorway: undefined,
    isDisabled: false,
    // selectedUrl:
    //     "https://images.stockx.com/images/Nike-Blazer-Mid-77-Vintage-Zig-Zag.png?fit=fill&bg=FFFFFF&w=700&h=500&fm=webp&auto=compress&trim=color&q=90&dpr=2&updated_at=1609406827",
    // selectedName: "Zig Zag",
    // selectedColorway: "White/Sail-Summit White-Bright Crimson",
});

function processInfo() {
    let formData = new FormData();
    formData.append("user_id", getMeta("user-id"));
    formData.append("name", state.selectedName);
    formData.append("cost", state.price);
    formData.append("image", state.selectedUrl);
    formData.append("style", state.selectedStyle);
    formData.append("stockx", +state.stockx);
    formData.append("restocks", +state.restocks);
    formData.append("size", state.size);
    formData.append("invoice", document.querySelector("#formFile").files[0]);
    return formData;
}

function search() {
    state.loading = true;
    axios
        .get(`https://stockx.com/api/browse?_search=${state.searchQuery}`)
        .then((response) => {
            let products = response.data.Products;
            state.foundResults = products.filter(
                (products, index, self) =>
                    index ===
                    self.findIndex((t) => t.styleId === products.styleId)
            );
            state.searchSuccess = true;
            state.loading = false;
        });
}

function selectSneaker(url, name, colorway, style) {
    state.selected = true;
    state.selectedUrl = url;
    state.selectedName = name;
    state.selectedColorway = colorway;
    state.selectedStyle = style;
}

function getMeta(metaName) {
    const metas = document.getElementsByTagName("meta");
    for (let i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute("name") === metaName) {
            return metas[i].getAttribute("content");
        }
    }

    return "";
}

function postSneaker() {
    state.isDisabled = true;
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
            let formData = processInfo();
            (async () => {
                const rawResponse = await fetch(ROOT_URL + "/api/sneakers/", {
                    method: "POST",
                    headers: {
                        Accept: "Application/json",
                        Authorization: "Bearer " + state.secretCode,
                    },
                    body: formData,
                });
                const content = await rawResponse.json();
                router.go();
            })();
        });
}
</script>

<template>
    <div>
        <div v-if="!state.selected">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-md-12">
                    <h4 class="mb-3">Search sneaker to add:</h4>
                    <div
                        class="input-group d-flex justify-content-center text-center"
                    >
                        <div class="form-outline">
                            <input
                                type="search"
                                id="sneakerSearch"
                                class="form-control"
                                placeholder="Search"
                                v-model="state.searchQuery"
                            />
                        </div>
                        <button
                            @click="search()"
                            type="button"
                            class="btn bg-success bg-gradient"
                        >
                            <i data-feather="search" class="text-light"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div
                v-if="state.loading"
                class="d-flex justify-content-center mt-3"
            >
                <div class="loader"></div>
            </div>
            <div
                v-if="state.searchSuccess"
                class="mt-2 col-12 d-flex justify-content-center"
            >
                <div class="mt-2 col-10">
                    <div
                        v-for="result in state.foundResults.slice(0, 10)"
                        :key="result"
                    >
                        <div
                            class="container-fluid py-2 d-flex flex-row flex-column"
                        >
                            <div
                                class="col-12 me-5 d-flex justify-content-center"
                            >
                                <img
                                    :src="
                                        state.foundResults &&
                                        result.media.imageUrl
                                    "
                                    style="width: 15rem"
                                    alt="..."
                                />
                            </div>
                            <div class="col-12 ms-5">
                                <h4 class="fw-bold">
                                    {{ state.foundResults && result.name }}
                                </h4>
                                <p class="col-12">
                                    {{ state.foundResults && result.category }}
                                </p>
                                <p class="col-12">
                                    {{ state.foundResults && result.colorway }}
                                    <br />
                                    {{ state.foundResults && result.styleId }}
                                </p>
                                <div class="d-grid gap-2 col-10">
                                    <button
                                        class="btn btn-success bg-gradient"
                                        type="button"
                                        @click="
                                            selectSneaker(
                                                result.media.imageUrl,
                                                result.name,
                                                result.colorway,
                                                result.styleId
                                            )
                                        "
                                    >
                                        Select
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
        <div v-if="state.selected">
            <div class="col-12 me-5 d-flex justify-content-center">
                <img :src="state.selectedUrl" style="width: 15rem" alt="..." />
            </div>
            <div class="col-12 d-flex justify-content-center">
                <h4 class="fw-bold">
                    {{ state.selectedName }}
                </h4>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <p>{{ state.selectedColorway }}</p>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <h5>Select platforms:</h5>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <ul class="me-4">
                    <li>
                        <input
                            type="checkbox"
                            id="cb1"
                            v-model="state.restocks"
                        />
                        <label for="cb1"
                            ><img
                                src="https://restocks.net/favicon.ico"
                                style="width: 3rem; height: 3rem"
                                alt="..."
                        /></label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="cb2"
                            v-model="state.stockx"
                        />
                        <label for="cb2">
                            <img
                                src="https://web-assets.stockx.com/static/logo/favicon.ico"
                                alt="..."
                                style="width: 3rem; height: 3rem"
                        /></label>
                    </li>
                </ul>
            </div>

            <div class="d-flex justify-content-center">
                <h5>Cost / Buy price:</h5>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-8 me-2">
                    <div class="input-group">
                        <input
                            type="number"
                            class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)"
                            v-model="state.price"
                        />
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <h5>Size:</h5>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-8 me-2">
                    <div class="input-group">
                        <input
                            type="number"
                            class="form-control"
                            aria-label="Dollar amount (with dot and two decimal places)"
                            v-model="state.size"
                        />
                        <span class="input-group-text">✦</span>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <h5>Invoice:</h5>
            </div>
            <div class="d-flex justify-content-center">
                <div>
                    <input class="form-control" type="file" id="formFile" />
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button
                    type="button"
                    class="btn btn-success bg-gradient shadow col-8"
                    @click="postSneaker()"
                    :disabled="state.isDisabled"
                >
                    Save changes
                </button>
            </div>
        </div>
    </div>
</template>
