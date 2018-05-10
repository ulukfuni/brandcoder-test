<template>
    <form @submit.prevent="handleSubmit">
        <input type="text" name="number" id="number" v-model="number"/>
        <button type="submit">Submit</button>
    </form>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                number: ''
            }
        },
        methods: {
            //got to send in that certain content-type because
            //application/json would cause the api request to be
            //preflighted causing an OPTIONS request instead of
            //a POST request
            handleSubmit() { console.log(this.number)
                axios.post('http://localhost:8888/api.php', {
                    number: this.number
                }, {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(res => {
                    this.$bus.$emit('gotFib', {data: res.data.data})})
            }
        },
        name: 'Fibonacci'
    }
</script>
<style></style>