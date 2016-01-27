<section id="educations" class="no-margin-top">
  <h2>{{educations }}<a href="#educations" class="pilcrow">&para;</a></h2>
  <ol class="vcalendar">
    <li ng-repeat="items in educations">
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