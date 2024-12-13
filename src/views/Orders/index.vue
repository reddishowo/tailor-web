<template>
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center tracking-tight" data-aos="fade-up"
                data-aos-duration="1000">
                Order Management
            </h1>

            <!-- Create Order Card -->
            <div class="bg-white shadow-xl rounded-lg p-6 mb-8 border-t-4 border-blue-500" data-aos="fade-right"
                data-aos-duration="1000">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6" data-aos="fade-up" data-aos-delay="200">
                    Create New Order
                </h2>
                <form @submit.prevent="createOrder" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div data-aos="fade-up" data-aos-delay="300">
                            <label class="block text-gray-700 font-medium mb-2">Product</label>
                            <select v-model="newOrder.product_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300">
                                <option value="">Select Product</option>
                                <option v-for="product in products" :key="product.id" :value="product.id">
                                    {{ product.nama }} - ${{ product.price }}
                                </option>
                            </select>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="400">
                            <label class="block text-gray-700 font-medium mb-2">Quantity</label>
                            <input v-model="newOrder.quantity" type="number" min="1" required
                                @change="calculateTotalPrice"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300" />
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="500">
                        <label class="block text-gray-700 font-medium mb-2">Total Price</label>
                        <input v-model="newOrder.total_price" type="number" readonly
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" />
                    </div>

                    <div class="text-right" data-aos="fade-up" data-aos-delay="600">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 shadow-md">
                            Create Order
                        </button>
                    </div>
                </form>
            </div>

            <!-- Order List -->
            <div class="bg-white shadow-xl rounded-lg overflow-hidden border-t-4 border-green-500" data-aos="fade-left"
                data-aos-duration="1000">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                        Order List
                    </h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left text-gray-600">Order ID</th>
                                <th class="px-6 py-4 text-left text-gray-600">Product</th>
                                <th class="px-6 py-4 text-left text-gray-600">Quantity</th>
                                <th class="px-6 py-4 text-left text-gray-600">Total Price</th>
                                <th class="px-6 py-4 text-left text-gray-600">Created At</th>
                                <th class="px-6 py-4 text-center text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(order, index) in orders" :key="order.id"
                                class="border-b hover:bg-gray-50 transition duration-300" data-aos="fade-up"
                                :data-aos-delay="200 * (index + 1)">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ order.id }}</td>
                                <td class="px-6 py-4">{{ order.product.nama }}</td>
                                <td class="px-6 py-4">{{ order.quantity }}</td>
                                <td class="px-6 py-4 font-semibold text-green-600">${{ order.total_price }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ formatDate(order.created_at) }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <button @click="editOrder(order)"
                                            class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-300 transform hover:scale-105">
                                            Edit
                                        </button>
                                        <button @click="deleteOrder(order.id)"
                                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 transform hover:scale-105">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Edit Order Modal -->
            <div v-if="editingOrder"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
                data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0">
                <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl p-8 relative">
                    <button @click="cancelEdit"
                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-800 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Order</h2>

                    <form @submit.prevent="updateOrder" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div data-aos="fade-up" data-aos-delay="400">
                                <label class="block text-gray-700 font-medium mb-2">Product</label>
                                <select v-model="editingOrder.product_id" required @change="calculateEditTotalPrice"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300">
                                    <option v-for="product in products" :key="product.id" :value="product.id">
                                        {{ product.nama }} - ${{ product.price }}
                                    </option>
                                </select>
                            </div>
                            <div data-aos="fade-up" data-aos-delay="500">
                                <label class="block text-gray-700 font-medium mb-2">Quantity</label>
                                <input v-model="editingOrder.quantity" type="number" min="1" required
                                    @change="calculateEditTotalPrice"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none transition duration-300" />
                            </div>
                        </div>

                        <div data-aos="fade-up" data-aos-delay="600">
                            <label class="block text-gray-700 font-medium mb-2">Total Price</label>
                            <input v-model="editingOrder.total_price" type="number" readonly
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" />
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="button" @click="cancelEdit"
                                class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 transform hover:scale-105 shadow-md">
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
            orders: [],
            products: [],
            newOrder: {
                product_id: "",
                quantity: 1,
                total_price: 0
            },
            editingOrder: null
        };
    },
    methods: {
        formatDate(dateString) {
            return new Date(dateString).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        },
        calculateTotalPrice() {
            if (this.newOrder.product_id) {
                const selectedProduct = this.products.find(p => p.id == this.newOrder.product_id);
                if (selectedProduct) {
                    this.newOrder.total_price = selectedProduct.price * this.newOrder.quantity;
                }
            }
        },
        calculateEditTotalPrice() {
            if (this.editingOrder.product_id) {
                const selectedProduct = this.products.find(p => p.id == this.editingOrder.product_id);
                if (selectedProduct) {
                    this.editingOrder.total_price = selectedProduct.price * this.editingOrder.quantity;
                }
            }
        },
        async fetchOrders() {
            try {
                const response = await Api.get("/orders");
                this.orders = response.data;
            } catch (error) {
                console.error("Error fetching orders:", error);
                alert("Failed to fetch orders. Please try again.");
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
        async createOrder() {
            try {
                // Add console logs to check the data being sent
                console.log('Creating order with data:', this.newOrder);

                const response = await Api.post("/orders", this.newOrder);

                // Add more detailed error handling
                if (!response.data) {
                    throw new Error('No response data received');
                }

                this.orders.push(response.data);
                this.newOrder = {
                    product_id: "",
                    quantity: 1,
                    total_price: 0
                };
                alert("Order created successfully!");
            } catch (error) {
                // Log the full error details
                console.error("Full error creating order:", error);

                // More detailed error message
                if (error.response) {
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    console.error("Error response:", error.response.data);
                    console.error("Error status:", error.response.status);
                    alert(`Failed to create order: ${error.response.data.message || 'Unknown error'}`);
                } else if (error.request) {
                    // The request was made but no response was received
                    console.error("No response received:", error.request);
                    alert("No response from server. Please check your network connection.");
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.error("Error setting up request:", error.message);
                    alert(`Error: ${error.message}`);
                }
            }
        },
        async updateOrder() {
            try {
                const response = await Api.put(`/orders/${this.editingOrder.id}`, {
                    product_id: this.editingOrder.product_id,
                    quantity: this.editingOrder.quantity,
                    total_price: this.editingOrder.total_price
                });

                const index = this.orders.findIndex((o) => o.id === response.data.id);
                this.orders.splice(index, 1, response.data);
                this.editingOrder = null;
                alert("Order updated successfully!");
            } catch (error) {
                console.error("Error updating order:", error);
                alert("Failed to update order. Please check your inputs.");
            }
        },
        async deleteOrder(orderId) {
            if (confirm("Are you sure you want to delete this order?")) {
                try {
                    await Api.delete(`/orders/${orderId}`);
                    this.orders = this.orders.filter((order) => order.id !== orderId);
                    alert("Order deleted successfully!");
                } catch (error) {
                    console.error("Error deleting order:", error);
                    alert("Failed to delete order.");
                }
            }
        },
        editOrder(order) {
            this.editingOrder = {
                ...order,
                product_id: order.product.id
            };
        },
        cancelEdit() {
            this.editingOrder = null;
        },
    },
    mounted() {
        this.fetchOrders();
        this.fetchProducts();
    },
};
</script>