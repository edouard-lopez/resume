<template>
  <h3 class="h">{{ _("Personal Information") }} </h3>
  <dl id="personal-info">
    <!--       <dt class="h"><?=_cv("user_age") }} </dt> -->
    <!--         <dd><?=$age.' '._cv("user_years_old") }} , </dd> -->
    <dt>{{ _cv("user_nationality") }}</dt>
    <dd>{{ _cv("user_french") }}</dd>
    <dt>{{ _cv("user_transport") }}</dt>
    <dd>{{ _cv("user_driving_license") }}</dd>
    <dt>{{ _cv("sex") }}</dt>
    <dd>{{ _cv("Male") }}</dd>
    <dt>{{ _cv("status") }}</dt>
    <dd>{{ _cv("Single") }}</dd>
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