<template>
  <nav class="flex items-center justify-between flex-wrap p-8">
    <app-logo></app-logo>
    <div class="block lg:hidden">
      <button @click="toggleMenu"
        class="flex items-center px-4 py-2 border rounded-lg text-white bg-main-green hover:bg-green-600 focus:outline-none shadow transition duration-200">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <title>Menu</title>
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    <div class="w-full lg:flex items-center lg:w-auto sm:block mt-4 lg:mt-0" v-bind:class="{ 'hidden': menu }">
      <a href="#" v-scroll-to="'#features'"
        class="block px-4 py-2 rounded-lg font-semibold text-white bg-main-green hover:bg-green-600 transition duration-200 mr-2 ">
        หน้าแรก
      </a>
      <a href="#" @click="$emit('scrollTo', 'about')"
        class="block px-4 py-2 rounded-lg font-semibold text-white bg-main-green hover:bg-green-600 transition duration-200 mr-2 ">
        เกี่ยวกับเรา
      </a>
      <a href="#" v-scroll-to="'#contact'"
        class="block px-4 py-2 rounded-lg font-semibold text-white bg-main-green hover:bg-green-600 transition duration-200 mr-2 ">
        ติดต่อเรา
      </a>
    </div>
  </nav>
</template>

<script>
import AppLogo from "./AppLogo.vue";

export default {
  components: {
    AppLogo
  },
  data() {
    return {
      menu: true
    };
  },
  methods: {
    toggleMenu() {
      this.menu = !this.menu
    }
  },
};
</script>
