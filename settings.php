<?php 
include 'assets/db.php';
$_SESSION['online'] = "setting";
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
<?php include 'assets/navbar.php';
  // ======================================
  $me = $_GET['prof'];
  $sql = mysql_query("SELECT * FROM users WHERE id='$me'");
  while($dis = mysql_fetch_array($sql)){
    $id = $dis['id'];
    $firstname = $dis['firstname'];
    $lastname = $dis['lastname'];
    $gender = $dis['gender'];
    $dob = $dis['dob'];
    $email = $dis['email'];
    $username = $dis['username'];
    $contact = $dis['contact'];
    $bio = $dis['bio'];
    $web = $dis['web'];
  }
?>
<div class=" container container-fluid">
    <h1>My Settings</h1>
    <hr>
  <div class="row">
      
      <!-- edit form column -->
      <div class="col-md-10">
<!--         <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert" style="opacity:.8">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div> -->
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" method="POST" action="assets/script.php" enctype="multipart/form-data">
          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
        <div class="col-lg-8">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input class="form-control editTab" value="<?php echo $firstname;?>" name='firstname'>
        </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
           <input class="form-control editTab" value="<?php echo $lastname;?>" name='lastname'>  
          </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Profile picture:</label>
            <div class="col-lg-8">
           <input class="form-control editTab" name="useravatar" type="file" id="useravatar">  
          </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Cover picture:</label>
            <div class="col-lg-8">
           <input class="form-control editTab" name="usercover" type="file" id="usercover"> 
          </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Gender:</label>
            <div class="col-lg-8">
            <select name="gender" class="form-control editTab">
            <?php
              if ($gender == "Male"){
                echo '<option value="'.$gender.'">'.$gender.'</option>';
                echo '<option value="Female">Female</option>';
              } elseif ($gender == "Female") {
                echo '<option value="'.$gender.'">'.$gender.'</option>';
                echo '<option value="Male">Male</option>';
              } else {
                echo "<option>Choose your gender here</option>";
                echo '<option value="Male">Male</option>';
                echo '<option value="Female">Female</option>';
              }
            ?>
            </select>   
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Date of Birth:</label>
            <div class="col-lg-8">
                <input type="date" class="form-control editTab" value="<?php echo $dob;?>" name='dob'>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
                <input class="form-control editTab" value="<?php echo $email;?>" name='email'>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Website:</label>
            <div class="col-md-8">
              <input class="form-control editTab" value="<?php echo $web;?>" name='web'>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Contacts:</label>
            <div class="col-md-8">
              <input class="form-control editTab" value="<?php echo $contact;?>" name='contact'>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Bio:</label>
            <div class="col-md-8">
              <textarea name="bio" class="form-control editTab"><?php echo $bio;?></textarea>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <label class="col-md-2 control-label"></label>
            <div class="col-md-6">
              <input type="submit" name="persoinfo" class="btn btn-active" value="Save Changes">
              <div  class="btn btn-md" style="background-color:white; border:none;" type="reset">
              <i class="fa fa-times " aria-hidden="true"></i>
              Cancel
              </div>
            </div>
          </div>
          <hr><br>
          </form>
          <form class="form-horizontal" role="form" method="POST" action="assets/script.php">
          <h3>User account settings</h3><br>
          <div class="form-group">
            <label class="col-md-3 control-label">Change Username:</label>
            <div class="col-md-8">
              <input type="hidden" name="id" value="<?php echo $id;?>">
              <input class="form-control editTab" value="<?php echo $username;?>" name='username' required/>          
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Old password:</label>
            <div class="col-md-8">
              <input class="form-control editTab" type="password" required/>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">New password:</label>
            <div class="col-md-8">
              <input class="form-control editTab" name='password' type="password" required/>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control editTab" type="password" required/>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <label class="col-md-2 control-label"></label>
            <div class="col-md-6">
              <input type="submit" name="accountsett" class="btn btn-active" value="Save Changes">
              <div  class="btn btn-md" style="background-color:white; border:none;" type="reset">
              <i class="fa fa-times " aria-hidden="true"></i>
              Cancel
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
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
