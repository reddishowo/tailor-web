<template>
    <div>
      <!-- Modal Overlay -->
      <div 
        v-if="isModalOpen" 
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
        @click.self="closeModal"
      >
        <!-- Modal Container -->
        <div 
          class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 p-6 transform transition-all duration-300"
          @click.stop
        >
          <!-- Modal Header -->
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Contact Us</h2>
            <button 
              @click="closeModal" 
              class="text-gray-600 hover:text-gray-900"
            >
              <i class="fas fa-times text-xl"></i>
            </button>
          </div>
  
          <!-- Contact Form -->
          <form @submit.prevent="submitForm" class="space-y-4">
            <div>
              <label for="name" class="block text-gray-700 mb-2">Name</label>
              <input 
                type="text" 
                id="name" 
                v-model="form.name" 
                required 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500"
                placeholder="Your Name"
              >
            </div>
  
            <div>
              <label for="email" class="block text-gray-700 mb-2">Email</label>
              <input 
                type="email" 
                id="email" 
                v-model="form.email" 
                required 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500"
                placeholder="your.email@example.com"
              >
            </div>
  
            <div>
              <label for="message" class="block text-gray-700 mb-2">Message</label>
              <textarea 
                id="message" 
                v-model="form.message" 
                required 
                rows="4" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500"
                placeholder="Your message here..."
              ></textarea>
            </div>
  
            <div>
              <button 
                type="submit" 
                :disabled="isSubmitting"
                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg transition-colors duration-300 flex items-center justify-center"
              >
                <span v-if="!isSubmitting">Send Message</span>
                <span v-else>
                  <i class="fas fa-spinner fa-spin mr-2"></i>Sending...
                </span>
              </button>
            </div>
          </form>
  
          <!-- Success Message -->
          <div 
            v-if="submitSuccess" 
            class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert"
          >
            <span class="block sm:inline">Thank you for your message! We'll get back to you soon.</span>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ContactUsModal',
    data() {
      return {
        isModalOpen: false,
        isSubmitting: false,
        submitSuccess: false,
        form: {
          name: '',
          email: '',
          message: ''
        }
      }
    },
    methods: {
      openModal() {
        this.isModalOpen = true
        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden'
      },
      closeModal() {
        this.isModalOpen = false
        this.submitSuccess = false
        // Restore body scroll
        document.body.style.overflow = 'auto'
        // Reset form
        this.form = {
          name: '',
          email: '',
          message: ''
        }
      },
      async submitForm() {
        // Simulate form submission
        this.isSubmitting = true
        
        try {
          // Replace with actual API call
          await new Promise(resolve => setTimeout(resolve, 1500))
          
          this.submitSuccess = true
          this.isSubmitting = false
          
          // Optional: automatically close modal after success
          setTimeout(() => {
            this.closeModal()
          }, 2000)
        } catch (error) {
          console.error('Submission error:', error)
          this.isSubmitting = false
          // Optionally show error message
        }
      }
    },
    beforeUnmount() {
      // Ensure body scroll is restored if component is destroyed with modal open
      document.body.style.overflow = 'auto'
    }
  }
  </script>