<section id="experiences" class="no-margin-top">
  <h2>{{experiences }}<a href="#experiences" class="pilcrow">&para;</a></h2>
  <ol class="vcalendar">
    <li ng-repeat="items in experiences">
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