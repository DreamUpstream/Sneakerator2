<script setup>
import { reactive, onMounted } from "vue";
import feather from "feather-icons";
import Chart from "chart.js";
import axios from "axios";
import SideMenu from "../components/SideMenu.vue";

onMounted(() => {
    feather.replace();
});

const state = reactive({
    loading: false,
    searchQuery: "",
    foundResults: undefined,
    searchSuccess: false,
});

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
                            <ul class="list-unstyled">
                                <li>
                                    🔥 Sales in last 24 hours:
                                    {{
                                        state.foundResults &&
                                        result.market.salesLast72Hours
                                    }}
                                </li>
                                <li>
                                    💸 Last sale: ${{
                                        state.foundResults &&
                                        result.market.lastSale
                                    }}
                                </li>
                            </ul>
                            <button
                                class="btn btn-success bg-gradient"
                                type="button"
                            >
                                Analyse 🛢️5
                            </button>
                        </div>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <!-- <canvas
            class="my-4 w-100"
            id="myChart"
            width="900"
            height="380"
        ></canvas> -->
        <!-- <h2>Section title</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Header</th>
                        <th scope="col">Header</th>
                        <th scope="col">Header</th>
                        <th scope="col">Header</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1,001</td>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                        <td>text</td>
                    </tr>
                    <tr>
                        <td>1,002</td>
                        <td>placeholder</td>
                        <td>irrelevant</td>
                        <td>visual</td>
                        <td>layout</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>data</td>
                        <td>rich</td>
                        <td>dashboard</td>
                        <td>tabular</td>
                    </tr>
                    <tr>
                        <td>1,003</td>
                        <td>information</td>
                        <td>placeholder</td>
                        <td>illustrative</td>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>1,004</td>
                        <td>text</td>
                        <td>random</td>
                        <td>layout</td>
                        <td>dashboard</td>
                    </tr>
                    <tr>
                        <td>1,005</td>
                        <td>dashboard</td>
                        <td>irrelevant</td>
                        <td>text</td>
                        <td>placeholder</td>
                    </tr>
                    <tr>
                        <td>1,006</td>
                        <td>dashboard</td>
                        <td>illustrative</td>
                        <td>rich</td>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>1,007</td>
                        <td>placeholder</td>
                        <td>tabular</td>
                        <td>information</td>
                        <td>irrelevant</td>
                    </tr>
                    <tr>
                        <td>1,008</td>
                        <td>random</td>
                        <td>data</td>
                        <td>placeholder</td>
                        <td>text</td>
                    </tr>
                    <tr>
                        <td>1,009</td>
                        <td>placeholder</td>
                        <td>irrelevant</td>
                        <td>visual</td>
                        <td>layout</td>
                    </tr>
                    <tr>
                        <td>1,010</td>
                        <td>data</td>
                        <td>rich</td>
                        <td>dashboard</td>
                        <td>tabular</td>
                    </tr>
                    <tr>
                        <td>1,011</td>
                        <td>information</td>
                        <td>placeholder</td>
                        <td>illustrative</td>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>1,012</td>
                        <td>text</td>
                        <td>placeholder</td>
                        <td>layout</td>
                        <td>dashboard</td>
                    </tr>
                    <tr>
                        <td>1,013</td>
                        <td>dashboard</td>
                        <td>irrelevant</td>
                        <td>text</td>
                        <td>visual</td>
                    </tr>
                    <tr>
                        <td>1,014</td>
                        <td>dashboard</td>
                        <td>illustrative</td>
                        <td>rich</td>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>1,015</td>
                        <td>random</td>
                        <td>tabular</td>
                        <td>information</td>
                        <td>text</td>
                    </tr>
                </tbody>
            </table>
        </div> -->
    </div>
</template>
