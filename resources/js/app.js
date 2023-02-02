import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
import "../css/app.css";

import { createApp } from "vue";

import App from "./App.vue";
import router from "./router.js";

const app = createApp(App);

app.use(router);
app.mount("#app");
