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
    kokot() {
      axios.put('http://localhost/backend/test', {})
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
}
</script>

<template>
  <div>
    <Nav></Nav>
    <h1 class="text-3xl font-bold justify-self-center">
      pica kokot kurva mac
    </h1>
    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
      <router-link to="/quiz">quiz</router-link>
    </button>
    <button @click="kokot" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
      kokot (axios test)
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