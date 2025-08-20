import "./bootstrap";
import AOS from "aos";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./routers";

// Create Vue app instance
const app = createApp(App);

// Auto-register Vue components
Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    const name = path.split('/').pop().replace(/\.\w+$/, '');
    app.component(name, definition.default);
});

// Use router
app.use(router);

// Mount app
app.mount("#app");

// Initialize AOS
AOS.init();
