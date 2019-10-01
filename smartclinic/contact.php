<?php
    include ('server.php');
    // session_start();
                // THIS BLOCK IS FOR CHECKING THE VERSION AND STARTING THE SESSION
                if (version_compare(PHP_VERSION, '7.00')>=0)
                {
                  // PHP>=7
                  session_start(['cache_limiter'>= 'private', 'read_and_close'=> true,]);
                }
                else{
                  // php <7
                  session_start();
                }

                //DISABLING BACK KEY LOGIN
                if (!isset($_SESSION['fname'])) {
                  header('Location: login.php');
                  exit();
                   }
                 echo 'Logged in as '.$_SESSION['fname'];
              // THIS IS FOR DATA COLLECTION
        if($_SERVER['REQUEST_METHOD']=='POST'){
          
          if(isset($_POST['department']) && $_POST['department']!== "" && isset($_POST['pNum']) && $_POST['pNum']!== "" && isset($_POST['date']) && $_POST['date']!==""){          
            $date = $connection->real_escape_string($_POST['date']);
            $time = $connection->real_escape_string($_POST['time']);


            $message = $connection->real_escape_string($_POST['message']);
            $lname=$_SESSION['lname'];
						$fname=$_SESSION['fname'];
						$email=$_SESSION['email'];
            $pNum=$_SESSION['pNum'];
            $id=$_SESSION['id']; 
                  switch($_POST['department']){
                    case '1.':
                    $department='Physio';
                    break;

                    case '2.':
                    $department='Paediatrics';
                    break;

                    case '3.':
                    $department='Dental';
                    break;

                    case '4.':
                    $department='Gyaenacology';
                    break;

                    case '5.':
                    $department='Physio';
                    break;

                    case '6.':
                    $department='Ear or Eye';
                    break;
                   
                    case '7.':
                    $department='Mortuary';
                    break;
                          
                    default:
                    $department = 'Not selected';
                    break;
                  }

            //CHECKING FOR ALREADY BOOKED DATE AND TIME
            $chk = "SELECT * FROM appointment where app_time = '$time' AND app_date='$date'";
            $checks= mysqli_query($connection,$chk);

            if (mysqli_num_rows($checks)==1){
              echo "<script> alert('Date and time already Booked!');</script>";
            }
            else{

               //STORING EVERYTHING IN THE DATABASE
                $insert="INSERT INTO appointment(fname, lname, pNum, app_message, email, app_time, app_date, department, client_id) VALUES ('$fname', '$lname', '$pNum', '$message', '$email', '$time', '$date', '$department', '$id')";     
                if($connection->query($insert)===true){
                  
                  echo "<script>alert('Application submitted successfully!');</script>";
                }
                else
                  echo "<script>alert('Failed to submit appointment');</script>";
                }

            }

          else{
            echo "<script> alert ('Fill all the fields')</script>;"; //SHOWING THAT NOT ALL FIELDS HAVE INPUTS
          }
            
        }
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contact</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Smart<span>Clinic</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="doctors.php" class="nav-link">Doctors</a></li>
	          <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <li class="nav-item cta"><a href="contact.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Appointment/ History</span></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><strong>Log-out</strog></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item bread-item" style="background-image: url('images/bg_1a.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container" data-scrollax-parent="true">
          <div class="row slider-text align-items-end">
            <div class="col-md-7 col-sm-12 ftco-animate mb-5">
              <p class="breadcrumbs" data-scrollax=" properties: { translateY: '70%', opacity: 1.6}"><span class="mr-2"><a href="index.php">Home</a></span> <span><a href="doctors.php">Doctors</a></span></p>
              <h1 class="mb-3" data-scrollax=" properties: { translateY: '70%', opacity: .9}">Contact Us</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> Group 8, University of Cape Coast</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+233 54 735 1485</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@yoursite.com">group8soft.Eng@gmail.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="index_1.php">smartclinic.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
            <form action="#">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-6" id="map"></div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">SmartClinic .</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="doctors.php" class="py-2 d-block">Doctors</a></li>
                <li><a href="services.php.php" class="py-2 d-block">Services</a></li>
                <!-- <li><a href="blog.php" class="py-2 d-block">Blog</a></li> -->
                <li><a href="contact.php" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 pr-md-4">
            <div class="ftco-footer-widget mb-4">
              <!-- <h2 class="ftco-heading-2">Recent Blog</h2> -->
              <div class="block-21 mb-4 d-flex">
                <!-- <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Office</h2>
            	<div class="block-23 mb-3">
              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Group 8, University of Cape Coast</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+233 55 788 9139</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">group8soft.Eng@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

          <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed with <i class="icon-heart" aria-hidden="true"></i> by <a href="index.php" target="_blank">Group 8</a>
 </p>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Make an Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="contact.php">

<div  class="form-group" data-validate="Enter your full name">
  <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
  <input type ="text" name ="fullName" class="form-control" id="appointment_name" value = "<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?>">
</div>

<div  class="form-group" data-validate="Phone Number">
  <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
  <input type="text" name ="pNum" class="form-control" id="appointment_name" value=<?php echo $_SESSION['pNum']?>>
  
  <div class="col-sm-4">
      <div class="form-group">
        <div class="select-wrap">
          <!-- <div class="icon"><span class="ion-ios-arrow-down"></span></div> -->
          <select name="department" id="department_name" class="form-control" label="Department">
            <option value="0."> Department </option>
            <option value="1"> Physio</option>
            <option value="2.">Paediatrics</option>
            <option value="3.">Dental</option>
            <option value="4.">Gyaenacology</option>
            <option value="5.">Physio</option>
            <option value="6.">Eye or Ear</option>
            <option value="7.">Mortuary</option>
          </select>
        </div>
      </div>
    </div>

</div>
<div class="form-group" data-validate="Enter your email">
  <!-- <label for="appointment_email" class="text-black">Email</label> -->
  <input type="email" name="email" class="form-control" id="appointment_email" value=<?php echo $_SESSION['email']; ?>>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <!-- <label for="appointment_date" class="text-black">Date</label> -->
      <input type="text" name="date" class="form-control appointment_date" placeholder="Date (dd/mm/yy)">
    </div>    
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <!-- <label for="appointment_time" class="text-black">Time</label> -->
      <input type="text" name="time" class="form-control appointment_time" placeholder="Time">
    </div>
  </div>
</div>


<div class="form-group">
  <!-- <label for="appointment_message" class="text-black">Message</label> -->
  <textarea type= "text" name="message"  class="form-control" cols="30" rows="10" placeholder="Message (Optional)"></textarea>
</div>
<div class="form-group">
  <input type="submit" value="Make an Appointment" class="btn btn-primary">
</div>
<div class="nav-item"><a href="history.php" class="nav-link"><span>History</span></a></div>
</form>
        </div>
        
      </div>
    </div>
  </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>