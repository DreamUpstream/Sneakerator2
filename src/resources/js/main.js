import { createApp } from "vue";
import App from "./App.vue";
import axios from "axios";
// Component example:
// import InputEnterable from './components/inputs/InputEnterable.vue';
// app.component('InputEnterable', InputEnterable);
import router from "./router";
const app = createApp(App);
app.use(router);

app.mount("#app");
