<?php 
	// $mysqli = new mysqli('localhost', 'root', '', 'smartclinic1');
	// $conn = mysqli_connect('localhost','root','','smartclinic1');
	include ('server.php');
	session_start();

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		if (($_POST['pass'])==($_POST['cpass'])){
			
			$fname = $connection->real_escape_string($_POST['fname']);
			$lname = $connection->real_escape_string($_POST['lname']);
			$email = $connection->real_escape_string($_POST['email']);
			$password = md5($_POST['pass']);
			$pNum=$connection->real_escape_string($_POST['pNum']);
			$sql="SELECT * FROM users WHERE email = '$email'";
			$res = mysqli_query($connection,$sql);

	if (mysqli_num_rows($res)>=0){

				while($row = mysqli_fetch_assoc($res)){

					$mail = $row['email'];
					
				}
		

				if($email === $mail ){

					echo "<script> alert('Email already exists');</script>";
				}else{
					
					$insert="INSERT INTO users(lName, fName, email, password, pNum) VALUES ('$lname', '$fname', '$email', '$password', '$pNum')";						
					if ($connection->query($insert)===true){
								
						$_SESSION['lname']=$lname;
						$_SESSION['fname']=$fname;
						$_SESSION['email']=$email;
						$_SESSION['pNum']=$pNum;
					
						//$_SESSION['fullName']=$fname ." ". $lname;
						header("location:login.php");

					}
					else{
					echo "<script> alert('Unable to connect to database');</script>";
					}
				}
			
			}
			
				
		}
		else{
			echo "<script> alert('Passwords do not match');</script>";
		}
		
	}
	
	


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
			<div class="wrap-login100 p-t-20 p-b-20">
				<form method="post" action="register.php" class="login100-form validate-form">
					<span class="login100-form-title p-b-30">
						Register
					</span>

					<div class="wrap-input100 validate-input m-t-30 m-b-25" data-validate = "Enter First Name">
						<input class="input100" type="text" name="fname">
						<span class="focus-input100" data-placeholder="First Name"></span>
					</div>

					<div class="wrap-input100 validate-input m-t-30 m-b-25" data-validate = "Enter Last Name">
						<input class="input100" type="text" name="lname">
						<span class="focus-input100" data-placeholder="Last Name"></span>
					</div>
					

                    <div class="wrap-input100 validate-input  m-b-25" data-validate = "Enter your email">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
                    </div>
					
					<div class="wrap-input100 validate-input  m-b-25" data-validate = "Enter your phone number">
						<input class="input100" type="number" name="pNum">
						<span class="focus-input100" data-placeholder="Phone Number"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password" style="display: n">
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100" data-placeholder="Password"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password" style="display: n">
						<input class="input100" type="password" name="cpass" >
						<span class="focus-input100" data-placeholder="Confirm password"></span>
                    </div>
                    
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Sign up
						</button>
					</div>

					<ul class="login-more p-t-25">
						<li>
							<span class="txt1">
								Aready have an account?
							</span>

							<a href="login.php" class="txt2">
								Sign in
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Login/js/main.js"></script>
</body>
</html>