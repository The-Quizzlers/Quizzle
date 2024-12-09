<script>
import axios from 'axios';
export default {
  name: 'App',
  methods: {
    goToQuiz() {
      this.$router.push({ name: 'Quiz' });
    },
    mounted() {
      console.log(axios.put('localhost/backend/test', {
      }));
    }
  }
}
</script>

<template>
  <div>
    <h1 className="text-3xl font-bold justify-self-center">
      pica kokot kurva mac
    </h1>
    <button @click="goToQuiz" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
      Go to Quiz
    </button>
  </div>
</template>