<script setup>
import { ref, reactive, onMounted } from "vue";
import feather from "feather-icons";
import Chart from "chart.js";
import axios from "axios";
import { useTokensStore } from "../stores/tokens";
import { useToast } from "vue-toastification";

const tokensStore = useTokensStore();
const toast = useToast();

import ManageModal from "../components/ManageModal";

onMounted(() => {
    feather.replace();
});

function removeTokens() {
    toast.warning("Paid 50 tokens.", {
        timeout: 5000,
    });
    tokensStore.remove(50);
}
const state = reactive({
    loading: false,
    searchQuery: "",
    foundResults: undefined,
    searchSuccess: false,
    marketData: undefined,
});

function analyse(marketData) {
    if (tokensStore.tokens >= 50) {
        removeTokens();
        showModal.value = true;
        state.marketData = marketData;
    } else {
        toast.error("Not enough tokens...", {
            timeout: 5000,
        });
    }
}

const showModal = ref(false);
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
</script>

<template>
    <div>
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-6">
                <h4 class="mt-5 mb-3">Enter sneaker name to start:</h4>
                <div class="input-group d-flex justify-content-center mt-2">
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
        <div v-if="state.loading" class="d-flex justify-content-center mt-3">
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
                        class="container-fluid py-2 d-flex flex-md-row flex-column"
                    >
                        <div class="col-8 col-md-4 me-md-5">
                            <img
                                :src="
                                    state.foundResults && result.media.imageUrl
                                "
                                class="rounded img-fluid"
                                alt="..."
                            />
                        </div>
                        <div class="col-6 ms-5">
                            <h4 class="fw-bold">
                                {{ state.foundResults && result.name }}
                            </h4>
                            <p class="col-md-8">
                                {{ state.foundResults && result.category }}
                            </p>
                            <p class="col-md-8">
                                {{ state.foundResults && result.colorway }}
                                <br />
                                {{ state.foundResults && result.styleId }}
                            </p>
                            <p class="col-md-8 mt-2">
                                🔥 Sales in last 24 hours:
                                {{
                                    state.foundResults &&
                                    result.market.salesLast72Hours
                                }}
                                <br />
                                💸 Last sale: ${{
                                    state.foundResults && result.market.lastSale
                                }}
                            </p>
                            <button
                                class="btn btn-success bg-gradient"
                                type="button"
                                @click="analyse(result.market)"
                            >
                                Analyse 🛢️50
                            </button>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <ManageModal
            :showModal="showModal"
            @onBootstrapModalClose="showModal = false"
        >
            <div class="">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Data</th>
                            <th scope="col" class="text-center">Values</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" class="text-center">
                                Number of bids:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["numberOfBids"]
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Number of asks:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["numberOfAsks"]
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">Lowest ask:</td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["lowestAsk"]
                                }}$
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Highest bid:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["highestBid"]
                                }}$
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Lowest ask size:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["lowestAskSize"]
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Highest bid size:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["highestBidSize"]
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Annual biggest sale:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["annualHigh"]
                                }}$
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Annual lowest sale:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["annualLow"]
                                }}$
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Sales in the last 72 hours:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["salesLast72Hours"]
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">Volatility:</td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["volatility"]
                                }}
                            </td>
                        </tr>
                        <tr>
                            <td scope="row" class="text-center">
                                Total sales in $:
                            </td>
                            <td class="text-center">
                                {{
                                    state.marketData &&
                                    state.marketData["totalDollars"]
                                }}$
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </ManageModal>
    </div>
</template>
