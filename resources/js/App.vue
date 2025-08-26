<template>
    <router-view />
</template>

<script>
import Home from './pages/Home.vue';
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";

export default {
    name: 'App',
    components: {
        AppHeader,
        AppFooter,
        Home

    }
}
</script>

<style scoped>

#app {
    padding: 2rem;
    text-align: center;
}
</style>