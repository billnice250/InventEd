<?php 
include 'assets/db.php';
$_SESSION['online'] = "project";
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
    <link rel="stylesheet" type="text/css"  href="css/projectPage.css">
    <link rel="stylesheet" type="text/css" href="css/projectThumbnail.css">
    <script type="text/javascript" src="js/modernizr.custom.js"></script>

</head>

<body>
<!-- Navbar goes here -->
<?php
if ($_SESSION['check'] == "loggedIn") {
  include'assets/navbar.php';
} else {
  include'assets/navigation.php';
}
?>
<?php include 'assets/search.php';?>

<!-- Projects Section
==========================================-->
    <div id="tf-works">
        <div class="container"> <!-- Container -->
            <div class="section-title text-center center">
                <h2>Take a look at <strong>Our Projects</strong></h2>

            </div>
            <br>
            <!-- <div class="categories">
                <ul class="cat">
                    <li class="pull-right">
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".html">HTML</a></li>
                            <li><a href="#" data-filter=".css">CSS</a></li>
                            <li><a href="#" data-filter=".js" >JS</a></li>
                            <li><a href="#" data-filter=".php" >PHP</a></li>
                            <li><a href="#" data-filter=".python" >Python</a></li>
                            <li><a href="#" data-filter=".android" >Android</a></li>
                            <li><a href="#" data-filter=".ios" >IOS</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div> -->

            <div id="lightbox" class="row">
                <?php
                $sql = mysql_query("SELECT * FROM project");
                while ($dis = mysql_fetch_array($sql)) {
                $uploadDir = 'images/uploads/project/'.$dis['id'].'/';
                if (!file_exists($uploadDir)) {
                    $profile = 'images/default/project/default.jpg';
                } else {
                    $profile = 'images/uploads/project/'.$dis['id'].'/avatar.jpg';
                }
                    echo '
                    <div class="col-sm-6 col-md-3 col-lg-3 '.$dis['skills'].'">
                        <div class="projects-item">

                            <div class="hovereffect">
                                <img class="img-thumbnail" src="'.$profile.'" >
                                <div class="overlay">
                                <a href="oneproject.php?no='.$dis['id'].'">
                                    <h3>'.$dis['title'].'</h3>
                                    <h4>By: ';
                                    $sql1 =  mysql_query("SELECT * FROM users WHERE id = '$dis[owner]' LIMIT 4");
                                    while ($dis1 = mysql_fetch_array($sql1)) {
                                        echo $dis1['firstname'].' '.$dis1['lastname'];
                                    }
                                    echo'</h4>
                                    <p class="info">'.$dis['descr'].'</p>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>';
                                }
                                ?>
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
