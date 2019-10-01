<?php
// session_start();

$db = 'smartclinic';

$connection = mysqli_connect('localhost','root','', $db);
if(mysqli_connect_errno()){
    die("database connection failed:");
}



// if(isset($_GET["Logout"])){
// 	session_destroy();
// 	unset($_SESSION['username']);
// 	header('location:index.php');
	
// }


?>