<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  $user = 'ed'; // needed for quick-menu

  require_once 'cv.phpc';
  $me = new CV();
  require_once 'abbr.php';

  //   require_once 'user.phpc';
  $me->setFirstName('Édouard');
  $me->setLastName('Lopez');
  $me->setFullName();
  $me->setEmail('cv+me@edouard-lopez.com');
  $fullName = $me->getFullName();
  $me->setUserName('ed');
  $me->setLocaleEnvFromUserName();

  $me->setFacetedSearch( array(
   'cog' => $me->_cv('Cognition, Teaching'),
   'dev'    =>  $me->_cv('Programming'),
   'i18n'   =>  $me->_cv('Languages, Abroad'),
   'ux'      => sprintf('%s, %s',
     sprintf('<abbr title="%s">UX</abbr>',
       $me->_cv('User eXperience')
       ), $me->_cv('Accessibility')
     ),
   'web'   =>  $me->_cv('Web'),
   ));
  $me->displayBodyElement();
