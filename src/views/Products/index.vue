<template>
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h1 
                class="text-4xl font-extrabold text-gray-900 mb-8 text-center tracking-tight"
                data-aos="fade-up"
                data-aos-duration="1000"
            >
                Product Management
            </h1>

            <!-- Create Product Card -->
            <div 
                class="bg-white shadow-xl rounded-lg p-6 mb-8 border-t-4 border-blue-500"
                data-aos="fade-right"
                data-aos-duration="1000"
            >
                <h2 
                    class="text-2xl font-semibold text-gray-800 mb-6"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    Create New Product
                </h2>
                <form @submit.prevent="createProduct" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div data-aos="fade-up" data-aos-delay="300">
                            <label class="block text-gray-700 font-medium mb-2">Product Name</label>
                            <input 
                                v-model="newProduct.nama" 
                                type="text" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                            />
                        </div>
                        <div data-aos="fade-up" data-aos-delay="400">
                            <label class="block text-gray-700 font-medium mb-2">Price</label>
                            <input 
                                v-model="newProduct.price" 
                                type="number" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                            />
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="500">
                        <label class="block text-gray-700 font-medium mb-2">Description</label>
                        <textarea 
                            v-model="newProduct.description" 
                            required
                            rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                        ></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div data-aos="fade-up" data-aos-delay="600">
                            <label class="block text-gray-700 font-medium mb-2">Stock</label>
                            <input 
                                v-model="newProduct.stock" 
                                type="number" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                            />
                        </div>
                        <div data-aos="fade-up" data-aos-delay="700">
                            <label class="block text-gray-700 font-medium mb-2">Product Image</label>
                            <input 
                                type="file" 
                                @change="handleFileUpload($event, 'new')"
                                accept="image/*"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:text-white hover:file:bg-blue-600"
                            />
                            <div v-if="newProduct.imagePreview" class="mt-2">
                                <img :src="newProduct.imagePreview" alt="Preview" class="h-24 w-24 object-cover rounded-lg shadow-md">
                            </div>
                        </div>
                    </div>

                    <div class="text-right" data-aos="fade-up" data-aos-delay="800">
                        <button 
                            type="submit" 
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 shadow-md"
                        >
                            Create Product
                        </button>
                    </div>
                </form>
            </div>

            <!-- Product List -->
            <div 
                class="bg-white shadow-xl rounded-lg overflow-hidden border-t-4 border-green-500"
                data-aos="fade-left"
                data-aos-duration="1000"
            >
                <div class="p-6">
                    <h2 
                        class="text-2xl font-semibold text-gray-800 mb-4"
                    >
                        Product List
                    </h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-gray-600">Image</th>
                                <th class="px-6 py-4 text-left text-gray-600">Name</th>
                                <th class="px-6 py-4 text-left text-gray-600">Description</th>
                                <th class="px-6 py-4 text-left text-gray-600">Price</th>
                                <th class="px-6 py-4 text-left text-gray-600">Stock</th>
                                <th class="px-6 py-4 text-center text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr 
                                v-for="(product, index) in products" 
                                :key="product.id" 
                                class="border-b hover:bg-gray-50 transition duration-300"
                                data-aos="fade-up"
                                :data-aos-delay="200 * (index + 1)"
                            >
                                <td class="px-6 py-4">
                                    <img 
                                        v-if="product.image" 
                                        :src="product.image" 
                                        alt="Product Image" 
                                        class="h-16 w-16 object-cover rounded-lg shadow-md"
                                    />
                                    <span v-else class="text-gray-400">No Image</span>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ product.nama }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ product.description }}</td>
                                <td class="px-6 py-4 font-semibold text-green-600">{{ product.price }}</td>
                                <td class="px-6 py-4">
                                    <span 
                                        :class="[
                                            'px-3 py-1 rounded-full text-sm font-medium',
                                            product.stock > 10 ? 'bg-green-100 text-green-800' : 
                                            product.stock > 0 ? 'bg-yellow-100 text-yellow-800' : 
                                            'bg-red-100 text-red-800'
                                        ]"
                                    >
                                        {{ product.stock }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <button 
                                            @click="editProduct(product)"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-300 transform hover:scale-105"
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            @click="deleteProduct(product.id)"
                                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 transform hover:scale-105"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Edit Product Modal -->
            <div 
                v-if="editingProduct" 
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
                data-aos="fade-zoom-in"
                data-aos-easing="ease-in-back"
                data-aos-delay="300"
                data-aos-offset="0"
            >
                <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl p-8 relative">
                    <button 
                        @click="cancelEdit" 
                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Product</h2>

                    <form @submit.prevent="updateProduct" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div data-aos="fade-up" data-aos-delay="400">
                                <label class="block text-gray-700 font-medium mb-2">Product Name</label>
                                <input 
                                    v-model="editingProduct.nama" 
                                    type="text" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                                />
                            </div>
                            <div data-aos="fade-up" data-aos-delay="500">
                                <label class="block text-gray-700 font-medium mb-2">Price</label>
                                <input 
                                    v-model="editingProduct.price" 
                                    type="number" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                                />
                            </div>
                        </div>

                        <div data-aos="fade-up" data-aos-delay="600">
                            <label class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea 
                                v-model="editingProduct.description" 
                                required
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                            ></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div data-aos="fade-up" data-aos-delay="700">
                                <label class="block text-gray-700 font-medium mb-2">Stock</label>
                                <input 
                                    v-model="editingProduct.stock" 
                                    type="number" 
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300"
                                />
                            </div>
                            <div data-aos="fade-up" data-aos-delay="800">
                                <label class="block text-gray-700 font-medium mb-2">Product Image</label>
                                <input 
                                    type="file" 
                                    @change="handleFileUpload($event, 'edit')"
                                    accept="image/*"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:text-white hover:file:bg-blue-600"
                                />
                                <div v-if="editingProduct.imagePreview" class="mt-2">
                                    <img :src="editingProduct.imagePreview" alt="Preview" class="h-24 w-24 object-cover rounded-lg shadow-md">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button 
                                type="button" 
                                @click="cancelEdit"
                                class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition duration-300"
                            >
                                Cancel
                            </button>
                            <button 
                                type="submit" 
                                class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 transform hover:scale-105 shadow-md"
                            >
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Api from "@/api";

export default {
    data() {
        return {
            products: [],
            newProduct: {
                nama: "",
                description: "",
                image: null,
                imagePreview: null,
                price: 0,
                stock: 0,
            },
            editingProduct: null,
        };
    },
    methods: {
        // Keep the existing methods from the previous implementation
        handleFileUpload(event, type) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    if (type === 'new') {
                        this.newProduct.image = file;
                        this.newProduct.imagePreview = e.target.result;
                    } else {
                        this.editingProduct.image = file;
                        this.editingProduct.imagePreview = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        },
        async fetchProducts() {
            try {
                const response = await Api.get("/products");
                this.products = response.data;
            } catch (error) {
                console.error("Error fetching products:", error);
                alert("Failed to fetch products. Please try again.");
            }
        },
        async createProduct() {
            try {
                const formData = new FormData();
                formData.append('nama', this.newProduct.nama);
                formData.append('description', this.newProduct.description);
                formData.append('price', this.newProduct.price);
                formData.append('stock', this.newProduct.stock);
                
                if (this.newProduct.image) {
                    formData.append('image', this.newProduct.image);
                }

                const response = await Api.post("/products", formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                this.products.push(response.data);
                this.newProduct = { 
                    nama: "", 
                    description: "", 
                    image: null, 
                    imagePreview: null, 
                    price: 0, 
                    stock: 0 
                };
                alert("Product created successfully!");
            } catch (error) {
                console.error("Error creating product:", error);
                alert("Failed to create product.Please check your inputs.");
            }
        },
        async updateProduct() {
            try {
                const formData = new FormData();
                formData.append('nama', this.editingProduct.nama);
                formData.append('description', this.editingProduct.description);
                formData.append('price', this.editingProduct.price);
                formData.append('stock', this.editingProduct.stock);
                
                if (this.editingProduct.image) {
                    formData.append('image', this.editingProduct.image);
                }
                
                // Add method spoofing for PUT request
                formData.append('_method', 'PUT');

                const response = await Api.post(`/products/${this.editingProduct.id}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });

                const index = this.products.findIndex((p) => p.id === response.data.id);
                this.products.splice(index, 1, response.data);
                this.editingProduct = null;
                alert("Product updated successfully!");
            } catch (error) {
                console.error("Error updating product:", error);
                alert("Failed to update product. Please check your inputs.");
            }
        },
        async deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                try {
                    await Api.delete(`/products/${productId}`);
                    this.products = this.products.filter((product) => product.id !== productId);
                    alert("Product deleted successfully!");
                } catch (error) {
                    console.error("Error deleting product:", error);
                    alert("Failed to delete product.");
                }
            }
        },
        editProduct(product) {
            this.editingProduct = { 
                ...product,
                image: null,
                imagePreview: product.image
            };
        },
        cancelEdit() {
            this.editingProduct = null;
        },
    },
    mounted() {
        this.fetchProducts();
    },
};
</script>