<template>
  <article id="resume" class="hresume">
    <tags></tags>
    <overview></overview>
    <experiences></experiences>
    <projects></projects>
    <educations></educations>
    <hobbies></hobbies>
    <whoami></whoami>
    <contact></contact>
  </article>
</template>

<!--suppress JSUnresolvedVariable -->
<script>

  import Tags from './components/Tags'
  import Overview from './components/Overview'
  import Experiences from './components/Experiences'
  import Projects from './components/Projects'
  import Educations from './components/Educations'
  import Hobbies from './components/Hobbies'
  import Whoami from './components/Whoami'
  import Contact from './components/Contact'

  export default {
    data () {
      return {
        resume: {}
      }
    },
    ready: function () {
      this.fetchResume()
    },
    methods: {
      fetchResume: function () {
        this.$http.get('/app/assets/resume.json', function (data) {
          this.resume = data
        })
      }
    },
    components: {
      Tags,
      Overview,
      Experiences,
      Projects,
      Educations,
      Hobbies,
      Whoami,
      Contact
    }
  }
</script>

<style>
  body {
    font-family: Helvetica, sans-serif;
  }
</style>
