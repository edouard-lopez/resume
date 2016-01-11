<template>
  <div id="app">
    <img class="logo" src="./assets/logo.png">
    <hello></hello>
    <resume></resume>
  </div>
</template>

<script>
import Hello from './components/Hello'
import Resume from './components/Resume'

export default {
  components: {
    Hello,
    Resume
  }
}
</script>

<style>
body {
  font-family: Helvetica, sans-serif;
}
</style>
