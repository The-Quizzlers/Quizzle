<script>
import axios from 'axios';
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
    <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
      <router-link to="/quiz">quiz</router-link>
    </button>
    <button @click="test" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
      kokot (axios test)
    </button>
    <Card></Card>
    <Foot></Foot>
  </div>
</template>