<script>
import axios from "axios";
import Card from '../components/card.vue';
import Foot from '../components/foot.vue';
import Nav from '../components/nav.vue';

export default {
  name: 'Home',
  components: {
    Card,
    Foot,
    Nav,
  },
  methods: {
    goToQuiz() {
      this.$router.push({ name: 'Quiz' });
    },
  }
}
</script>

<template>
  <div>
    <Nav></Nav>
    <div class="flex flex-col items-center justify-center text-center h-screen">
      <h1 class="font-medium pb-10 text-6xl">Welcome, nigga</h1>
      <p class="font-medium text-2xl max-w-2xl">
      “Master whatever you’re learning with Quizzle’s interactive flashcards, 
      practice tests and study activities.”
      </p>
      <div class="flex items-center my-3 w-1/2">
          <div class="flex-grow h-px bg-gray-300"></div>
      </div>
      <!-- Added buttons here -->
      <div class="mt-6 flex items-center">
        <!-- Create Account Button -->
        <button class="px-6 py-2 bg-[#9FA0FF] text-white rounded-lg border-4 border-[#CFD2FF] hover:bg-[#7F80FF] hover:scale-105 active:scale-95 transition-all duration-200">
          <router-link to="/register" class="font-bold">Create Account</router-link>
        </button>
        <span class="mx-4 text-gray-600 font-medium">or</span>
        <!-- Log in Button -->
        <button class="px-6 py-2 bg-white text-[#3B3B89] rounded-lg border-4 border-[#CFD2FF] hover:bg-[#E6E7FF] hover:scale-105 active:scale-95 transition-all duration-200">
          <router-link to="/login" class="font-bold">Log in to Existing Account</router-link>
        </button>
      </div>
    </div>
    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
      <router-link to="/quiz">quiz</router-link>
    </button>
    <button class="mt-4 px-4 py-2">
      <router-link to="/profile">profile</router-link>
    </button>
    <button class="mt-4 px-4 py-2">
      <router-link to="/register">register</router-link>
    </button>
    <Card></Card>
    <Foot></Foot>
  </div>
</template>