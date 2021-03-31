<?php
include 'assets/db.php';
$_SESSION['online'] = "project";
if ($_GET['no']) {
    $con = $_GET['no'];
} else {
  echo "Error!";
}
$sql = mysql_query("SELECT * FROM project WHERE id='$con'");
while ($dis = mysql_fetch_array($sql)) {
  $id = $dis['id'];
  $title = $dis['title'];
  $owner = $dis['owner'];
  $back = $dis['backers'];
  $location = $dis['location'];
  $duration = $dis['duration'];
  $descr = $dis['descr'];
  $background = $dis['back'];
  $goals = $dis['goal'];
  $skills = $dis['skills'];
}
$skill = explode(',', $skills);
$skills = ' ';
foreach ($skill as $key) {
  $skills = $key.' '.$skills;
}
if ($_SESSION['check'] == "loggedIn") {
  $userkey = $_SESSION['userkey'];
  $sql1 = mysql_query("SELECT * FROM backed WHERE project='$con' AND user='$userkey'");
  $rows = mysql_num_rows($sql1);
  if (!$rows == 0) {
    while ($dis1 = mysql_fetch_array($sql1)) {
      $_SESSION['response'] = $dis1['response'];
    } 
  } else {
    $_SESSION['response'] = 2;
  }
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
<?php
if ($_SESSION['check'] == "loggedIn") {
  include'assets/navbar.php';
} else {
  include'assets/navigation.php';
}
?>
<?php include 'assets/search.php';?>
 <!-- body -->

 <div class="container fluid" id="body1">
 <div class="row" id="searchRow">
 <div class="col-lg-12 col-md-12 col-sm-12 ">
 <h1><?php echo $title;?></h1>
 <h4>By: <?php
  $sql = mysql_query("SELECT * FROM users WHERE id='$owner'");
  while ($dis = mysql_fetch_array($sql)) {
    echo $dis['firstname'].' '.$dis['lastname'];
  }
  $uploadDir = 'images/uploads/project/'.$id.'/';
  if (!file_exists($uploadDir)) {
    $profile = 'images/default/project/default.jpg';
  } else {
    $profile = 'images/uploads/project/'.$id.'/avatar.jpg';
  }
?></h4>
 <br>

 </div>
 </div>

 <!--- end of first row  -->


  <div class="row" id="videoHolder" >
 <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
 <div class="embed-responsive embed-responsive-16by9" id="video">
    <!-- <iframe class="embed-responsive-item" src="videos/Why.mp4"></iframe> -->
    <img src="<?php echo $profile;?>" class="embed-responsive-item"/>
</div>
 </div>
  <br>
  <br>
 <div class="col-lg-3 col-md-3 col-sm-5 col-xs-6" id="descriptionBox">
 <h2> <?php echo $back;?> Backers </h2>
 <br>
 <h2><?php echo $duration;?> Days</h2>
 <br>
 <h5><b>Tags:</b><p> <?php echo $skills;?></p></h5>
 <h3 style="display:block; font-size:1.5em;" class="fa fa-map-marker">&nbsp;<?php echo $location;?></h3>
 <br> 
 <?php
if ($_SESSION['check'] == "loggedIn") {
    if ($_SESSION['response'] == 1) {
      echo '
        <a href="backproject.php?pro='.$id.'" class="btn btn-opaque" id="joinProject"> Return to conversations</a>
      ';
    } elseif ($_SESSION['response'] == 0) {
      echo '
        <a href="#" class="btn btn-opaque" id="joinProject"> Waiting response</a>
      ';
    } else {
      echo '
      <form action="assets/script.php" method="POST">
        <input type="hidden" name="project" value="'.$id.'">
        <input type="hidden" name="user" value="'.$_SESSION['userkey'].'">
        <button type="submit" name="joinProject" class="btn btn-opaque" id="joinProject"> Back project</button>
      </form>
      '; 
    }
} else {
echo '
  <a href="login.php?who=signin&no='.$id.'" class="btn btn-opaque" id="joinProject"> Back project</a>
';
  }
 ?>
 <br>
</div>
 </div>

 <!-- end of second row  -->

<div class="row">
<div class="col-lg-2">
<h3 class="titles">Description </h3>
</div>
</div>


<div class="row">
<div class="col-lg-6" >
<p>
<?php echo $descr;?>
</p>
</div>
</div>
<!-- end of row  --> 
<!-- social share tags row -->

<div class="row">
  <div class="col-lg-6">
  <br>
  <span style="color:#ff9800;" >Share on</span> 
  &nbsp;
  <a href="http://www.facebook.com/"><span class="fa fa-facebook">&nbsp;</span></a>
   &nbsp;
  <a href="http://www.twitter.com/"><span class="fa fa-twitter">&nbsp;</span></a>
  </div>
</div> 
<!-- tabs for navigating the project -->

<div class="row">
<div class="titles">
</div>
</div><br>
<!-- project about -->
<div class="row">
<div class="col-lg-3">
<h3 class="titles">Project Background </h3>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<p><?php echo $background;?></p>

</div>
</div>

<div class="row">
<div class="col-lg-2">
<h3 class="titles">Goals </h3>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<p><?php echo $goals;?></p>

</div>
</div>

<div class="row">
<div class="titles">
</div>
</div><br>

<!-- more projects -->
<div class="row">
<div class="col-lg-3">
<h3 class="titles">Browse more projects </h3>
</div>
</div>
            <div id="lightbox" class="row">
                <?php
                $a = 0;
                $sql = mysql_query("SELECT * FROM project");
                while ($dis = mysql_fetch_array($sql)) {
                $uploadDir = 'images/uploads/project/'.$dis['id'].'/';
                if (!file_exists($uploadDir)) {
                    $profile = 'images/default/project/default.jpg';
                } else {
                    $profile = 'images/uploads/project/'.$dis['id'].'/avatar.jpg';
                }
                if ($a !== 4) {
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
                  $a++;
                }
                ?>
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
