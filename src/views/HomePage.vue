<template>
    <div>
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
    <!-- Services Section -->
    <section id="relaxed-elegance" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-3xl md:text-4xl font-semibold mb-6" data-aos="fade-up" data-aos-delay="500"
                    data-aos-duration="1000">Relaxed Elegance Unveiled</h1>
                <p class="text-gray-600 mb-12" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1500">Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Ut fringilla sed neque non accumsan. Donec nec
                    purus ut dolor congue sollicitudin.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-gray-50 rounded-lg shadow-md" data-aos="fade-left" data-aos-delay="800"
                    data-aos-duration="1500">
                    <div class="flex justify-center mb-4">
                        <img src="/assets/content1.png" alt="Tailor Corrections"
                            class="w-full max-w-[250px] h-auto object-contain">
                    </div>
                    <h3 class="text-xl md:text-2xl font-semibold mb-2">1 - Tailor Corrections</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, adipiscing elit. Fringilla sed neque accumsan.
                    </p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg shadow-md" data-aos="fade-left" data-aos-delay="800"
                    data-aos-duration="2000">
                    <div class="flex justify-center mb-4">
                        <img src="/assets/content2.png" alt="Tailor-made Sewing"
                            class="w-full max-w-[250px] h-auto object-contain">
                    </div>
                    <h3 class="text-xl md:text-2xl font-semibold mb-2">2 - Tailor-made Sewing</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, adipiscing elit. Fringilla sed neque accumsan.
                    </p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg shadow-md" data-aos="fade-left" data-aos-delay="800"
                    data-aos-duration="2500">
                    <div class="flex justify-center mb-4">
                        <img src="/assets/content3.png" alt="Clothes from Our Tailor"
                            class="w-full max-w-[250px] h-auto object-contain">
                    </div>
                    <h3 class="text-xl md:text-2xl font-semibold mb-2">3 - Clothes from Our Tailor</h3>
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, adipiscing elit. Fringilla sed neque accumsan.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Why Use Our Services Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-semibold mb-8" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">Why
                Use Our Services?</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="p-6 bg-white rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="500">
                    <img src="/assets/image 1.png" alt="Modern style design" class="mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold mb-2">Modern style design</h3>
                    <p class="text-gray-600">Our designs reflect the latest trends, blending modern aesthetics with
                        timeless appeal.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1000">
                    <img src="/assets/image 2.png" alt="Good quality materials" class="mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold mb-2">Good quality materials</h3>
                    <p class="text-gray-600">We use only the highest quality materials to ensure durability and comfort.
                    </p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="1500">
                    <img src="/assets/image 3.png" alt="Professional machines" class="mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold mb-2">Professional machines</h3>
                    <p class="text-gray-600">All our equipment is state-of-the-art, providing precision in every stitch.
                    </p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="2000">
                    <img src="/assets/image 4.png" alt="Featured in magazines" class="mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold mb-2">Featured in magazines</h3>
                    <p class="text-gray-600">Our work has been recognized and featured in prestigious fashion magazines
                        worldwide.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="2500">
                    <img src="/assets/image 5.png" alt="Perfect precision" class="mb-4 mx-auto">
                    <h3 class="text-2xl font-semibold mb-2">Perfect precision</h3>
                    <p class="text-gray-600">Our craftsmanship guarantees accuracy down to the last detail.</p>
                </div>
            </div>
            <button class="mt-8 bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-6 rounded-lg">Read more</button>
        </div>
    </section>
    </div>
  </template>
  
  <script>

  export default {
    name: 'Home',
  };
  </script>