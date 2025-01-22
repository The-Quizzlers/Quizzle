<script>
import axios from 'axios';
import Card from '../components/Card.vue';
import Foot from '../components/Foot.vue';
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
    test() {
      console.log(axios.get(`/api/get-message`));;
    },
    dataTest() {

    }
  }
}
</script>

<template>
  <div>
    <Nav></Nav>
    <div class="flex flex-col items-center justify-center text-center h-screen">
      <h1 class="font-medium pb-10 text-6xl">Welcome, n</h1>
      <p class="font-medium text-2xl max-w-2xl">
      “Master whatever you’re learning with Quizzle’s interactive flashcards, 
      practice tests and study activities.”
      </p>
      <div class="flex items-center my-3 w-1/2">
          <div class="flex-grow h-px bg-gray-300"></div>
      </div>
    </div>
    <Card></Card>
    <Foot></Foot>
  </div>
</template>