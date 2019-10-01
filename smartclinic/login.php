<?php 
	include ('server.php');
	session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$email = ($_POST['email']);
		$password = md5($_POST['pass']);
		$sql="SELECT * FROM users WHERE email = '$email'";
		$res = mysqli_query($connection,$sql);

	if (mysqli_num_rows($res)==1){
	//SELECTING EVERYTHING FROM THE DATABASE IN FORM OF SESSIONS
		
		while($row=mysqli_fetch_assoc($res)){
			if($password == $row['password']){
				$fname = $row['fname'];
				$lname = $row['lname'];
				$pNum = $row['pNum'];
				$email = $row['email'];
				$id=$row['id'];

				
				$_SESSION['lname']=$lname;
				$_SESSION['fname']=$fname;
				$_SESSION['email']=$email;
				$_SESSION['pNum']=$pNum;
				$_SESSION['id']=$id;
				
				header("location:index.php");

			}
			else
				echo "<script> alert('Wrong Email/Password');</script>";
			
		}


	
}

}



?>





<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form method = "POST" action="login.php" class="login100-form validate-form">
					<span class="login100-form-title p-b-70">
						Login 
					</span>


					<div class="wrap-input100 validate-input m-t-50 m-b-30" data-validate = "Enter email">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					
					<div class="wrap-input100 validate-input m-b-30" data-validate="Enter password" style="display: n">
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="button" class="login100-form-btn">
							Login
						</button>
					</div>

					<ul class="login-more p-t-85">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="register.php" class="txt2">
								Sign up
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>