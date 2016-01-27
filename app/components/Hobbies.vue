<section id="hobbies" class="no-margin-top">
  <h2>{{hobbies }}<a href="#hobbies" class="pilcrow">&para;</a></h2>
  <ol class="vcalendar">
    <li ng-repeat="items in hobbies">
      {{xp.org.title}}
    </li>
  </ol>
</section>

<script>
  export default {
    data () {
      return {
        // initial state
      }
    }
  }
</script>