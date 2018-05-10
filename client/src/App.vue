<template>
  <div id="app">
    <img src="./assets/logo.png">
    <HelloWorld msg="Welcome to Your Fibonacci.Vue"/>
    <Fibonacci/>
    <FibonacciSeq/>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import Fibonacci from './components/Fibonacci.vue'
import FibonacciSeq from './components/FibonacciSeq.vue'

export default {
  name: 'app',
  components: {
    HelloWorld,
    Fibonacci,
    FibonacciSeq
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
