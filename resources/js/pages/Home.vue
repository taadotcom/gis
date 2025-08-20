<template>

<!-- Bootstrap Starter Template Example -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">Bootstrap Starter Template</h2>
            <p class="lead mb-4">
                This is a simple Bootstrap starter template. Replace this section with your own content.
            </p>
            <a href="https://getbootstrap.com/" target="_blank" class="btn btn-primary">
                Learn More
            </a>
        </div>
    </div>
</div>


    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <div class="text-xl font-bold text-blue-600">My SPA Website</div>
                <div>
                    <router-link to="/" class="text-gray-700 hover:text-blue-600 px-3">Home</router-link>
                    <router-link to="/about" class="text-gray-700 hover:text-blue-600 px-3">About</router-link>
                    <router-link to="/contact" class="text-gray-700 hover:text-blue-600 px-3">Contact</router-link>
                </div>
            </div>
        </nav>
        <main class="container mx-auto px-4 py-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to the SPA!</h1>
            <p class="text-lg text-gray-600 mb-6">
                This is a simple single-page application built with Vue and Tailwind CSS.
            </p>
            <button class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">
                Get Started
            </button>
        </main>
        <footer class="bg-white shadow mt-10">
            <div class="container mx-auto px-4 py-4 text-center text-gray-500">
                &copy; 2024 My SPA Website. All rights reserved.
            </div>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'HomeComponent',
};
</script>

<style scoped>
/* No custom styles needed, Tailwind handles it */
</style>