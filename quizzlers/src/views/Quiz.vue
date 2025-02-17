<template>
    <div>
        Tests (for now)
      <form method="get" onsubmit="return false" style="background: lightblue">

        <h3>Test sending data</h3>
        <label>ID</label>
        <input type="number" name="category" v-model="quiz_id">
        <button @click="get_quiz()">get</button>
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

      <form method="post" onsubmit="return false" style="background: lightblue">

        <h3>Test register</h3>
        <label>username</label>
        <input type="text" name="category" v-model="username">
        <label>email</label>
        <input type="text" name="name" v-model="email">
        <label>password</label>
        <input type="text" name="public" v-model="password">
        <button @click="register_test()">send</button>
      </form>

      <form method="get" onsubmit="return false" style="background: lightblue">

        <h3>Test login</h3>
        <label>username</label>
        <input type="text" name="category" v-model="username">
        <label>email</label>
        <input type="text" name="name" v-model="email">
        <label>password</label>
        <input type="text" name="public" v-model="password">
        <button @click="login_test()">send</button>
      </form>

      <form method="post" onsubmit="return false" style="background: lightblue">

        <h3>Test leveling (do login first)</h3>
        <label>correct answers</label>
        <input type="number" v-model="correct">
        <button @click="level_up()">send</button>
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
      quiz_id: null,
      email: "",
      password: "",
      correct: 0,
      user_id: 0,
      user: undefined
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
    get_quiz() {
      axios({
        method: "get",
        url: `http://127.0.0.1:8000/api/quiz/get`,
        params: {
          id: this.quiz_id
        },
        xsrfCookieName: "XSRF-TOKEN",
        xsrfHeaderName: "X-XSRF-TOKEN"
      }).then((response) => {
        console.log(response);
      });
    },
    register_test() {
      axios({
        method: "post",
        url: `http://127.0.0.1:8000/api/auth/register`,
        data: {
          username: this.username,
          email: this.email,
          password: this.password
        },
        xsrfCookieName: "XSRF-TOKEN",
        xsrfHeaderName: "X-XSRF-TOKEN"
      }).then((response) => {
        console.log(response);
      });
    },
    login_test() {
      axios({
        method: "get",
        url: `http://127.0.0.1:8000/api/auth/login`,
        params: {
          email: this.email,
          password: this.password
        },
        xsrfCookieName: "XSRF-TOKEN",
        xsrfHeaderName: "X-XSRF-TOKEN"
      }).then((response) => {
        this.user = response.data.user[0];
        console.log(this.user);
      });
    },
    level_up() {
      axios({
        method: "post",
        url: `http://127.0.0.1:8000/api/auth/level`,
        data: {
          user: this.user,
          correct: this.correct,
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
