import { createApp } from "vue";
import App from "./App.vue";
import axios from "axios";
import router from "./router";
import { createPinia } from "pinia";

import Toast from "vue-toastification";

import "vue-toastification/dist/index.css";
const app = createApp(App);
app.use(router);
app.use(Toast);
app.use(createPinia());
app.mount("#app");
