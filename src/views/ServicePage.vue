<!-- ServicePage.vue -->
<template>
    <!-- Services Hero Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto text-center" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Our Tailoring Services</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Discover our comprehensive range of professional tailoring services designed to meet your every fashion
                need.
            </p>
        </div>
    </section>

    <!-- Detailed Services Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center mb-6">
                        <i class="fas fa-cut text-4xl text-yellow-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold text-gray-800">Custom Fitting</h3>
                    </div>
                    <p class="text-gray-600 text-center">
                        Precise measurements and personalized adjustments to ensure your clothing fits perfectly.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center mb-6">
                        <i class="fas fa-tshirt text-4xl text-yellow-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold text-gray-800">Alterations</h3>
                    </div>
                    <p class="text-gray-600 text-center">
                        Transform your existing wardrobe with expert alterations for a renewed look and feel.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center mb-6">
                        <i class="fas fa-vest text-4xl text-yellow-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold text-gray-800">Bespoke Clothing</h3>
                    </div>
                    <p class="text-gray-600 text-center">
                        Completely custom garments crafted from scratch to your exact specifications and style.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="800">
                    <div class="text-center mb-6">
                        <i class="fas fa-ruler text-4xl text-yellow-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold text-gray-800">Suit Tailoring</h3>
                    </div>
                    <p class="text-gray-600 text-center">
                        Professional suit design and tailoring for every occasion, from business to formal events.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="1000">
                    <div class="text-center mb-6">
                        <i class="fas fa-dress text-4xl text-yellow-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold text-gray-800">Wedding Attire</h3>
                    </div>
                    <p class="text-gray-600 text-center">
                        Specialized wedding dress and suit tailoring to make your special day truly memorable.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="1200">
                    <div class="text-center mb-6">
                        <i class="fas fa-shirt text-4xl text-yellow-500 mb-4"></i>
                        <h3 class="text-2xl font-semibold text-gray-800">Shirt Customization</h3>
                    </div>
                    <p class="text-gray-600 text-center">
                        Design and craft custom shirts with personalized details, fabrics, and perfect fit.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 bg-white text-center">
        <div class="container mx-auto" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Ready to Transform Your Style?</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                Book an order and discover the perfect fit for your style.
            </p>
            <router-link :to="{ name: 'orders.index' }"
                class="bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-8 rounded-lg text-lg">
                Book Order
            </router-link>
        </div>
    </section>
</template>

<script>
export default {
    name: 'ServicePage',
};
</script>

<style scoped>
/* Scoped styles */
</style>