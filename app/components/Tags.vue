<template>
  <aside class="tags">
    <h5>Tags</h5>
      <ol>
        <li v-for="tag in tags">{{tag.tag}} ({{tag.description}})</li>
      </ol>
  </aside>
</template>

<script>
  export default {
    props: ['tags'],
    data () {
      return {
      }
    }
  }
</script>
