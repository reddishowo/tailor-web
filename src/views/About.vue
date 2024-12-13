<template>
    <!-- About Hero Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6" data-aos="fade-up">About Tailor</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-12" data-aos="fade-up" data-aos-delay="300">
                We are passionate crafters dedicated to creating elegant, personalized clothing that tells your unique
                story.
            </p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <img src="/assets/about-image.png" alt="Our Story" class="rounded-lg shadow-lg object-cover h-96">
            </div>
            <div data-aos="fade-left">
                <h2 class="text-3xl font-semibold mb-6">Our Journey</h2>
                <p class="text-gray-600 mb-4">
                    Founded in 2010, our tailoring studio began with a simple mission: to create clothing that not only
                    fits perfectly but also reflects individual style and personality.
                </p>
                <p class="text-gray-600">
                    From humble beginnings to becoming a recognized name in custom tailoring, we have consistently
                    prioritized quality, craftsmanship, and personal connection with our clients.
                </p>
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-semibold mb-12" data-aos="fade-up">Our Talented Team</h2>
            <div class="grid md:grid-cols-2 gap-8 justify-center">
                <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="300">
                    <img src="/assets/team1.png" alt="Tailor" class="rounded-full mx-auto mb-4 w-48 h-48 object-cover">
                    <h3 class="text-2xl font-semibold">Farriel Arrianta</h3>
                    <p class="text-gray-600">Frontend + Backend Engineer</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="300">
                    <img src="/assets/team1.png" alt="Tailor" class="rounded-full mx-auto mb-4 w-48 h-48 object-cover">
                    <h3 class="text-2xl font-semibold">Valentin Suci Tianggara</h3>
                    <p class="text-gray-600">UI/UX Designer</p>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: 'About',
};
</script>

<style scoped>
/* Scoped styles */
</style>
