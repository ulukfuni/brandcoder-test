<template>
    <div class="container">
        <p v-for="(number, index) of numbers" :key="index">{{number}}</p>
        <p v-if="show">you inputted 0</p>
    </div>
</template>
<script>
export default {
  data() {
      return {
          numbers: '',
          show: false
      }
  },
  beforeCreate() {
      this.$bus.$on('gotFib', (data) => {
          this.numbers = data.data === 'but its zero' ? []: data.data;
          this.show = data.data === 'but its zero' ? true :false;
      })
  }
}
</script>
<style scoped>
    span {
        margin: 5px;
    }
    .container {
        margin: 40px;
        width: 60%;
    }
</style>
