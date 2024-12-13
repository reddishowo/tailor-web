<!-- Hero.vue -->
<template>
    <!-- Hero Section -->
    <section class="flex flex-col items-center text-center h-[75vh] space-y-6">
        <!-- Image -->
        <div class="w-full max-w-4xl">
            <img src="/assets/image-header.png" alt="Image" class="w-full h-auto rounded-lg object-cover pt-32">
        </div>

        <!-- Text Content -->
        <div class="w-full max-w-xl">
            <h1 class="text-4xl font-bold text-gray-800 mt-6">Designing Your Daily Elegance</h1>
            <p class="text-lg text-gray-600 p-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="#relaxed-elegance" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-6 rounded-lg">Read
                more</a>
        </div>
    </section>
  </template>
  
  <script>
  export default {
    name: 'Hero',
  };
  </script>
  
  <style scoped>
  /* Scoped styles */
  </style>
  