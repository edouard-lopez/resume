<template>
<h2 class="h">Additional Information</h2>
<footer id="additional-info">
    <div id="additional-info-wrapper">
        <h3 class="h">Personal Information</h3>
        <dl id="personal-info">
            <!--       <dt class="h"><?=_cv("user_age")</dt> -->
            <!--         <dd><?=$age.' '._cv("user_years_old"), </dd> -->
            <dt>_cv("user_nationality")</dt>
            <dd>{{user.nationality}},</dd>
            <dt>_cv("user_transport")</dt>
            <dd>{{user.contact.driving_license}},</dd>
        </dl>

        <h3 class="h">_("Contact Information")</h3>
        <dl id="contact-me">
            <dt>_cv("user_address")</dt>
            <dd class="adr">
                <address>
                    <p class="locality">{{{user.address}}</p>
                </address>
            </dd>
            <dt id="email">_cv("user_email")</dt>
            <dd class="email">{{user.contact.email}}</dd>
            <dt>_cv("user_phone")</dt>
            <!--         <dd class="tel cell">+33.6.10.41.53.65</dd> -->
            <dd class="tel cell">{{user.contact.phone_mobile}}</dd>
            <dt>_cv("Website")</dt>
            <dd><span class="url fn"><a href="{{user.contact.www}}">edouard-lopez.com/</a></span>
            </dd>
        </dl>
        <div id="bottomer" />
    </div>
</footer>

</template>

<script>
  export default {
    props: ['user'],
    data () {
      return {}
    }
  }
</script>

<style>
</style>