import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";

import "./assets/main.css";
import Toast from "vue-toastification";
import {globalMixin} from "./mixin/mixin";

const app = createApp(App);

app.use(createPinia());
app.use(router);
app.mixin(globalMixin)

app.mount("#app");
