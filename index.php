<?php
include 'assets/db.php';
$_SESSION['check'] = "loggedOut";
$_SESSION['online'] = "homepage";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InventEd</title>
    <meta name="description" content="Spirit8 is a Digital agency one page template built based on bootstrap framework. This template is design by Robert Berki and coded by Jenn Pereira. It is simple, mobile responsive, perfect for portfolio and agency websites. Get this for free exclusively at ThemeForces.com">
    <meta name="keywords" content="bootstrap theme, portfolio template, digital agency, onepage, mobile responsive, spirit8, free website, free theme, themeforces themes, themeforces wordpress themes, themeforces bootstrap theme">
    <meta name="author" content="ThemeForces.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon"  href="images/invented.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/projectThumbnail.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a  href="index.php" class="navbar-brand"><img  src="images/logo.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#tf-home" class="page-scroll">Home</a></li>
            <li><a href="#tf-about" class="page-scroll">About</a></li>
            <li><a href="#tf-team" class="page-scroll">Team</a></li>
            <li><a href="#tf-services" class="page-scroll">How it works</a></li>
            <li><a href="#tf-works" class="page-scroll">Projects</a></li>
            <li><a href="#tf-testimonials" class="page-scroll">Testimonials</a></li>
            <li><a href="#tf-contact" class="page-scroll">Contact</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Home Page
    ==========================================-->
    <div id="tf-home" class="text-center">
        <div class="overlay">
            <div class="content">
                <h1  class="color">Invent<b>Ed</b></h1>
                <p class="lead">Starts with a notion,  then an idea  and<strong> finally an invention</strong></p>

                <form role="search" method="POST" action="assets/script.php" id="search-box">
                    <div class="input-group" >
                      <input  class="form-control" placeholder="Search for something here" type="text" name="content">
                    <div class="input-group-btn">
                    <button class="btn" type="submit" name="search"><i class="searchButton fa fa-search"></i></button>
                    </div>
                    </div>
                 </form>

                <button  class="btn btn-lg btn-transparent start-button" data-toggle='modal' data-target='#myModal'>GET STARTED</button>
            </div>
        </div>
    </div>


 <!-- sign in and sign up-
    ==========================================-->

        <div class="container modal fade " id="myModal" role="dialog" aria-labelledby="myModalLabel" >

        <div id="login-box" class="modal-dialog" role="document">                    
            <div class="modal-content" >
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <div class="modal-title h1" id="myModalLabel">Sign In</div>
                    </div>     

                    <div class="modal-body" >

                        <div class="alert alert-warning col-sm-12">Please, first complete this short form.</div>
                            
                        <form id="loginform" class="form-horizontal" method="POST" action="assets/script.php" role="form">
                                    
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email :</label>
                            <div class="col-lg-8">

                               <input type="text" name="email" class="form-control editTab" placeholder="Enter your email" required/>

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
                                            Don't have an account! 
                                        <a href="#" onClick="$('#login-box').hide(); $('#signup-box').show()">
                                            Sign Up Here
                                        </a>
                                        <a href="#"></a>
                                        </div>
                                    </div>
                             </div>    
                            </form> 
                        </div>                     
                    </div>  
        </div>

        <div id="signup-box" class="modal-dialog" role="document">                    
            <div class="modal-content" >
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <div class="modal-title h1" id="myModalLabel">Sign Up</div>
                    </div>     

                    <div class="modal-body" >

                        <div class="alert alert-warning col-sm-12" id="notif">Please, first complete this short form.</div>
                            
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
                                        <a href="#" onClick="$('#signup-box').hide(); $('#login-box').show()">
                                            Sign In Here
                                        </a>
                                        <a href="#"></a>
                                        </div>
                                    </div>
                             </div>    
                            </form> 
                        </div>                     
                    </div>  
        </div>       
    </div>



 <!-- Ending Sign up pages
    ==========================================-->






    <!-- About Us Page
    ==========================================-->
    <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="images/02.png" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <div class="section-title">
                            <h2>INVENTED</h2>
                            <h4>#Connecting_Africa <strong></strong></h4>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
                        <p class="intro">This is an online platform intended to bring together young brilliant minds across the African continent.  </p>
                        <ul class="about-list">
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Vision</strong> - <em>Connecting young innovators across Africa.</em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Goal</strong> - <em>Having a hands-on youth creating real-life solutions.</em>
                            </li>
                            <li>
                                <span class="fa fa-dot-circle-o"></span>
                                <strong>Our Target</strong> - <em>African Youth</em>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Page
    ==========================================-->
    <div id="tf-team" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2>Meet <strong>the team</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>

                <div id="team" class="owl-carousel owl-theme row">

                    <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/ariston.jpe" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Ariston</h3>
                                
                                <p>Use the platform and see the power of collaboration for yourself.</p>
                            </div>
                        </div>
                    </div>


                    <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/teta.jpe" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Teta  Vanessa</h3>
                                
                                <p>My way of giving back. I hope to see young people making the best out of this.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/bill.jpe" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Bill Nice</h3>
                               
                                <p>For good ideas and innovation, you need collaboration and faith in yourself.</p>
                            </div>
                        </div>
                    </div>


                    <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/passy.jpe" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Passy Icyizere</h3>
                                
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/lee.jpe" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Libert</h3>
                               
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div> -->

                    <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/elie.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Elie Gash</h3>
                               
                                <p>Let's turn our bright ideas into Africa solutions.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/kevin.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Kevin</h3>
                                
                                <p> InventEd is your go-to platform.  Keep calm and Tech up.</p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="item">
                        <div class="thumbnail">
                            <img src="images/team/arsene.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Klein K</h3>
                
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                
            </div>
        </div>
    </div>

    <!-- Services Section
    ==========================================-->
    <div id="tf-services" class="text-center">
        <div class="container">
            <div class="section-title center">
                <h2>Take a look at <strong>How it Works</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="space"></div>
            <div class="row">
                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-lightbulb-o fa-5x"></i>
                    <h4><strong>Idea</strong></h4>
                    <p>create your own idea,share it and see other ideas on the platform.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-users fa-5x"></i>
                    <h4><strong>Collaboration</strong></h4>
                    <p>Users team up and start to visualize and develop the idea together.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                    <i class="fa fa-cogs fa-5x"></i>
                    <h4><strong>Implementation</strong></h4>
                    <p> The hard work begins,prototypes are created and projects are finalized.</p>
                </div>

                <div class="col-md-3 col-sm-6 service">
                <a href="#tf-works"> <i class="fa fa-eye fa-5x"></i></a>
                   
                    <h4><strong>Show case</strong></h4>
                    <p>Products are rolled out and brought to the public. This attracts potential investors.</p>
                </div>
            </div>

            <button  class="btn btn-lg btn-opaque start-button" data-toggle='modal' data-target='#myModal'>GET STARTED</button>
        </div>
    </div>

    <!-- Supporters  Section
    ==========================================-->
    <div id="tf-clients" class="text-center">
        <div class="overlay">
            <div class="container" >

                <div class="section-title center">
                    <h2>Some of <strong>our Supporters</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                
               <div class="section-title center">
                    <div id="clients" class="owl-carousel owl-theme ">
                
                    <div class="item">
                        <img src="images/client/01.png">
                    </div>
                    <div class="item">
                        <img src="images/client/02.png">
                    </div>
                    <div class="item">
                        <img src="images/client/03.png">
                    </div>
                    
                </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Projects Section
    ==========================================-->
    <div id="tf-works">
        <div class="container"> <!-- Container -->
            <div class="section-title text-center center">
                <h2>Take a look at <strong>Our best Projects</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
<!--                 <small><em>Lorem Ipsum comes from sections of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet.."</em></small> -->
            </div>
            <div class="space"></div>

            <!-- <div class="categories">
                
                <ul class="cat">
                    <li class="pull-left"><h4>Filter by Type:</h4></li>
                    <li class="pull-right">
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".web">Web Design</a></li>
                            <li><a href="#" data-filter=".photography">Photography</a></li>
                            <li><a href="#" data-filter=".app" >Mobile App</a></li>
                            <li><a href="#" data-filter=".branding" >Branding</a></li>
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

    <!-- Testimonials Section
    ==========================================-->
    <div id="tf-testimonials" class="text-center">
        <div class="overlay">
            <div class="container">
                <div class="section-title center">
                    <h2><strong>Our clients’</strong> testimonials</h2>
                    <div class="line">
                        <hr>
                    </div>
                </div>
                <div class="row">

                <?php

                
                    echo '<div class="col-md-8 col-md-offset-2">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <div class="item">';
                            $test1 = mysql_query ("SELECT * FROM testimonials  WHERE id=1 ");
                            while ($select = mysql_fetch_array ($test1)) {
                                $id=$select['id'];
                                $testimony=$select['testimony'];
                                $names=$select['names'];
                                $work=$select['work'];
                                echo '  <div class="item">
                                            <h5>'.$testimony.'</h5>
                                            <p><strong>'.$names.'</strong>, '.$work.'.</p>
                                        </div>';
                            }          
                            echo'</div>';

echo'<div class="item">';
                            $test2 = mysql_query ("SELECT * FROM testimonials  WHERE id=2 ");
                while ($select = mysql_fetch_array ($test2))
                 {
                    $id=$select['id'];
                    $testimony=$select['testimony'];
                    $names=$select['names'];
                    $work=$select['work'];
                }
               
echo'
                        
     <h5>'.$testimony.'</h5>
     <p><strong>'.$names.'</strong>, '.$work.'.</p>
     </div>';
     echo'<div class="item">';
                            $test3 = mysql_query ("SELECT * FROM testimonials  WHERE id=3 ");
                while ($select = mysql_fetch_array ($test3)) {
                    $id=$select['id'];
                    $testimony=$select['testimony'];
                    $names=$select['names'];
                    $work=$select['work'];
                }
               
echo'
                        
     <h5>'.$testimony.'</h5>
     <p><strong>'.$names.'</strong>, '.$work.'.</p>
     </div>';
                        
?></div>
                            

    

                            <!-- <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Elie Gash</strong>, InventEd Inc.</p>
                            </div>

                            <div class="item">
                                <h5>This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</h5>
                                <p><strong>Libert</strong>, InventEd Inc.</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="section-title center">
                        <h2>Feel free to <strong>contact us</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                        <strong><em>Leave your message and give us your feed back.</em></strong>            
                    </div>

                    <form action="assets/script.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Full Names</label>
                                    <input type="text" name="names" class="form-control" id="exampleInputEmail1" placeholder="FullNames" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email Here" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea class="form-control" name="message" rows="3" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn tf-btn btn-opaque" name="contact">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>

<!-- footer tab -->

    <nav id="footer" class="navbar-bottom">
        <div class="container">
            <div class="pull-left fnav">
                <p>ALL RIGHTS RESERVED. COPYRIGHT © <?php echo date("Y");?>. Powered by <a href="#">Hehe Fellows 2016</a></p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>

    <script src="js/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>