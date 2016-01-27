<template>
  <h3 class="h">{{ ontact Information" }}</h3>
  <dl id="contact-me">
    <dt>{{ "user_address" }}</dt>
    <dd class="adr">
      <address>
        <p class="locality"> Aquitaine, France </p>
      </address>
    </dd>
    <dt id="email">{{ "user_email" }}</dt>
    <dd class="email">cv+me@edouard-lopez.com</dd>
    <dt>{{ "user_phone" }}</dt>
    <dd class="tel cell">+33.(0)7.60.06.97.30</dd>
    <dt>{{ "Website" }}</dt>
    <dd><span class="url fn"><a href="http://edouard-lopez.com/">edouard-lopez.com/</a></span>
    </dd>
  </dl>
</template>

<script>
  export default {
    data () {
      return {
        // initial state
      }
    }
  }
</script>

<style>
</style>