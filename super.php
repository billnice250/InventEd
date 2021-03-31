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
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

</head>

<body>
<!-- Navbar goes here -->
<?php include 'assets/supernav.php';?>
<!-- Navbar ends here -->
<div class="container content">
    <div class="row" id="projects">













 <div class="container" id="contentTabs" style="color:black !important">
      <div class="col-md-12">
            <div class="tabbable" id="navs">
                <ul class="nav nav-tabs">
                      <li class="active">
                        <a href="#tabOne" data-toggle='tab'><i class="fa fa-newspaper-o" aria-hidden="true"></i>Add Testmnials</a>
                      </li>
                      <li>
                        <a href="#tabTwo" data-toggle='tab'><i class="fa fa-comments-o" aria-hidden="true"></i>Messages</a>
                      </li>
                </ul> 
                <div class="tab-content">
                      <div class='tab-pane fade in active' id="tabOne">




              <div class="container col-md-12">
                  <form action="" method="POST">
                      <div class="form-group">
                            <label class="col-md-4 control-label">Select section:</label>
                        <div class="col-md-8">
                        <select name="id" class="form-control editTab">
                            <option value="1">Place 1
                            <option value="2">Place 2
                            <option value="3">Place 3
                        </select>
                        </div>
                          </div><br><br>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Testimonies Goes Here:</label>
                        <div class="col-md-8">
                        <textarea class="form-control editTab" name="testimony">
                        </textarea>
                        
                        </div>
                          </div><br><br>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Names</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control editTab"  name='names'>  
                        </div>
                          </div><br><br>
                          <div class="form-group">
                            <label class="col-md-4 control-label">Work Place</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control editTab"  name='work'>  
                        
                        </div>
                          </div>

                          <br><br><br>
                          <div class="form-group">
                          <label class="col-md-6 control-label"></label>
                              <input type="submit" name="sadmin" class="btn btn-active" value="Save Changes">
                              <div  class="btn btn-md" style="background-color:white; border:none; color:black !important;" type="reset">
                              <i class="fa fa-times " aria-hidden="true"></i>
                              Cancel
                              </div>
                            </div>
                    </form>              

              </div>
                      


                      </div> <!-- end of tab1 tab -->

                      <div class='tab-pane fade' id="tabTwo">
              <div class="container">
                      <div class="col-md-8">
                        
                      </div>
                      <div class="col-md-4">
                        
                      </div>

              </div>
                      </div><!-- end of tab2 tab -->

                </div><!-- end of tab-content --> 
            </div><!-- end of tabbable-->
      </div><!-- end of column-->
 </div><!--of tabs container-->
























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

<?php
include ('db.php');
if (isset($_POST["sadmin"])) {
    $id=$_POST["id"];
    $testimony=$_POST["testimony"];
    $names=$_POST["names"];
    $work=$_POST["work"];
    
    $update=mysql_query("UPDATE testimonials SET testimony='$testimony',names='$names',work='$work' WHERE id='$id' ");
    if ($update) {
        echo "yes";
    }
    else{
        die(mysql_error());
    }
    
}
?>
