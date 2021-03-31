<?php 
include 'assets/db.php';
$_SESSION['online'] = "createproject";
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
    <link rel="stylesheet" type="text/css"  href="css/createProject.css">
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
<!-- Search tab -->
<div class="container">
 <div class="row" >
      <div class="col-md-12">
            <div class="tabbable" id="navs">
                <ul class="nav nav-tabs" style="width:400px">
                      <li class="active"><a href="#tab1" data-toggle='tab'><i class="fa fa-check-circle" aria-hidden="true"></i>Basic</a></li>
                      <li><a href="#tab2" data-toggle='tab'><i class="fa fa-check-circle" aria-hidden="true"></i>Story</a></li>
                </ul> 
                <div class="tab-content">
      <div class='tab-pane fade in active' id="tab1">
                            <center><h2>create your own project!</h2></center>
                        <div class='border'>
                        <form method="POST" action="assets/script.php" enctype="multipart/form-data">
                          <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4 rowTitle">
                                    <h4>Title</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <input type="text" class="form-control" name="title" placeholder="Type your project title here" required/>
                                     <input type="hidden" name='owner' value="<?php echo $_SESSION['userkey'];?>">
                                     <small><h4>make it simple</h4></small>
                                    </div>
                                    
                              </div>
                            </div><!-- end of row-->
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4">
                                    <h4>Image (or icon)</h4>
                                    </div>
                                    <div class="col-md-8 btn btn-file">
                                      <input class="form-control" name="projecticon" type="file" id="projecticon" required/>  
                                    </div>     
                              </div>
                            </div><!-- end of row-->
                             <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4">
                                    <h4>Describe it!</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <textarea class="form-control textarea noRad" name="descr" placeholder="Type your discription  here" rows="5" maxlength="100" required/></textarea>
                                     <small><i>the description has to be no more than 200 characters</i></small>
                                    </div>
                              </div>
                            </div><!-- end of row-->
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4">
                                    <h4>Team range.</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <select class="form-control" name="back" required/>
                                     <option class="li">please choose your team range here</option>
                                     <option class="lt li" value="10">1-10</option>
                                     <option class="lt li" value="30">1-30</option>
                                     <option class="lt li" value="50">1-50</option>

                                    </select>
                                    </div>
                                    
                              </div>
                            </div><!-- end of row-->
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4">
                                    <h4>Project Duration.</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <input type="number" class="form-control formText" name="duration" placeholder="Enter duration in days" required/>
                                    </div>
                                    
                              </div>
                            </div><!-- end of row-->
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4 ">
                                    <h4>Your location</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <input type="text" class="form-control formText" name="location" placeholder="Choose location using this format (Kigali, Rwanda)" required/>
                                    </div>
                                    
                              </div>
                            </div><!-- end of row-->
                            
                           <br><br>
                            <div class='row'>
                                  <div class='col-md-12'>
                                        <center>
                                              <button type="button" class="btn btn-opaque"  href='#tab2' data-toggle="tab">
                                               Proceed    
                                              </button>
                                        </center>
                                  </div>
                            </div><!-- end of row-->
                            <br><br>
                        
                        </div><!-- end of container border-->         
        </div><!-- end of basic tab -->






                      <div class='tab-pane fade' id="tab2">
                      <center><h2>create your own project!<br><small></small></h2></center>
                        <div class='border'>
                         <form>
<!--                             <div class="row rowContainer">
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4 rowTitle">
                                    <h4>Introduction  video </h4>
                                    </div>
                                    <div class="col-md-8">
                                      <input class="form-control editTab" name="videoInput" type="file"/>  
                                    </div>
                                    
                              </div>
                            </div> -->
                             <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4 rowTitle">
                                    <h4>Your inspiration</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <textarea class="form-control formText textarea noRad" name="background" placeholder="Tell us your story" rows="5" required/></textarea>
                                     <small><h4> </h4></small>
                                    </div>
                                    
                              </div>
                            </div>
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4 rowTitle">
                                    <h4>Skills</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <input type="checkbox" value="HTML " name="skills[]">HTML
                                     <input type="checkbox" value="CSS " name="skills[]">CSS
                                     <input type="checkbox" value="JavaScript " name="skills[]">JavaScript
                                     <input type="checkbox" value="PHP " name="skills[]">PHP
                                     <input type="checkbox" value="Python " name="skills[]">Python
                                     <input type="checkbox" value="Ruby " name="skills[]">Ruby
                                     <input type="checkbox" value="Django " name="skills[]">Django
                                    </div>
                                    
                              </div>                           
                            </div>
                            <div class="row rowContainer">
                              <div class="col-md-12">
                                    <div class="col-md-4 rowTitle">
                                    <h4>Goal</h4>
                                    </div>
                                    <div class="col-md-8">
                                     <textarea class="form-control formText textarea noRad" name="goal" placeholder="What goals do you have for this project?" rows="5" required/></textarea>
                                     <small><i>this should not exceed 50 words</i></small>
                                    </div>
                                    
                              </div>
                            </div>
                            <div class='row'>
                                  <div class='col-md-12'>
                                  <br>
                                  <br>
                                        <center>
                                              <button type="submit" class="btn btn-md btn-active " name="createProject">
                                               create project    
                                              </button>
                                              <button type="reset" class="btn btn-md" style="background-color:white; border:none;">
                                              <i class="fa fa-times " aria-hidden="true"></i>
                                               cancel project    
                                              </button>
                                              
                                        </center>

                                      <br><br>
                                  </div>
                            </div><!-- end of row-->
                        
                        </div><!-- end of container border-->         
                            </form>
                      </div><!-- end of story tab -->
                </div><!-- end of tab-content --> 
            </div><!-- end of tabbable-->
      </div><!-- end of column-->
 </div><!--end row-->
</div>
</div>
<!-- footer tab -->
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
