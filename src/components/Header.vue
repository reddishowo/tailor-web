<!-- Header.vue -->
<template>
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto flex justify-between items-center p-5">
            <!-- Logo Section -->
            <div class="flex items-center space-x-3">
                <img src="/assets/logo.png" alt="Tailor Logo" class="w-10 h-10">
                <h2 class="text-2xl font-semibold text-gray-800">Tailor</h2>
            </div>

            <!-- Burger Menu Icon for Mobile -->
            <div class="flex lg:hidden" onclick="toggleMenu()">
                <i class="fas fa-bars text-xl text-gray-600 cursor-pointer"></i>
            </div>

            <!-- Menu Items -->
            <ul id="menu" class="hidden lg:flex space-x-8 text-gray-700 font-medium">
                <li><router-link to="/" class="hover:text-gray-900">Home</router-link></li>
                <li><router-link to="/about" class="hover:text-gray-900">About</router-link></li>
                <li><router-link to="/servicepage" class="hover:text-gray-900">Services</router-link></li>
                <li><router-link :to="{ name: 'products.index' }" class="hover:text-gray-900">Product</router-link></li>
                <li><router-link :to="{ name: 'orders.index' }" class="hover:text-gray-900">Order</router-link></li>
            </ul>


            <!-- Contact Button for Large Screens -->
            <button class="hidden lg:block bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">
                Contact Us
            </button>
        </nav>

        <!-- Mobile Menu Items (Hidden by Default) -->
        <div id="mobileMenu" class="lg:hidden hidden bg-white shadow-md">
            <ul class="text-gray-700 font-medium space-y-2 p-5">
                <li><router-link to="/" class="hover:text-gray-900">Home</router-link></li>
                <li><router-link to="/about" class="hover:text-gray-900">About</router-link></li>
                <li><router-link to="/servicepage" class="hover:text-gray-900">Services</router-link></li>
                <li><router-link :to="{ name: 'products.index' }" class="hover:text-gray-900">Product</router-link></li>
                <li><router-link :to="{ name: 'orders.index' }" class="hover:text-gray-900">Order</router-link></li>
                <li><a href="contact.html"
                        class="block bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">Contact Us</a>
                </li>
            </ul>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
};
</script>

<style scoped>
/* Scoped styles */
</style>