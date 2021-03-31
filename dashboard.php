<?php 
include 'assets/db.php';
$_SESSION['online'] = "dash";
if ($_SESSION['check'] == "loggedOut") {
    header("location: index.php");
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

    <title>Projects</title>
    <link rel="shortcut icon"  href="images/invented.png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="css/font-awesome.min.css">
    <link href="css/projectPage.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/DesignModel.css">
    <link rel="stylesheet" type="text/css" href="css/projectThumbnail.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

</head>

<body>
<!-- Navbar goes here -->
<?php include 'assets/navbar.php';?>
<!-- Navbar ends here -->
<div class="container content">
  <div class="col-md-12">
    <div class="jumbotron col-md-10">
    <h1>Welcome aboard!</h1> 
    <p>Hey <?php echo $_SESSION['user'];?>, this is your dashboard where you can manage your projects and account settings.</p> 
  </div>
    <div class="row" id="projects">
    <div class="col-md-12">
<div class="row">
<div class="col-lg-2">
<h3 class="titles">My projects </h3>
</div>
</div>
    <br>
<?php
$sql = mysql_query("SELECT * FROM backed WHERE user='$_SESSION[userkey]' AND response = 1");
while ($dis = mysql_fetch_array($sql)) {
$sql1 = mysql_query("SELECT * FROM project WHERE id='$dis[project]'");
while ($dis1 = mysql_fetch_array($sql1)) {
  $uploadDir = 'images/uploads/project/'.$dis1['title'].'/';
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
                                <div class="overlay">
                                <a href="oneproject.php?no='.$dis1['id'].'">
                                    <h3>'.$dis1['title'].'</h3>
                                    <h4>By: ';
                                    $sql2 =  mysql_query("SELECT * FROM users WHERE id = '$dis1[owner]'");
                                    while ($dis2 = mysql_fetch_array($sql2)) {
                                        echo $dis2['firstname'].' '.$dis2['lastname'];
                                    }
                                    echo'</h4>
                                    <p class="info">'.$dis1['descr'].'</p>
                                </a>
                                </div>
                            </div>

                            
                            <!--<p class="courseCaption">Get a quick rice </p>-->
                        </div>
                    </div>';
}
}
?>
                    <div class="col-sm-12 col-md-3 col-lg-3 '.$dis['skills'].'">
                                <a href="projects.php">
                                <div class="moreProjects">
                                    <strong>All projects</strong>
                                    <p><i class="fa fa-angle-down fa-5x"></i></p>

                                </div>
                                </a>
                    </div>

    </div>
    </div>
  </div>
</div>
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
