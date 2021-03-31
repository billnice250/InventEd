<?php
include ('db.php');
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$username = $_POST['email'];
	$pass = md5($_POST['pass']);
	$query = mysql_query("SELECT * FROM users WHERE password='$pass' AND email='$email'");
	while ($dis = mysql_fetch_array($query)) {
		$_SESSION['user'] = $dis['username'];
		$_SESSION['userkey'] = $dis['id'];
		$_SESSION['super'] = $dis['super'];
		$super=$_SESSION['super'];
			
	}
	$rows = mysql_num_rows($query);
	if ($rows!=0 && $super=='admin' ) {
		$_SESSION['check'] = "loggedIn";
		header("location: ../super.php"); // Redirecting To Other Page
	} 
	elseif ($rows!=0) {
		$_SESSION['check'] = "loggedIn";
		header("location: ../dashboard.php"); // Redirecting To Other Page
	}
	else {
		header("location: ../login.php?who=signin&wrong=true");
	}
}
if (isset($_POST['register'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['user'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$pass = md5($_POST['pass']);
	$query= mysql_query("INSERT INTO users(firstname, lastname, gender, email, username, password, contact) VALUES ('$firstname','$lastname','$gender', '$email', '$username', '$pass', '$phone')");
    if($query){
		$query1 = mysql_query("SELECT * FROM users WHERE password='$pass' AND email='$email'");
		while ($dis1 = mysql_fetch_array($query1)) {
			$_SESSION['user'] = $dis1['username'];
			$_SESSION['userkey'] = $dis1['id'];
		}
		$rows1 = mysql_num_rows($query1);
		if ($rows1!=0) {
			$_SESSION['check'] = "loggedIn";
			header("location: ../dashboard.php"); // Redirecting To Other Page
		} else {
			header("location: ../login.php?who=signup");
		}
	} else {
		header("location: ../login.php?who=signup&wrong=duplicate");
    }
}
if (isset($_POST['createProject'])) {
	$count = mysql_query("SELECT * FROM project ORDER BY id DESC LIMIT 1");
	while ($c = mysql_fetch_array($count)) {
		$id = $c['id'];
	}
	$title = $_POST['title'];
	$owner = $_POST['owner'];
	$back = $_POST['back'];
	$location = $_POST['location'];
	$duration = $_POST['duration'];
	$descr = $_POST['descr'];
	$background = $_POST['background'];
	$goals = $_POST['goal'];
	if(!get_magic_quotes_gpc())
	{
		$background = addslashes($background);
		$descr = addslashes($descr);
		$goals = addslashes($goals);
	}
// include ImageManipulator class
require_once('ImageManipulator.php');
 
if ($_FILES['projecticon']['error'] > 0) {
    echo "Error: " . $_FILES['projecticon']['error'] . "<br />";
} else {
    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
    // get extension of the uploaded file
    $fileExtension = strrchr($_FILES['projecticon']['name'], ".");
    // check if file Extension is on the list of allowed ones
    if (in_array($fileExtension, $validExtensions)) {
        $newNamePrefix = $id;
        $newName = "avatar.jpg";
        $manipulator = new ImageManipulator($_FILES['projecticon']['tmp_name']);
        $width  = $manipulator->getWidth();
        $height = $manipulator->getHeight();
        $centreX = round($width / 2);
        $centreY = round($height / 2);
        // our dimensions will be 200x130
        $x1 = $centreX - 150; // 200 / 2
        $y1 = $centreY - 90; // 200 / 2
 
        $x2 = $centreX + 150; // 200 / 2
        $y2 = $centreY + 90; // 200 / 2
 
        // center cropping to 200x130
        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        // saving file to uploads folder
        $manipulator->save('../images/uploads/project/' . $newNamePrefix . '/' . $newName);
        if ($manipulator) {
        	echo 'Done ...';
        } else {
        	echo 'Failed ...';
        }
    } else {
        echo 'You must upload an image...';
    }
}
	$skills = ' ';
	if (!empty($_POST['skills'])) {
		foreach ($_POST['skills'] as $key) {
			$skills = $key.','.$skills;
		}
	}
	$sql = "INSERT INTO project(title,owner,backers,location,duration,descr,back,goal,skills)
				VALUES ('$title','$owner','$back','$location','$duration','$descr','$background','$goals','$skills')";
	$query= mysql_query($sql);
    if($query){
		$sql1 = mysql_query("SELECT * FROM project ORDER BY id DESC LIMIT 1");
	    while ($dis = mysql_fetch_array($sql1)) {
	    	mysql_query("INSERT INTO backed(user,project,response) VALUES('$_SESSION[userkey]','$dis[id]',1)");
	    	header("location: ../projects.php");
	    }
	} else {
		die(mysql_error());
		header("location: ../dashboard.php");
    }
}
if (isset($_POST['reply'])) {
	$question = $_SESSION['no'];
	$reply = $_POST['answer'];
	$user = $_SESSION['user'];
	if($user){
		$user = $_SESSION['user'];
	$query= mysql_query("INSERT INTO replies(name,reply, question) VALUES ('$user','$reply','$question')");
    if($query){
		echo "Data successfully inserted";
		header("location: ../forumq.php?no=$question");
	} else {
		die(mysql_error());
    }
    }
    else{
    	$unknown="Unknown User";
    	$query= mysql_query("INSERT INTO replies(name,reply, question) VALUES ('$unknown','$reply','$question')");
    if($query){
		echo "Data successfully inserted As Unknown User";
		header("location: ../forumq.php?no=$question");
	} else {
		die(mysql_error());
    }
    }
}
if (isset($_POST['persoinfo'])) {
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$web = $_POST['web'];
	$bio = $_POST['bio'];
$uploadDir = '../images/uploads/profile/'.$id.'/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
$avatar = $_FILES['useravatar']['name'];
$tmpAvatar = $_FILES['useravatar']['tmp_name'];

$cover = $_FILES['usercover']['name'];
$tmpCover = $_FILES['usercover']['tmp_name'];

$extAvatar = substr(strrchr($avatar, "."), 1); 
$extCover = substr(strrchr($cover, "."), 1); 

// and now we have the unique file name for the upload file
$filePathAvatar = $uploadDir.'avatar'. '.jpg';
$filePathCover = $uploadDir .'cover'. '.jpg';

$resultAvatar = move_uploaded_file($tmpAvatar, $filePathAvatar);
$resultCover = move_uploaded_file($tmpCover, $filePathCover);

if (!$resultAvatar) {
echo "Error uploading Avatar";
// exit;
}
if (!$resultCover){
echo "Error uploading Cover";
// exit;
}
	$query= mysql_query("UPDATE users SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', dob = '$dob', email = '$email', web = '$web', contact = '$contact', bio = '$bio' WHERE id = $id");
    if($query){
		header("location: ../profile.php?prof=$id");
	} else {
		die(mysql_error());
    }
}
if (isset($_POST['accountsett'])) {
	$id = $_POST['id'];
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	$query= mysql_query("UPDATE users SET username = '$user', password = '$pass' WHERE id = $id");
 	if($query){
		header("location: ../settings.php?prof=$id");
	} else {
		die(mysql_error());
    }   
}
if(isset($_POST['askQuestion'])){
	if ($_SESSION['user'] == NULL) {
		$user = "Anonymous User";
	} else {
		$user = $_POST['user'];
	}
	$title = $_POST['title'];
	$day = $_POST['day'];
	$tags = $_POST['tags'];
	$question = $_POST['question'];
	$query = mysql_query("INSERT INTO forum(title, question, user, timeasked, tags) VALUES ('$title', '$question', '$user', '$day', '$tags')");
    if($query){
    	if ($_SESSION['user'] == NULL) {
    		header("location: ../index.php");
    	} else {
    		header("location: ../dashboard.php");
    	}
		
	} else {
		die(mysql_error());
    }
}
if (isset($_POST['search'])) {
$con = $_GET['test'];
$content = $_POST['content'];
$question='';
$query = "SELECT * FROM forum WHERE question LIKE '%".$content."%' OR title LIKE '%".$content."%' OR tags LIKE '%".$content."%'";
$sql = mysql_query($query);
while ($dis = mysql_fetch_array($sql)) {
	$question = $dis['id'].'/'.$question;
}
if ($question == "") {
	header('location: ../forum.php?con=none');
} else {
	header('location: ../forum.php?con='.$question.'');
}
}
if(isset($_POST["chat"])){
	$time = date("l jS \of F Y h:i:s A");
	$user=$_SESSION['user'];
	
	$user = $_SESSION['user'];
	$content = $_POST["message"];
	$project = $_SESSION['pro'];
	$wow=mysql_query("INSERT INTO message(content,timep,project,user) VALUES('$content','$time','$project','$user')");
	// echo $user;
	if ($wow) {
		echo "Chat successfully sent";
		header("location: ../backproject.php?pro=$project");

	}
	else{
		header("location: ../backproject.php");
	}
}
if (isset($_POST['joinProject'])) {
	$project = $_POST['project'];
	$user = $_POST['user'];
	$sql = mysql_query("SELECT * FROM backed WHERE user='$user' AND project='$project'");
	$rows = mysql_num_rows($sql);
	if ($rows!=0) {
		while ($dis = mysql_fetch_array($sql)) {
			$response = $dis['response'];
		}
		if ($response == 1) {
			header("location: ../backproject.php?pro=$project");
		} else {
			header("location: ../dashboard.php");
		}
	} else {
		$query= mysql_query("INSERT INTO backed(user, project, response) VALUES ('$user','$project',0)");
	    if($query){
			header("location: ../dashboard.php");
		} else {
			die(mysql_error());
	    }
	}
}
if (isset($_POST['approve'])) {
	$person = ' ';
	$project = $_SESSION['pro'];
	if (!empty($_POST['person'])) {
		foreach ($_POST['person'] as $key) {
			$update=mysql_query("UPDATE backed SET response=1 WHERE user='$key' AND project='$project'") or die();
			if ($update) {
				echo "Success";
			}
		}
	}
	header("location: ../backproject.php?pro=$project");
}
if (isset($_GET['approve'])) {
	$project = $_SESSION['pro'];
	$person = $_GET['approve'];
	$update=mysql_query("UPDATE backed SET response=1 WHERE user='$person' AND project='$project'") or die();
	header("location: ../backproject.php?pro=$project");
}
if (isset($_POST['contact'])){
	$names=$_POST['names'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	mail($email,'Welcome','Thank you for contacting us, we will reply shortly','From: elie.gash42@gmail.com');
	$insert=mysql_query("INSERT INTO contact(names,email,message) VALUES('$names','$email','$message')");
	if ($insert) {
		header("location:../index.php");
	}
	else{
		die(mysql_error());
	}
}
mysql_close(); // Closing Connection
?>