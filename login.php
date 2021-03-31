<?php 
include 'assets/db.php';
$_SESSION['online'] = "login";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
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
    <link rel="stylesheet" type="text/css"  href="css/loginPage.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/projectThumbnail.css">

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

</head>

<body style='
background: linear-gradient(rgba(0,0,0,.9),rgba(0,0,0,.9)),url(images/black/1.jpg);
background-size: cover;
background-position: center;
background-attachment: fixed;
background-repeat: no-repeat;
'>
<!-- Navbar goes here -->
<?php include 'assets/navigation.php';?>
 
 <!-- sign in and sign up-
    ==========================================-->

        <div class="container">
<?php
$msg = '';
if ($_GET['who'] == "signin") {
    if (isset($_GET['wrong'])) {
        $msg = '<div class="alert alert-danger col-sm-12">Wrong Username or Password!. Create an account <a href="login.php?who=signup">here</a> maybe</div>';
    }
echo '        <div id="login-box" class="modal-dialog" role="document">                    
            <div class="modal-content" >
                    <div class="modal-header">
                      <div class="modal-title h1" id="myModalLabel">Sign In</div>
                    </div>     

                    <div class="modal-body" >
                            '.$msg.'
                        <form id="loginform" class="form-horizontal" method="POST" action="assets/script.php" role="form">
                                    
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email :</label>
                            <div class="col-lg-8">

                               <input type="text" name="email" class="form-control editTab" placeholder="Enter your Email" required/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password :</label>
                            <div class="col-lg-8">

                             <input type="password" name="pass" class="form-control editTab" placeholder="Enter your password" required/>  

                            </div>
                        </div>  

                         <div class="form-group">
                         <div class="col-sm-12">
                            <label class="col-sm-9 control-label"></label>
                                      <button type="submit" id="btn-login" name="login" class="btn btn-transparent col-sm-2">Login</button>
                        </div>
                         </div>
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div>
                                            Dont have an account! 
                                        <a href="login.php?who=signup">
                                            Sign Up Here
                                        </a>
                                        <a href="#"></a>
                                        </div>
                                    </div>
                             </div>    
                            </form> 
                        </div>                     
                    </div>  
        </div>';
}
elseif ($_GET['who'] == "signup"){
    if (isset($_GET['wrong'])) {
        $msg = '<div class="alert alert-danger col-sm-12">The email entered happens to already belong here!. Login <a href="login.php?who=signin">here</a> maybe</div>';
    }
        echo '<div id="signup-box" class="modal-dialog" role="document">                    
                         <div class="modal-content" >
                                 <div class="modal-header">
                                   <div class="modal-title h1" id="myModalLabel">Sign Up</div>
                                 </div>     
             
                                 <div class="modal-body" >
                                        '.$msg.'  
                                     <form id="loginform" class="form-horizontal" method="POST" action="assets/script.php" role="form">
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">First name :</label>
                                         <div class="col-lg-8">
             
                                            <input type="text" name="firstname" class="form-control editTab" placeholder="Enter your first name" required/>
             
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">Last name :</label>
                                         <div class="col-lg-8">
             
                                            <input type="text" name="lastname" class="form-control editTab" placeholder="Enter your last name" required/>
             
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">Username :</label>
                                         <div class="col-lg-8">
             
                                            <input type="text" name="user" class="form-control editTab" placeholder="Enter your username"  required/>
             
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">Email :</label>
                                         <div class="col-lg-8">
             
                                            <input type="email" name="email" class="form-control editTab" placeholder="Enter your email" required/>
             
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">Gender :</label>
                                         <div class="col-lg-8">

                                <select name="gender" class="form-control editTab" id="select-box" required/>
                                    <option>Choose your gender here</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
             
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">Phone :</label>
                                         <div class="col-lg-8">
             
                                            <input type="number" name="phone" class="form-control editTab" placeholder="Enter your phone number" required/>
             
                                         </div>
                                     </div>
                                                 
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label ">Birthday :</label>
                                         <div class="col-lg-8">
                                            <input type="date" name="dob" class="form-control" placeholder="Enter your birthdate" required/>
             
                                         </div>
                                     </div>
             
                                     <div class="form-group">
                                         <label class="col-lg-3 control-label">Password :</label>
                                         <div class="col-lg-8">
             
                                          <input type="password" id="pass" name="pass" class="form-control editTab" placeholder="Enter your password" required/>  
             
                                         </div>
                                     </div>  
                                     <!-- <div class="form-group">
                                         <label class="col-lg-3 control-label">Confirm Password :</label>
                                         <div class="col-lg-8">
             
                                          <input type="password" id="comf" class="form-control editTab" placeholder="Comfirm your paswword" required/>  
             
                                         </div>
                                     </div> -->
                                      <div class="form-group">
                                      <div class="col-sm-12">
                                         <label class="col-sm-9 control-label"></label>
                                                   <button type="submit" id="btn-register" name="register" class="btn btn-transparent col-sm-2">Register</button>
                                     </div>
                                      </div>
                                             <div class="form-group">
                                                 <div class="col-md-12 control">
                                                     <div>
                                                         Already have an account! 
                                                     <a href="login.php?who=signin">
                                                         Sign In Here
                                                     </a>
                                                     <a href="#"></a>
                                                     </div>
                                                 </div>
                                          </div>    
                                         </form> 
                                     </div>                     
                                 </div>  
                     </div>';
                }
?>     
    </div>



 <!-- Ending Sign up pages
    ==========================================-->
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
