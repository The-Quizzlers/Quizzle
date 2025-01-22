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
    
    <Card></Card>
    <Foot></Foot>
  </div>
</template>