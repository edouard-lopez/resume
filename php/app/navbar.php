<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <!-- <a class="navbar-brand" href="#">Brand</a> -->

            <div class="dropdown">
            <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown">
               <span class="glyphicon glyphicon-home"></span>
               <b class="caret"></b>
           </a>
           <ul class="dropdown-menu">
            <li><a href="/cv">CV</a></li>
            <li><a href="/portfolio">portfolio</a></li>
            <li><a href="/fac">fac</a></li>
            <li class="divider"></li>
            <li class="nav-header">Nav header</li>
            <li><a href="/labo">labo</a></li>
            <li><a href="/wiki">wiki</a></li>
        </ul>
    </div>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-left">
      <li><a href="/">Édouard Lopez</a></li>
      <li class="active"><a href="#">CV</a></li>
    </ul>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="navbar-form navbar-right">
    <div class="input-group">
          <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><?= _('Search') ?></button>
          </span>
    </div><!-- /input-group -->
  </div><!-- /.navbar-collapse -->
</nav>
