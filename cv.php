<?php
  require_once 'abbr.php';
  require_once 'skills.phpc';

  $en =  sprintf("<img src='./_files/images/en.png' alt='%s' />", _('English'));
  $fr =  sprintf("<img src='./_files/images/fr.png' alt='%s' />", _('French'));
  $age = date("Y-m")-date("Y-m", mktime(0, 0, 0, 7, 11, 1985));
  $tb = new toolbox();
//   function _cv($str) { return dgettext('cv', $str); }
  function _dd($str, $class = false, $start = false, $end = false)
  {
    $item = new dd($str);
    if ($class)
    {
      $item->setClass($class);
    }
    if ($start)
      { $item->addChild($start); }
    if ($end)
      { $item->addChild($end); }

    return $item;
  }


//   ini_set('error_reporting', E_ALL);
?>

<article id="resume" class="hresume">
<div class="overview">
    <dl id="qck-name">
      <dt class="h"><?php echo _cv("user-name"); ?></dt>
        <dd><h1 id="name" class="id fn n">
          <span class="given-name"><?php echo $GLOBALS['me']->getFirstName(); ?></span>
<!--           <br/> -->
          <span class="family-name"><?php echo $GLOBALS['me']->getLastName(); ?></span>
          </h1>
        </dd>
    </dl>

  <section id="summary" class="headline title">
  <div class="floatFix">
      <ul id="keywords">
        <li><strong><?php echo _cv("cv_keyword_1"); ?></strong>,</li>
        <li><strong><?php echo _cv("cv_keyword_2"); ?></strong> &amp; </li>
        <li><strong><?php echo _cv("cv_keyword_3") ?></strong></li>
      </ul>
    <div class="motivation">
      <p><?php echo NOW; ?>.</p>
    </div>
  </div>
  </section>
</div>

  <div id="main">
    <section  id="experiences" class="no-margin-top">
    <h2><?php echo _cv("cv.header.experiences"); ?><a href="#experiences" class="pilcrow">&para;</a></h2>
      <ol class="vcalendar">
        <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences', // REQUIRED !! different sections have different styles
            'org' => array(
              'title' => sprintf(_cv("cv.xp.title00%s"), ''), // role title = key idea/concept to remember
              'org-summary' => sprintf(_cv("cv.org.self-employed%s"), ''), // company name
              'location' => sprintf(_cv("cv.org.place%s"), 'Aquitaine, France') // company location
              ),
            'description' => sprintf(_cv("cv.xp.desc00%s"), SEO), // role description = longer description
            'period' => array(// allow to compute approximative job duration: week(s) XOR month(s) XOR year(s)
              'start' => '2011-01-24', // job start
              'end' => date('Y-m-d'), // ... end
            ),
            'dfn' => 'web-consultant-freelance', // optional: allow reference with an hyperlink <a href='#<dfn-value>'>foo</a>
            'categories' => array('dev', 'ux', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences', // REQUIRED !! different sections have different styles
            'org' => array(
              'title' => sprintf(_cv("cv.xp.title01%s"), IT), // role title = key idea/concept to remember
              'org-summary' => sprintf(_cv("cv.org.name%s"), JSTARGLOBAL), // company name
              'location' => sprintf(_cv("cv.org.place%s"), TAIZHONG) // company location
              ),
            'description' => _cv("cv.xp.desc01"), // role description = longer description
            'period' => array(// allow to compute approximative job duration: week(s) XOR month(s) XOR year(s)
              'start' => '2010-04-01', // job start
              'end' => '2010-08-07', // ... end
            ),
            'dfn' => 'internship-taiwan', // optional: allow reference with an hyperlink <a href='#<dfn-value>'>foo</a>
            'categories' => array('web', 'i18n'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences',
            'org' => array(
              'title' => sprintf("%s", _cv("cv.xp.title02")),
              'org-summary' => sprintf(_cv("cv.org.freelance")),
              'location' => sprintf(_cv("cv.org.place%s"), TAIZHONG)
              ),
            'description' => sprintf(_cv("cv.xp.desc02")),
            'period' => array(
              'start' => '2010-07-15',
              'end' => '2010-08-15',
            ),
            'categories' => array('i18n'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences',
            'org' => array(
              'title' => sprintf("%s", _cv("cv.xp.title03")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), NCHU),
              'location' => sprintf(_cv("cv.org.place%s"), TAIZHONG)
              ),
            'description' => sprintf(_cv("cv.xp.desc03")),
            'period' => array(
              'start' => '2010-06-01',
              'end' => '2010-07-10',
            ),
            'categories' => array('cog', 'i18n'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences',
            'org' => array(
              'title' => sprintf("%s", _cv("cv.xp.title04")),
              'org-summary' => sprintf(_cv("cv.org.team%s"), AMA),
              'location' => sprintf(_cv("cv.org.place%s"), GRENOBLE)
              ),
            'description' => sprintf(_cv("cv.xp.desc04")),
            'period' => array(
              'start' => '2009-05-01',
              'end' => '2009-07-01',
            ),
            'categories' => array('cog', 'dev', 'ux', 'web'),
          ));
        ?>
                <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences',
            'org' => array(
              'title' => sprintf(_cv("cv.xp.title05")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), uBDX2),
              'location' => sprintf(_cv("cv.org.place%s"), BDX)
              ),
            'description' => sprintf(_cv("cv.xp.desc05%s"), DBMS),
            'period' => array(
              'start' => '2008-02-01',
              'end' => '2008-05-01',
            ),
            'categories' => array('cog', 'dev'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences',
            'org' => array(
              'title' => sprintf("%s", _cv("cv.xp.title06")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), '<a href="http://www.i2c.fr/">i2C</a>'),
              'location' => sprintf(_cv("cv.org.place%s"), _("France"))
              ),
            'description' => sprintf(_cv("cv.xp.desc06")),
            'period' => array(
              'start' => '2007-08-01',
              'end' => '2007-09-01',
            ),
            'categories' => array('ux'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'experiences',
            'org' => array(
              'title' => sprintf(_cv("cv.xp.title07")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), ZHENGZHOU),
              'location' => sprintf(_cv("cv.org.place%s"), _cv("China"))
              ),
            'description' => sprintf(_cv("cv.xp.desc07")),
            'period' => array(
              'start' => '2006-07-01',
              'end' => '2006-08-15',
            ),
            'dfn' => 'summer-job-zhengzhou', // optional: allow reference with an hyperlink <a href='#<dfn-value>'>foo</a>
            'categories' => array('cog', 'i18n'),
          ));
        ?>
      </ol>
    </section>

    <section id="education">
    <h2><?php echo _cv("cv.header.education"); ?><a href="#education" class="pilcrow">&para;</a></h2>
      <ol class="vcalendar">
        <?php
         $this->detailsListItem(
          array(
            'section' => 'education',
            'org' => array(
              'title' => sprintf(_cv("cv.edu.title01%s%s"), MASTER_ICPS, ICPS),
              'org-summary' => sprintf(_cv("cv.org.name.at%s"), xUPMF),
              'location' => sprintf(_cv("cv.org.place%s"), GRENOBLE)
              ),
            'description' => null,
            'period' => array(
              'start' => '2008-09-22',
              'end' => '2010-09-22',
            ),
            'categories' => array('cog', 'dev', 'i18n', 'ux', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'education',
            'org' => array(
              'title' => sprintf(_cv("cv.edu.title02%s%s"), LICENCE_SCICO, SCICO),
              'org-summary' => sprintf(_cv("cv.org.name.at%s"), xBDX2),
              'location' => sprintf(_cv("cv.org.place%s"), BDX)
              ),
            'description' => null,
            'period' => array(
              'start' => '2005-09-15',
              'end' => '2008-07-01',
            ),
            'categories' => array('cog', 'dev', 'i18n', 'ux', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'education',
            'org' => array(
              'title' => sprintf(_cv("cv.edu.title03%s"), BAC_S),
              'org-summary' => sprintf(_cv("cv.org.name.ats%s"), TYR),
              'location' => sprintf(_cv("cv.org.place%s"), _("France"))
              ),
            'description' => null,
            'period' => array(
              'start' => '2004-07-10',
              'end' => '2005-07-14',
            ),
            'categories' => array('cog'),
          ));
        ?>
      </ol>
    </section>
<span class="page-break"></span>
    <section id="projects" class="page">
    <h2><?php echo _cv("cv.header.projects"); ?><a href="#projects" class="pilcrow">&para;</a>
      <span class='tip left b-05e b-s-5p'><?php echo sprintf(_cv("detailled_portfolio%s"), "<a href='/portfolio'>portfolio</a>");?></span>
    </h2>
      <ol class="vcalendar">
        <?php
          $this->detailsListItem(
            array(
              'section' => 'project',
              'org' => array(
                'title' => sprintf(_cv("cv.proj.title01")),
                'org-summary' => sprintf(_cv("cv.org.freelance")),
                'location' => null
                ),
              'description' => sprintf(_cv("cv.proj.desc01%s%s"), uCFDICT, CC_BY_NC_SA),
              'period' => array(
                'start' => '2010-07-01',
                'end' => date('Y-m-d')
              ),
            'categories' => array('cog', 'dev', 'i18n', 'web'),
            ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title02%s"), GWT),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc02%s%s%s%s%s%s%s"), "<a href='http://code.google.com/p/animaths/'>AniMaths</a>", X_HTML, JAVA, JS, MATHML, etc, "http://applicationanimaths.appspot.com/"),
            'period' => array(
              'start' => '2009-12-01',
              'end' => '2010-02-01',
            ),
            'categories' => array('cog', 'dev', 'ux', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title03")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc03%s%s"), "<a href='/portfolio/2010-flashbook/'>FlashBook</a>", XML),
            'period' => array(
              'start' => '2009-12-01',
              'end' => '2010-02-01',
            ),
            'categories' => array('dev', 'ux'),
          ));
        ?>

        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title04")),
              'org-summary' => sprintf(_cv("cv.org.team%s"), AMA),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc04%s%s%s%s"), '<a href="/portfolio/2009-TER-ProjetEYE-LSA/">', '</a>', Perl, "http://webu2.upmf-grenoble.fr/LPNC/resources/benoit_lemaire/cogsci09a.pdf"
            ),
            'period' => array(
              'start' => '2009-05-01',
              'end' => '2009-07-01',
            ),
            'categories' => array('cog', 'dev', 'ux', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title05%s"), URL),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc05%s%s%s%s%s%s"), "<a href='/portfolio/2009-mastermind/'>", '</a>',
              $this->relTag('i18n', i18n),
              PHP,
              $this->relTag("gettext"),
              $this->relTag(sprintf(_cv("%s rewriting"), 'URL'), sprintf(_cv("%s rewriting"), URL))),
            'period' => array(
              'start' => '2009-03-01',
              'end' => '2009-04-01',
            ),
            'categories' => array('dev', 'i18n', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title06")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc06%s%s%s%s"), '<a href="/portfolio/2009-Interface-Utilisateur-ERIM-3.0/">', XUL, '</a>', ERIM),
            'period' => array(
              'start' => '2009-03-01',
              'end' => '2009-04-01',
            ),
            'categories' => array('dev', 'ux'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title07")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc07%s%s%s"), '<a href="/portfolio/2009-Carville/">', '</a>', UML),
            'period' => array(
              'start' => '2009-02-01',
              'end' => '2009-03-10',
            ),
            'categories' => array('dev'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title08%s"), UX),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc08%s%s%s%s"), "<a href='/portfolio/2009-Google-docs-criteres-Bastien-Scapin/'>", GDOCS, '</a>', HCI),
//
//             %s, using Bastien-Scapin criteria, for the %s class
            'period' => array(
              'start' => '2009-02-01',
              'end' => '2009-03-10',
            ),
            'categories' => array('ux', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title09%s"), PPT),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc09%s%s"), "<a href='/portfolio/2009-Visual-Impairment-And-Web-Accessibility/'>", '</a>'),
            'period' => array(
              'start' => '2009-02-01',
              'end' => '2009-03-10',
            ),
            'categories' => array('cog', 'ux', 'web'),
            ));
        ?>

        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title10%s"), PPT),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc10%s%s"), "<a href='/portfolio/2008-Wikipedia-As-A-Complex-System/'>", '</a>'),
            'period' => array(
              'start' => '2008-11-30',
              'end' => '2008-12-31',
            ),
            'categories' => array('cog', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title11%s"), Astar),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc11%s%s"), sprintf("<a href='/portfolio/2008-Fifteen-Puzzle/'>%s</a>", _cv("15-puzzle")), xIA),
            'period' => array(
              'start' => '2008-11-30',
              'end' => '2008-12-31',
            ),
            'categories' => array('cog', 'dev'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title12%s"), ENSC),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc12%s"),
            sprintf(_cv("%sMulti-criteria search engine%s for students' projects database"), "<a href='/portfolio/2008-projet_ue116/'>", '</a>')),
            'period' => array(
              'start' => '2008-11-01',
              'end' => '2008-12-10',
            ),
            'categories' => array('dev', 'ux', 'web'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',

            'org' => array(
              'title' => sprintf(_cv("cv.proj.title13%s"), _cv("Ant Colony Optimization")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), UPMF),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc13%s%s%s"), sprintf("<a href='/portfolio/2008-smANTS/'>%s</a>", _cv("Traveling Salesman Problem")), ACO, PHP
            ),
            'period' => array(
              'start' => '2008-11-01',
              'end' => '2008-12-10',
            ),
            'categories' => array('cog', 'dev'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title14")),
              'org-summary' => sprintf(_cv("cv.org.name%s"), BDX2),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc14%s%s%s%s"), "<a href='/portfolio/2008-ter_scico/'>", '</a>',  'Python', SCILAB ),
//             Study and application development with Python and Scilab.
            'period' => array(
              'start' => '2008-07-01',
              'end' => '2008-03-01',
            ),
            'categories' => array('cog', 'dev', 'web'),
          ));
        ?>

        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title15%s"), CPP),
              'org-summary' => sprintf(_cv("cv.org.name%s"), BDX2),
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc15%s%s%s%s"), "<a href='/portfolio/2007-othello/'>", '</a>', C, CPP ),
            'period' => array(
              'start' => '2007-02-01',
              'end' => '2007-03-10',
            ),
            'categories' => array('dev'),
          ));
        ?>
        <?php
         $this->detailsListItem(
          array(
            'section' => 'project',
            'org' => array(
              'title' => sprintf(_cv("cv.proj.title16")),
              'org-summary' => null,
              'location' => null
              ),
            'description' => sprintf(_cv("cv.proj.desc16%s"), sprintf("<a href='/portfolio/2007-superlight/'>%s</a>", "Superlight")
            ),
            'period' => array(
              'start' => '2007-05-01',
              'end' => '2007-06-01',
            ),
            'categories' => array('dev', 'ux'),
          ));
        ?>
      </ol>
    </section>

    <?php //echo spareTime('Spare_time'); ?>

  </div>

  <section id="aside">
    <section id="skills" class='section flt-right no-margin-top'>
    <h2><?php echo _cv("Skills"); ?><a href="#skills" class="pilcrow">&para;</a></h2>
    <?php
      $scico = new dl();
      $scico->setId('scico');
      $scico->setSortDefinition(true);
      print $scico->buildOutput(
        array(
          new dt(_cv("Cognitive Sciences")),
          array(
            new skill( _cv("cognitive psychology"), array('cog', 'ux', 'web'), array( array('2005', '2010'), array('2010', '2012') ), 2 ),
            new skill( _cv("neurosciences"), array('cog', ), array('2005', '2009'), 3 ),
            new skill( HCI, array('cog', 'ux', 'web'), array('2005', $tb->now('Y')), -1 ),
            new skill( IA, array('cog', 'dev', 'ux', 'web'), array('2005', '2009'), -1 ),
            new skill( ACP, array('cog', 'ux', 'web'), array('2006', '2008'), -1 ),
            new skill( _cv("Statistics"), array('cog', 'ux', 'web'), array('2005', '2009') )
        ),
          new dt(_cv("Programming")),
          array(
            new skill( PHP, array('dev', 'i18n', 'web', 'ux'), array('2001', $tb->now('Y')), -1 ),
            new skill( JAVA_EE, array('dev'), array('2009', $tb->now('Y-m')), -1 ),
            new skill( "Android", array('cog', 'dev', 'ux'), array('2009', $tb->now('Y-m')), -1 ),
            new skill( "JavaScript", array('dev', 'web', 'ux'), array('1999', $tb->now('Y-m')), -1 ),
            new skill( "jQuery", array('dev', 'web', 'ux'), array('2009', $tb->now('Y-m')), -1 ),
            new skill( "Python", array('cog', 'dev'), array('2001', $tb->now('Y-m')), -1 ),
            new skill( "ActionScript", array('dev'), array('1900', '1901'), -1 ),
            new skill( "AWK", array('dev'), array('1900', '1901'), -1 ),
            new skill( "Bash", array('dev'), array('1900', '1901'), -1 ),
            new skill( "C", array('dev'), array('1900', '1901'), -1 ),
            new skill( "Delphi", array('dev'), array('1900', '1901'), -1 ),
            new skill( "Perl", array('cog', 'dev', 'ux'), array('1900', '1901'), -1 )
          ),
          new dt(_cv("Modelling")),
            array(
              new skill( UML, array('dev'), array('1900', '1901'), -1 ),
              new skill( ERM, array('dev', 'web'), array('1900', '1901'), -1 )
          ),
          new dt(_cv("Web Standards")),
            array(
              new skill( X_HTML.'<span class="v"> 1.0 strict</span>', array('dev', 'web'), array('1900', '1901'), -1 ),
              new skill( AJAX, array('dev', 'web', 'ux'), array('1900', '1901'), -1 ),
              new skill( CSS.'<span class="v"> 2.1</span>', array('dev', 'web', 'ux'), array('1900', '1901'), -1 ),
              new skill( XML, array('dev', 'web'), array('1900', '1901'), -1 ),
              new skill( XSL_T, array('dev', 'web'), array('1900', '1901'), -1 ),
              new skill( WCAG.'<span class="v"> (1.0 &amp; Samurai errata)</span>', array('dev', 'web', 'ux'), array('1900', '1901'), -1 ),
              new skill( SVG, array('dev', 'web'), array('1900', '1901'), -1 ),
              new skill( XUL, array('dev', 'web', 'ux'), array('1900', '1901'), -1 )
            ),
          new dt(_cv("Database")),
            array(
              new skill( SQL, array('dev', 'web'), array('1900', '1901'), -1 ),
              new skill( "MySQL", array('dev', 'web'), array('1900', '1901'), -1 ),
              new skill( "phpMyAdmin", array('dev', 'web'), array('1900', '1901'), -1 ),
              new skill( "Access", array('dev', 'web'), array('1900', '1901'), -1 )
            ),
          new dt(_cv("Server")),
            array(
              new skill( "Apache", array('i18n', 'web'), array('1900', '1901'), -1 ),
              new skill( SFTP, array('web'), array('1900', '1901'), -1 )
            ),
          new dt(_cv(OS)),
            array(
              new skill( sprintf("Linux"), array('dev'), array('1900', '1901'), -1 ),
              new skill( sprintf("Windows"), array('dev'), array('1900', '1901'), -1 ),
              new skill( "VirtualBox", array('dev'), array('1900', '1901'), -1 )
            ),
          new dt(_cv("Mathematics")),
            array(
              new skill( "Scilab", array('cog', 'dev'), array('1900', '1901'), -1 ),
              new skill( "Maple", array('cog', 'dev'), array('1900', '1901'), -1 ),
              new skill( "Matlab", array('cog', 'dev'), array('1900', '1901'), -1 ),
              new skill( "R", array('cog', 'dev'), array('1900', '1901'), -1 )
            ),
          new dt(_cv("Design")),
            array(
              new skill( "The Gimp", array('gfx'), array('1900', '1901'), -1 ),
              new skill( "Inkscape", array('gfx'), array('1900', '1901'), -1 ),
              new skill( "Photoshop", array('gfx'), array('1900', '1901'), -1 ),
            ),
          new dt(_cv("Office")),
            array(
              new skill( "LaTeX", array('off'), array('1900', '1901'), -1 ),
              new skill( "OpenOffice", array('off'), array('1900', '1901'), -1 ),
              new skill( "Microsoft Office", array('off'), array('1900', '1901'), -1 ),
              new skill( C2I, array('off'), array('1900', '1901'), -1 ),
            )
          )
        );
    ?>
    </section>
<!-- <span class="page-break"></span> -->

    <section id="Languages" class='i18n'>
    <h2><?php echo _cv("Languages"); ?><a href="#Languages" class="pilcrow">&para;</a></h2>
    <?php
      $languages = new dl();
      print $languages->buildOutput(
        array(
          new dt(_cv("French")),
          array(
            _dd(_cv("Mother tongue")),
          ),
          new dt(_cv("English")),
          array(
            _dd(_cv("fluent")),
            _dd(TOEIC_2010.': <strong>965</strong> (2010)'),
          ),
          new dt(_cv("Spanish")),
          array(
            _dd(_cv("Limited proficiency")),
          ),
          new dt(_cv("Chinese")),
          array(
            _dd(_cv("Elementary")),
            _dd(sprintf('<a class="dfn" href="#summer-job-zhengzhou">%s</a>', _cv("Summer job in China"))),
            _dd(sprintf('<a class="dfn" href="#internship-taiwan">%s</a>', _cv("Internship in Taiwan"))),
          ),
          new dt(_cv("Japanese")),
          array(
            _dd(_cv("Elementary")),
          ),
        )
      );
    ?>
    </section>

    <?php echo spareTime('Spare-time'); ?>
  </section>
</article>


<?php
function spareTime($id) {
?>
  <section id='<?php echo $id;?>' class='section flt-right'>
  <h2><?php echo _cv("Spare Time"); ?><a href="#<?php echo $id;?>" class="pilcrow">&para;</a></h2>
  <?php
      $sport = new dl();
      print $sport->buildOutput(
        array(
          new dt(_cv("Sports")),
          array(
            _dd(_cv("Underwater diving")),
            _dd(_cv("Biking")),
            _dd(_cv("Waveboard")),
            _dd(_cv("Snowboard")),
          ),
        )
      );

      $travel = new dl();
      print $travel->buildOutput(
        array(
          new dt(_cv("Travels")),
          array(
            _dd(sprintf("%s (%s)", _cv("Taiwan"), _cv("'11"))),
            _dd(sprintf("%s (%s)", _cv("Vietnam"), _cv("'11"))),
            _dd(sprintf("%s (%s)", _cv("Taiwan"), _cv("'10"))),
            _dd(sprintf("%s (%s)", _cv("Japan"), _cv("'10"))),
            _dd(sprintf("%s (%s)", _cv("Spain"), _cv("'08"))),
            _dd(sprintf("%s (%s)", _cv("China"), _cv("'06"))),
            _dd(sprintf("%s (%s)", _cv("Taiwan"), _cv("'04"))),
          ),
        )
      );

      $readings = new dl();
      print $readings->buildOutput(
        array(
        new dt(_cv("Readings")),
          array(
            _dd(_cv("Sciences' news")),
            _dd(_cv("World's' news")),
            _dd(_cv("Comic books")),
            _dd(_cv("History and Civilization of Japan")),
          ),
        )
      );

      $misc = new dl();
      print $misc->buildOutput(
        array(
          new dt(_cv("Miscellaneous")),
          array(
            _dd(_cv("Cinema")),
            _dd(_cv("Photography")),
          ),
        )
      );
    ?>
  </section>
<?php
} ?>

<h2 class="h"><?php echo _("Additional Information");?> </h2>
<section id="additional-info">
  <h3 class="h"><?php echo _("Contact Information");?> </h3>
  <dl id="contact-me">
    <dt><?php echo _cv("user_address"); ?></dt>
      <dd class="adr">
        <address>
            <p class="locality"> Aquitaine, France </p>
        </address>
      </dd>
    <dt id="email"><?php echo _cv("user_email"); ?></dt>
      <dd class="email">cv+me@edouard-lopez.com</dd>
    <dt><?php echo _cv("user_phone"); ?></dt>
  <!--         <dd class="tel cell">+33.6.10.41.53.65</dd> -->
      <dd class="tel cell">+33.(0)7.60.06.97.30</dd>
    <dt><?php echo _cv("Website"); ?></dt>
      <dd><span class="url fn"><a href="http://edouard-lopez.com/">edouard-lopez.com/</a></span></dd>
  </dl>

<h3 class="h"><?php echo _("Personal Information");?> </h3>
<dl id="personal-info">
<!--       <dt class="h"><?php echo _cv("user_age"); ?></dt> -->
<!--         <dd><?php echo $age.' '._cv("user_years_old"); ?>, </dd> -->
      <dt><?php echo _cv("user_nationality"); ?></dt>
        <dd><?php echo _cv("user_french"); ?>,</dd>
      <dt><?php echo _cv("user_transport"); ?></dt>
        <dd><?php echo _cv("user_driving_license"); ?>, </dd>
      <dt><?php echo _cv("Sex"); ?></dt>
        <dd><?php echo _cv("Male"); // SEX_MALE ?>. </dd>
      <dt><?php echo _cv("Status"); ?></dt>
        <dd><?php echo _cv("Single"); ?>. </dd>
    </dl>
</section>

<aside id='legend'>
<h3><?php echo _("Skills' Legend");?></h3>
  <dl>
    <dt><?php echo _("Academic skills");?> </dt>
      <dd><?php echo sprintf(_cv("use a scale from 1 to 3, respectively representing %s"), sprintf("%s, %s and %s degrees' levels.", _cv('Bachelor'), _cv('Master'), PhD));?></dd>
    <dt><?php echo _("Programming skills");?> </dt>
      <dd><?php echo sprintf(_cv("use a scale from 1 to 3, respectively representing %s"), sprintf("%s, %s and %s degrees' levels.", _cv('Bachelor'), _cv('Master'), PhD));?></dd>
  </dl>
</aside>