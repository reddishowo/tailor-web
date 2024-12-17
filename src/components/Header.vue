<template>
    <header class="bg-white shadow-md sticky top-0 z-50">
      <nav class="container mx-auto flex justify-between items-center p-4 md:p-5">
        <!-- Logo Section -->
        <div class="flex items-center space-x-3">
          <img src="/assets/logo.png" alt="Tailor Logo" class="w-8 h-8 md:w-10 md:h-10">
          <h2 class="text-xl md:text-2xl font-semibold text-gray-800">Tailor</h2>
        </div>
  
        <!-- Mobile Menu Toggle -->
        <div 
          class="lg:hidden cursor-pointer z-60" 
          @click="toggleMobileMenu"
        >
          <i 
            :class="[
              'fas', 
              isMobileMenuOpen ? 'fa-times text-red-500' : 'fa-bars text-gray-600', 
              'text-xl transition-colors duration-300'
            ]"
          ></i>
        </div>
  
        <!-- Desktop Menu Items -->
        <ul class="hidden lg:flex space-x-6 xl:space-x-8 text-gray-700 font-medium">
          <li v-for="(item, index) in menuItems" :key="index">
            <router-link 
              :to="item.route" 
              class="hover:text-gray-900 transition-colors duration-300"
            >
              {{ item.name }}
            </router-link>
          </li>
        </ul>
  
        <!-- Desktop Contact Button -->
        <button
        @click="openContactModal" 
        class="hidden lg:block bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg transition-colors duration-300">
          Contact Us
        </button>
      </nav>
  
      <!-- Mobile Menu Overlay -->
      <div 
        v-if="isMobileMenuOpen"
        class="fixed inset-0 bg-black bg-opacity-50 lg:hidden z-40"
        @click="toggleMobileMenu"
      ></div>
  
      <!-- Mobile Menu Slide-out -->
      <div 
        class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform transition-transform duration-300 ease-in-out z-50 lg:hidden"
        :class="isMobileMenuOpen ? 'translate-x-0' : 'translate-x-full'"
      >
        <div class="p-6 space-y-4 mt-16">
          <router-link 
            v-for="(item, index) in menuItems" 
            :key="index"
            :to="item.route" 
            class="block text-gray-700 hover:text-gray-900 text-lg font-medium py-2 border-b border-gray-200"
            @click="toggleMobileMenu"
          >
            {{ item.name }}
          </router-link>
          
          <a 
            href="#contact" 
            @click.prevent="openContactModal"
            class="block text-center bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg transition-colors duration-300"
            @click="toggleMobileMenu"
          >
            Contact Us
          </a>
        </div>
      </div>
      <ContactUsModal ref="contactModal" />
    </header>
  </template>
  
  <script>
import ContactUsModal from '@/components/ContactUsModal.vue' // Sesuaikan path impor

export default {
  name: 'Header',
  components: {
    ContactUsModal
  },
  data() {
    return {
      isMobileMenuOpen: false,
      menuItems: [
        { name: 'Home', route: '/' },
        { name: 'About', route: '/about' },
        { name: 'Services', route: '/servicepage' },
        { name: 'Product', route: { name: 'products.index' } },
        { name: 'Order', route: { name: 'orders.index' } }
      ]
    }
  },
  methods: {
    toggleMobileMenu() {
      this.isMobileMenuOpen = !this.isMobileMenuOpen
      
      if (this.isMobileMenuOpen) {
        document.body.style.overflow = 'hidden'
      } else {
        document.body.style.overflow = 'auto'
      }
    },
    openContactModal() {
      // Tutup menu mobile jika terbuka
      if (this.isMobileMenuOpen) {
        this.toggleMobileMenu()
      }
      
      // Buka modal kontak
      this.$refs.contactModal.openModal()
    }
  },
  beforeUnmount() {
    document.body.style.overflow = 'auto'
  }
}
</script>