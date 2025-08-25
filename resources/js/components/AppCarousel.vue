<template>
    <div class="carousel">
        <button @click="prev" class="carousel-btn prev">&lt;</button>
        <div class="carousel-items">
            <div
                v-for="(item, index) in items"
                :key="index"
                v-show="index === currentIndex"
                class="carousel-item"
            >
                <slot :item="item">{{ item }}</slot>
            </div>
        </div>
        <button @click="next" class="carousel-btn next">&gt;</button>
    </div>
</template>

<script>
export default {
    name: 'Carousel',
    props: {
        items: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            currentIndex: 0
        };
    },
    methods: {
        prev() {
            this.currentIndex =
                (this.currentIndex - 1 + this.items.length) % this.items.length;
        },
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.items.length;
        }
    }
};
</script>

<style scoped>
.carousel {
    display: flex;
    align-items: center;
}
.carousel-btn {
    background: #eee;
    border: none;
    padding: 0.5em 1em;
    cursor: pointer;
}
.carousel-items {
    flex: 1;
    display: flex;
    justify-content: center;
}
.carousel-item {
    min-width: 200px;
    text-align: center;
}
</style>