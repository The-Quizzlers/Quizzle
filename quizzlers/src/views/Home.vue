<script>
import axios from "axios";
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
  data() {
    return {
      name: "",
      category: "",
      isPublic: false,
    }
  },
  methods: {
    goToQuiz() {
      this.$router.push({ name: 'Quiz' });
    },
    test() {
      let token = axios.defaults.headers.common['X-CSRF-TOKEN']
        axios({
            method: "post",
            url: `http://127.0.0.1:8000/api/dataTest`,
            data: {
              category: this.category,
              name: this.name,
              public: this.isPublic,
            },
            xsrfCookieName: "XSRF-TOKEN",
            xsrfHeaderName: "X-XSRF-TOKEN"
        }).then((response) => {
          console.log(response);
        });
    },
    test2() {
      axios
          .get( `http://127.0.0.1:8000/api/tests/quiz`)
          .then((response) => {
          console.log(response);
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
    <button class="mt-4 px-4 py-2">
      <router-link to="/profile">profile</router-link>
    </button>
    <button class="mt-4 px-4 py-2">
      <router-link to="/register">register</router-link>
    </button>
    <form method="post" onsubmit="return false" style="background: lightblue">

      <h3>Test sending data</h3>
      <label>Category</label>
      <input type="text" name="category" v-model="category">
      <label>Name</label>
      <input type="text" name="name" v-model="name">
      <label>Public</label>
      <input type="checkbox" name="public" v-model="isPublic">
      <button @click="test()">send</button>
    </form>
    <button @click="test2()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">
      kokot (axios test)
    </button>
    <Card></Card>
    <Foot></Foot>
  </div>
</template>