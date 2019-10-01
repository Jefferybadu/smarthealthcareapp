<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Appointments</title>
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
  
  <style>
    table{
      border-collapse: collapse;
      width:100%;
      color: #588c7e;
      font-family: monospace;
      font-size: 25px;
      margin-bottom: 5%;
      margin-top:10%;
      text-align: left;  
    }
    th{
      background-color: #588c7e;
      color: white;
    }
    tr:hover{background-color: aliceblue}
   .container{
     background-color: #588c7e
   }
  </style>
  <body> 
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Smart<span>Clinic</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu">Menu</span></button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="doctors.php" class="nav-link">Doctors</a></li>
	          <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Appointment/ History</span></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><strong>Log-out</strog></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
<section>
		<table>
      <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Appointment Number</th>
      </tr>
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
              // THIS IS FOR DATA COLLECTION
        
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            $email = $_SESSION['email'];
            //CHECKING FOR ALREADY BOOKED DATE AND TIME
            $sql = "SELECT client_id, fname, lname, app_date, app_time, app_id FROM appointment WHERE email ='$email'";
            $result= $connection->query($sql);

            if ($result->num_rows > 0){
              while ($row = $result->fetch_assoc()){
                echo "<tr><td>". $row["client_id"] ."</td><td>". $row["fname"] ."</td><td>". $row["lname"] ."</td><td>". $row["app_date"] ."</td><td>". $row["app_time"] ."</td><td>". $row["app_id"] ."</td><tr>";
              }
            }
          else
            echo "<script>alert ('Could not fetch the results');</script>";
            

?>
    </table>
</section>
		<div id="map"></div>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-3">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">SmartClinic .</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
              <li class="ftco-animate"><a href="http://www.twitter.com"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="http://www.facebook.com"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="http://instagram.com"><span class="icon-instagram"></span></a></li>
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
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="index.php">The healthcare of the people!</a></h3>
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
                  <h3 class="heading"><a href="#">We are at your service</a></h3>
                  <div class="meta">
                    <div><a href="index.php"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="index.php"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="contact.php"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
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