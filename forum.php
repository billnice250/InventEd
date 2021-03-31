<?php
include 'assets/db.php';
if ($_GET['con']) {
    $_SESSION['con'] = $_GET['con'];
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

    <title>Forum</title>
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

<div class="container" id="previewTab">

  <div class="row">
   
        <div class="container" >
        <br>
       <button type="submit" class="btn btn-active" data-toggle="modal" data-target="#largeModal" style="float:right;">Ask A Question</button>

       <div id="largeModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" style="width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title">ASK A QUESTION</h4>
                </div>
                <div class="modal-body">
                    <form action="assets/script.php" method="POST">
    <div class="form-group">
    <div class="row">
      <div class="col-md-6">
        <label for="inputEmail">Tile Of Question</label>
        <input type="text" class="form-control askpop" id="inputEmail" placeholder="Ex: How to open PHP?" name="title">
        </div>
        <div class="col-md-6">
        <label for="inputEmail">Category</label>
        <input type="text" class="form-control askpop" id="inputEmail" placeholder="like #JS, #css, #Html" name="tags">
        <input type="hidden" name="user" value="<?php echo $_SESSION['user'];?>">
        <input type="hidden" name="day" value="<?php echo date("Y-m-d");?>">
        </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword">Question</label>
        <textarea class="form-control  askpop" cols="10" rows="5" name="question"></textarea>
    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" style="background-color:white; border:none;" data-dismiss="modal" class="btn btn-md" >
                    <i class="fa fa-times " aria-hidden="true"></i>
                    Cancel
                    </button>
                    <button type="submit" name="askQuestion" class="btn btn-active">Send</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
      </div>
  <div class="row">
  <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
            <div class="table-responsive"  style="margin-top: 50px;">  
      <table class="table table-striped">
    <thead>
        <tr>
            <th>Questions</th>
            <th>Original Poster</th>
            <th>Topic</th>
            <th>Replies</th>
        </tr>
    </thead>
    <tbody>
<?php
$con = $_SESSION['con'];
$words = explode("/", $con);
foreach ($words as $con) {
  $sql = mysql_query("SELECT * FROM forum WHERE id='$con'");
  while ($dis = mysql_fetch_array($sql)) {
  echo '
      <tr>
      <td>'.$dis['title'].'<br><br><a href="forumq.php?no='.$dis['id'].'">Read More</a>
      <br><br>
      </td>
      <td><img src="images/default.png" style="border-radius:40px;width:30px;height:30px;margin-top:7px">';
      $sql1 = mysql_query("SELECT * FROM forum WHERE id='$dis[id]'");
      while ($dis1 = mysql_fetch_array($sql1)) {echo $dis1['user'];}
      echo '</td>
      <td>'.$dis['tags'].'</td>
      <td>';
      $sql2 = mysql_query("SELECT count(id) AS total FROM replies WHERE question='$dis[id]'");
      $data = mysql_fetch_assoc($sql2); 
      echo $data['total'];
      echo '</td>
      </tr>
  ';
  }
}
?>
    </tbody>
</table>
  <?php
  if ($con == "none") {
    echo '<h3>No result found...</h3>';  
  }?>
</div>
        </div>
    </div>
    </div>
</div>
<!-- End of  project preview page -->
<nav id="footer" class="navbar-fixed-bottom">
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
