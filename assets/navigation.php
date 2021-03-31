<?php
include 'assets/db.php';
?>
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a  href="index.php" class="navbar-brand"><img  src="images/logo.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          <?php
            if ($_SESSION['online'] == "project") {
              echo' <li><a href="projects.php" class="page-scroll active">Projects</a></li>
                    <li><a href="login.php?who=signin" class="page-scroll">My Account</a></li>';
            } elseif ($_SESSION['online'] == "login") {
              echo' <li><a href="projects.php" class="page-scroll">Projects</a></li>
                    <li><a href="login.php?who=signin" class="page-scroll active">My Account</a></li>';
            } else {
              echo' <li><a href="projects.php" class="page-scroll">Projects</a></li>
                    <li><a href="login.php?who=signin" class="page-scroll">My Account</a></li>';
            }
          ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>