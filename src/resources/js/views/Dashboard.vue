<script setup>
import { reactive } from "vue";
import feather from "feather-icons";
import Chart from "chart.js";
import axios from "axios";

import SideMenu from "../components/SideMenu.vue";

// window.addEventListener("load", () => {
//     (function () {
//         "use strict";

//         feather.replace({ "aria-hidden": "true" });

//         // Graphs
//         var ctx = document.getElementById("myChart");
//         // eslint-disable-next-line no-unused-vars
//         var myChart = new Chart(ctx, {
//             type: "line",
//             data: {
//                 labels: [
//                     "Sunday",
//                     "Monday",
//                     "Tuesday",
//                     "Wednesday",
//                     "Thursday",
//                     "Friday",
//                     "Saturday",
//                 ],
//                 datasets: [
//                     {
//                         data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
//                         lineTension: 0,
//                         backgroundColor: "transparent",
//                         borderColor: "#007bff",
//                         borderWidth: 4,
//                         pointBackgroundColor: "#007bff",
//                     },
//                 ],
//             },
//             options: {
//                 scales: {
//                     yAxes: [
//                         {
//                             ticks: {
//                                 beginAtZero: false,
//                             },
//                         },
//                     ],
//                 },
//                 legend: {
//                     display: false,
//                 },
//             },
//         });
//     })();
// });
window.addEventListener("load", () => {
    feather.replace();
});
const state = reactive({
    sneakerCode: "",
});

const searchResults = reactive({
    sneakerPhoto: [],
    sneakerName: [],
    sneakerBrand: [],
});

function search() {
    console.log(state.sneakerCode);
    axios
        .get(`https://stockx.com/api/browse?_search=${state.sneakerCode}`)
        .then((response) => {
            let products = response.products;
            searchResults.sneakerName = products[0].name;
        });
}

function renderResults() {}
</script>

<template>
    <div>
        <div class="row d-flex justify-content-center text-center">
            <div class="col-md-6">
                <h4 class="mt-5">Enter a sneaker to start:</h4>
                <div class="input-group d-flex justify-content-center mt-2">
                    <div class="form-outline">
                        <input
                            type="search"
                            id="sneakerSearch"
                            class="form-control"
                            placeholder="Search"
                            v-model="state.sneakerCode"
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
