<template>
    <div class="bg-blue min-h-screen">
        <header class="container py-8">
            <navigation-menu @scrollTo="$emit('scrollTo', $event)"></navigation-menu>
            <div class="row align-items-center pt-5 enhanced-header">
                <div class="col-lg-6 d-flex justify-content-center mb-4 mb-lg-0">
                    <img
                        src="../../assets/gis-logo.jpg"
                        alt="iphones image"
                        class="img-fluid rounded shadow-lg logo-animate"
                        style="max-height: 350px;"
                    >
                </div>
                <div class="col-lg-6">
                    <h2 class="text-white fw-bold display-4 mb-4 text-center text-shadow gradient-text">
                        กลุ่มงานสารสนเทศภูมิศาสตร์และสื่อประสมเพื่อการบริหาร
                    </h2>
                    <p class="text-light opacity-75 mb-4 text-center fs-5 fade-in">
                        ศูนย์เทคโนโลยีสารสนเทศกลาง
                    </p>
                </div>
            </div>
        </header>
    </div>
</template>

<style scoped>
.text-shadow {
    text-shadow: 0 2px 8px rgba(0,0,0,0.3);
}
.bg-blue {
    background-color: #001747;
}
</style>

<script>
import NavigationMenu from "./NavigationMenu.vue";

export default {
    components: {
        NavigationMenu
    }
};
</script>
