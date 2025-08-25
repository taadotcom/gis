import "./bootstrap";
import '../css/app.css';// Import main CSS file
import AOS from "aos";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./routers";

// PrimeVue
import PrimeVue from 'primevue/config'
import Carousel from 'primevue/carousel'


// Create Vue app instance
const app = createApp(App);

// Use router
app.use(router);

// Use PrimeVue
app.use(PrimeVue, { ripple: true });
app.component('Carousel', Carousel)

// Mount app
app.mount("#app");

// Initialize AOS
AOS.init();
