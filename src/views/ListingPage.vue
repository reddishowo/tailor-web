<template>
    <div class="min-h-screen py-12">
        <!-- Hero Section -->
        <section class="container mx-auto px-4 mb-16 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-yellow-600 mb-6" data-aos="fade-up">
                Our Products
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Discover our collection of high-quality products crafted with care and attention to detail.
            </p>
        </section>

        <!-- Products Grid -->
        <section class="container mx-auto px-4">
            <!-- Loading State -->
            <div v-if="loading" class="flex justify-center items-center h-96">
                <div class="flex flex-col items-center gap-4">
                    <div class="animate-spin rounded-full h-16 w-16 border-4 border-yellow-500 border-t-transparent"></div>
                    <p class="text-gray-600">Loading products...</p>
                </div>
            </div>

            <!-- Products Grid -->
            <div v-else class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <div v-for="product in products" 
                     :key="product.id" 
                     class="group bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl transform hover:-translate-y-2"
                     data-aos="fade-up">
                    <!-- Product Image -->
                    <div class="relative aspect-w-1 aspect-h-1 w-full overflow-hidden">
                        <img v-if="product.image" 
                             :src="product.image" 
                             :alt="product.nama"
                             class="w-full h-72 object-cover transform transition-transform duration-300 group-hover:scale-110">
                        <div v-else class="w-full h-72 bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-400 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                No image available
                            </span>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-1">{{ product.nama }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">{{ product.description }}</p>
                        
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-2xl font-bold text-yellow-600">
                                ${{ formatPrice(product.price) }}
                            </span>
                            <span class="px-3 py-1 text-sm text-yellow-600 bg-yellow-100 rounded-full">
                                Stock: {{ product.stock }}
                            </span>
                        </div>

                        <!-- Add to Cart Button -->
                        <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 px-6 rounded-xl font-semibold 
                                     transition-all duration-300 transform hover:shadow-lg 
                                     focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Api from '@/api';

export default {
    name: 'Listing',
    data() {
        return {
            products: [],
            loading: true
        };
    },
    methods: {
        async fetchProducts() {
            try {
                this.loading = true;
                const response = await Api.get("/products");
                this.products = response.data.map(product => ({
                    ...product,
                    image: product.image || null
                }));
            } catch (error) {
                console.error("Error fetching products:", error);
                alert("Failed to fetch products. Please try again.");
            } finally {
                this.loading = false;
            }
        },
        formatPrice(price) {
            const numPrice = Number(price);
            if (isNaN(numPrice)) return '0.00';
            
            return new Intl.NumberFormat('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(numPrice);
        }
    },
    mounted() {
        this.fetchProducts();
    }
};
</script>