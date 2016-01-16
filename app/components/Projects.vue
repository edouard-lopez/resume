<section id="projects" class="no-margin-top">
    <h2>{{projects }}<a href="#projects" class="pilcrow">&para;</a></h2>
    <ol class="vcalendar">
        <li ng-repeat="items in projects">
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