<template>
  <article id="resume" class="hresume">
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

      <div id="main">
          <section id="experiences" class="no-margin-top">
              <h2>{{experiences }}<a href="#experiences" class="pilcrow">&para;</a></h2>
              <ol class="vcalendar">
                  <li ng-repeat="items in experiences">
                      {{xp.org.title}}
                  </li>
              </ol>
          </section>
          <section id="projects" class="no-margin-top">
              <h2>{{projects }}<a href="#projects" class="pilcrow">&para;</a></h2>
              <ol class="vcalendar">
                  <li ng-repeat="items in projects">
                      {{xp.org.title}}
                  </li>
              </ol>
          </section>
          <section id="educations" class="no-margin-top">
              <h2>{{educations }}<a href="#educations" class="pilcrow">&para;</a></h2>
              <ol class="vcalendar">
                  <li ng-repeat="items in educations">
                      {{xp.org.title}}
                  </li>
              </ol>
          </section>

          <section id="spare-time" class="no-margin-top">
              <h2>{{spare-time }}<a href="#spare-time" class="pilcrow">&para;</a></h2>
              <ol class="vcalendar">
                  <li ng-repeat="items in spare_time">
                      {{xp.org.title}}
                  </li>
              </ol>
          </section>

          <?php //echo spareTime('Spare_time'); ?>

      </div>

  </article>
</template>

<script>
export default {
  data () {
    return {
      // note: changing this line won't causes changes
      // with hot-reload because the reloaded component
      // preserves its current state and we are modifying
      // its initial state.
      msg: 'Hello World!'
    }
  }
}
</script>
