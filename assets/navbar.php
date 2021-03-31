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
          <a  href="dashboard.php" class="navbar-brand"><img  src="images/logo.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          <?php
            if ($_SESSION['online'] == "dash") {
              echo' <li><a href="createproject.php" class="page-scroll">Create New Project</a></li>
                    <li><a href="projects.php" class="page-scroll">Projects</a></li>
                    <li><a href="dashboard.php" class="page-scroll active">Dashboard</a></li>';
            } elseif ($_SESSION['online'] == "project") {
              echo' <li><a href="createproject.php" class="page-scroll">Create New Project</a></li>
                    <li><a href="projects.php" class="page-scroll active">Projects</a></li>
                    <li><a href="dashboard.php" class="page-scroll">Dashboard</a></li>';
            } elseif ($_SESSION['online'] == "createproject") {
              echo' <li><a href="createproject.php" class="page-scroll active">Create New Project</a></li>
                    <li><a href="projects.php" class="page-scroll">Projects</a></li>
                    <li><a href="dashboard.php" class="page-scroll">Dashboard</a></li>';
            } else {
              echo' <li><a href="createproject.php" class="page-scroll">Create New Project</a></li>
                    <li><a href="projects.php" class="page-scroll">Projects</a></li>
                    <li><a href="dashboard.php" class="page-scroll">Dashboard</a></li>';
            }
          ?>
          <?php
            $uploadDir = 'images/uploads/profile/'.$_SESSION['userkey'].'/';
            if (!file_exists($uploadDir)) {
              $profile = 'images/default/profile/avatar.jpg';
            } else {
              $profile = 'images/uploads/profile/'.$_SESSION['userkey'].'/avatar.jpg';
            }
          ?>
          <!-- <li>
              <a href="notif.php">
                <span class="fa fa-bell-o notif"></span>
                <span class="counter" style="padding-left: 7px;">5</span>
              </a>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </li> -->
            <li>
    <!-- dropdown menu -->
                  <div class="dropdown" id="profileDropdown">
                       <a id="dropdownMenu" data-toggle="dropdown" class="btn dropdown-toggle">
                            <img class="profile img img-circle " id="profilePic" src="<?php echo $profile;?>"> 
                            <h6 id="profileName" class="profile"><?php echo $_SESSION['user'];?></h6>
                            <span class="caret"></span>
                          <ul class="dropdown-menu">
                              <li>
                                <a href="profile.php?prof=<?php echo $_SESSION['userkey'];?>">
                                <span class="fa fa-user">&nbsp; View profile </span></a>
                              </li>
                              <li> 
                                <a href="settings.php?prof=<?php echo $_SESSION['userkey'];?>">
                                <span class="fa fa-cog">&nbsp; Account Settings </span></a>
                              </li>
                              <li>
                                <a href="assets/logout.php">
                                <span class=" fa fa-power-off">&nbsp; Log out</span></a>
                              </li>
                          </ul>
                      </a>
                  </div>   
          </li>
    <!-- notifications  -->
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>