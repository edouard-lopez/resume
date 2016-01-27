import Vue from 'vue'
import VueResource from 'vue-resource'
import Resume from './Resume'

Vue.use(VueResource)

/* eslint-disable no-new */
new Vue({
  el: 'body',
  components: {Resume}
})
