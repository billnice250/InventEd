<?php
include 'assets/db.php';
if ($_GET['no']) {
  $_SESSION['no'] = $_GET['no'];
} else {
  echo "Error!";
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
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script>
    function show(shown, hidden)
    {
      document.getElementById(shown).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
    }
    </script>
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script> 
    <script type="text/javascript" src="js/jquery.codify.min.js"></script>
    <script type="text/javascript" src="js/htmlbox.colors.js"></script>
    <script type="text/javascript" src="js/htmlbox.styles.js"></script>
    <script type="text/javascript" src="js/htmlbox.syntax.js"></script>
    <script type="text/javascript" src="js/htmlbox.undoredomanager.js"></script>
    <script type="text/javascript" src="js/htmlbox.min.js"></script>
</head>

<body>
<?php
if ($_SESSION['check'] == "loggedIn") {
  include'assets/navbar.php';
} else {
  include'assets/navigation.php';
  $_SESSION['user'] = NULL;
}
?>
<?php include 'assets/search.php';?>
<?php
$query = mysql_query("SELECT * FROM forum WHERE id='$_SESSION[no]'");
while ($dis = mysql_fetch_array($query)) {
echo'
<div class="container" id="previewTab" style="width:80%">
  <div class="row">
    <div class="col-md-8">
      <h3>'.$dis['title'].'</h3><h5>'.$dis['question'].'</h5><br>';
      if ($dis['user'] == NULL) {
        $query2 = mysql_query("SELECT * FROM users WHERE id='$dis[user]'");
        while ($dis1 = mysql_fetch_array($query2)) {
          echo "Asked by:".$dis['user'];
        }
      } else {
        echo "Asked by: Anonymous User";
      }
echo '
        <br><br>
        <h4>';
        $query1 = mysql_query("SELECT count(id) AS total FROM replies WHERE question='$dis[id]'");
        $data = mysql_fetch_assoc($query1);
        echo $data['total'].' Answers';
        echo "<br><br><h4>Tags: ".$dis['tags']."</h4>";
        echo'</h4>';
  $query3 = mysql_query("SELECT * FROM replies WHERE question='$_SESSION[no]'");
  while ($dis2 = mysql_fetch_array($query3)) {
    echo "<hr>";
    echo $dis2['reply'];
    echo "<br>";
    echo "<b><i>Replied by: ".$dis2['name']."</b></i>";
    echo "<br>";
  }  
}?>   <br><br><br><br>
<div class="col-md-5">

          <button class="btn btn-opaque" type="submit" onclick="return show('page1')"><i class="fa fa-edit"></i> Answer</button>
        </div><br><br>
<div id="page1" style="display:none;">
<form action="assets/script.php" method="POST">
          <textarea id="htmlbox_silk_icon_set_blue" name="answer"></textarea> <br>
          <button class="btn btn-opaque" type="submit" name="reply" style="float:left"> SEND </button>
          <button onclick="return show('page2','page1')"  style="background-color:white; border:none;" class="btn btn-md"><i class="fa fa-times " aria-hidden="true"></i>Close</button>
  </form>
        </div>
        <div id="page2" style="display:none;">
          
        </div>
</center>
    </div>
  </div>
</div>
<!-- End of  project preview page -->
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
    <script type="text/javascript" src="js/htmlbox.content.js"></script> 
</body>

</html>
