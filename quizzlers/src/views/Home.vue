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
      const base_url = "http://localhost:8000";
      console.log(axios.get(`${base_url}/api/get-message`));
    // test() {
    //   console.log("KOKOT");
    //   console.log(axios({
    //     method: "post",
    //     url: "http://localhost:5173/backend/test"
    //   }));
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
    <button @click="test()">
      KOKOT
    </button>
  </div>
</template>