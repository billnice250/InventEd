<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
$_SESSION['check'] = "loggedOut";
header("location: ../index.php"); // Redirecting To Home Page
}
?>