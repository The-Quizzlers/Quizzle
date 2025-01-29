<template>
    <div>
        Test (for now nigga)
      <form method="post" onsubmit="return false" style="background: lightblue">

        <h3>Test sending data</h3>
        <label>Category</label>
        <input type="text" name="category" v-model="category">
        <label>Name</label>
        <input type="text" name="name" v-model="name">
        <label>Public</label>
        <input type="checkbox" name="public" v-model="isPublic">
        <button @click="create_quiz_test()">send</button>
      </form>

      <form method="post" onsubmit="return false" style="background: lightblue">

        <h3>Test sending data</h3>
        <label>Category</label>
        <input type="text" name="category" v-model="category">
        <label>Name</label>
        <input type="text" name="name" v-model="name">
        <label>Public</label>
        <input type="checkbox" name="public" v-model="isPublic">
        <button @click="create_quiz_test()">send</button>
      </form>
    </div>
</template>
<script>
import axios from "axios";

export default {
  name: 'quiz',
  components: {

  },
  data() {
    return {
      name: "",
      category: "",
      isPublic: false,
      username: "",
    }
  },
  methods: {
    create_quiz_test() {
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
  }
}
</script>
