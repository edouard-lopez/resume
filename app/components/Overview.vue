<div class="overview">
    <dl id="qck-name">
        <dt class="h">{{vm.user.username}}</dt>
        <dd><h1 id="name" class="id fn n">
            <span class="given-name">{{ vm.user.first_name }}</span>
            <span class="family-name">{{ vm.user.last_name }}</span>
        </h1>
        </dd>
    </dl>

    <section id="summary" class="headline title">
        <div class="floatFix">
            <ul id="keywords">
                <li>
                    <strong>{{ cv.keywords[1] }}</strong>,
                </li>
                <li><strong>{{ cv.keywords[2] }}</strong>
                    &amp; </li>
                <li>
                    <strong>{{ cv.keywords[3] }}</strong>
                </li>
            </ul>
            <div class="motivation">
                {{ cv.motto }}
            </div>
        </div>
    </section>
</div>

<script>
    export default {
        data () {
            return {
                // initial state
            }
        }
    }
</script>
