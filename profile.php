<?php 
include 'assets/db.php';
$_SESSION['online'] = "profile";
$me = $_GET['prof'];
$sql = mysql_query("SELECT * FROM users WHERE id='$me'");
while($dis = mysql_fetch_array($sql)){
  $names = $dis['firstname'].' '.$dis['lastname'];
  $gender = $dis['gender'];
  $firstname = $dis['firstname'];
  $dob = $dis['dob'];
  $email = $dis['email'];
  $phone = $dis['contact'];
  $bio = $dis['bio'];
  $web = $dis['web'];
}
$uploadDir = 'images/uploads/profile/'.$me.'/';
if (!file_exists($uploadDir)) {
    $cover = 'images/default/profile/cover.jpg';
    $profile = 'images/default/profile/avatar.jpg';
} else {
    $cover = 'images/uploads/profile/'.$me.'/cover.jpg';
    $profile = 'images/uploads/profile/'.$me.'/avatar.jpg';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $firstname;?></title>
    <link rel="shortcut icon"  href="images/invented.png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="css/font-awesome.min.css">
    <link href="css/projectPage.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/profilePage.css">
    <link rel="stylesheet" type="text/css" href="css/projectThumbnail.css">
    <link rel="stylesheet" type="text/css" href="css/projectPage.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

</head>

<body>
<!-- Navbar goes here -->
<?php 
include 'assets/navbar.php';
// ======================================
?>
<!-- cover container-->
          <div class="container-fluid cover" style="
            background:linear-gradient(rgba(11,22,28,0.5),rgba(11,22,28,0.5)),url('<?php echo $cover;?>');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;

          "><br>
                    <div class="row">
                        <center>
                          <div id="profilePicPage">
                            <img src="<?php echo $profile;?>" class="img-circle profile-image">
                          </div>
                        <h3 class="name"><?php echo $names;?></h3>
                        </center>
                    </div><!-- end of column-->
            <br>

                    <div class="row"> 
                  <?php
                  if ($_SESSION['userkey'] == $me) {
                    echo '<center><a href="settings.php?prof='.$_SESSION['userkey'].'" class="btn-default btn-transparent">Update your profile</a></center><br>';
                  } else {
                    echo '<center><a href="assets/script.php?follow='.$_SESSION['userkey'].'" class="btn-default btn-transparent">Follow</a></center><br>';
                  }
                  ?>
                  </div>
          </div>
<!-- end of cover container-->

<div class="container-fluid"> <!-- personal information -->


                  <div class="row rowTitle">
                    <h3 >&nbsp;Basic information</h3>
                  </div>
                  <div class="row">
                      <div class="container">
                        <table class="table table-striped">
                          <tr><td><h5><b>Names:</b></h5></td><td width='30'></td><td><?php echo $names;?></td></tr>
                          <?php
                            if (!$gender) {
                              echo '';
                            } else {
                              echo "<tr><td><h5><b>Gender:</b></h5></td><td></td><td>$gender</td></tr>";
                            }
                            if (!$dob || $dob == "0000-00-00") {
                              echo '';
                            } else {
                              echo "<tr><td><h5><b>Date of Birth:</b></h5></td><td></td><td>$dob</td></tr>";
                            }
                            if (!$email) {
                              echo '';
                            } else {
                              echo "<tr><td><h5><b>Email:</b></h5></td><td></td><td>$email</td></tr>";
                            }
                            if (!$phone) {
                              echo '';
                            } else {
                              echo "<tr><td><h5><b>Contact:</b></h5></td><td></td><td>$phone</td></tr>";
                            }
                            if (!$bio || $bio == ' ') {
                              echo '';
                            } else {
                              echo "<tr><td><h5><b>Bio:</b></h5></td><td></td><td>$bio</td></tr>";
                            }
                            if (!$web) {
                              echo '';
                            } else {
                              echo "<tr><td><h5><b>Website:</b></h5></td><td></td><td>$web</td></tr>";
                            }
                          ?>
                        </table>
                        </div>
                  </div>

</div> <!-- end of personal informations -->


<div class="container-fluid"> <!-- my projects-->

                  <div class="row rowTitle">
                    <h3 >&nbsp;Browse my projects</h3>
                  </div>
                  <div class="container">
                    <?php
                    $sql = mysql_query("SELECT * FROM backed WHERE user ='$_SESSION[userkey]'");
                    while ($dis = mysql_fetch_array($sql)) {
                    $sql1 = mysql_query("SELECT * FROM project WHERE id='$dis[project]'");
                    while ($dis1 = mysql_fetch_array($sql1)) {
  $uploadDir = 'images/uploads/project/'.$dis1['id'].'/';
                if (!file_exists($uploadDir)) {
                    $profile = 'images/default/project/default.jpg';
                } else {
                    $profile = 'images/uploads/project/'.$dis1['id'].'/avatar.jpg';
                }
                    echo '
                    <div class="col-sm-6 col-md-3 col-lg-3 '.$dis1['skills'].'">
                        <div class="projects-item">

                            <div class="hovereffect">
                                <img class="img-thumbnail" src="'.$profile.'" >
                                <a href="backproject.php?pro='.$dis1['id'].'">
                                <div class="overlay">
                                    <h3>'.$dis1['title'].'</h3>
                                    <h4>By: ';
                                    $sql2 =  mysql_query("SELECT * FROM users WHERE id = '$dis1[owner]'");
                                    while ($dis2 = mysql_fetch_array($sql2)) {
                                        echo $dis2['firstname'].' '.$dis2['lastname'];
                                    }
                                    echo'</h4>
                                    <p class="info">'.$dis1['descr'].'</p>
                                    <i class="fa fa-plus"></i>
                                </div>
                                </a>
                            </div>

                            <div class="progress"><div class="progress-bar"></div></div>
                        </div>
                    </div>';}
                    }
                    ?>
                  </div>



</div><!-- end of project participated in-->



<nav id="footer" class="navbar-bottom">
<?php include 'assets/footer.php';?>
</nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>
