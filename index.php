<?php
require('UserControllerData.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Patrycja Kozdrach - Portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
	  
	  
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><span>K</span>ozdrach</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="index.php#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="index.php#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="index.php#resume-section" class="nav-link"><span>Resume</span></a></li>
	          <li class="nav-item"><a href="index.php#services-section" class="nav-link"><span>Services</span></a></li>
	          <li class="nav-item"><a href="index.php#projects-section" class="nav-link"><span>Projects</span></a></li>
	          <li class="nav-item"><a href="index.php#blog-section" class="nav-link"><span>My Blog</span></a></li>
	          <li class="nav-item"><a href="index.php#contact-section" class="nav-link"><span>Contact</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>




           <!-- Php Pages -->
           <?php

              $PagesDirectory = 'PagesFolder';
              if (!empty($_GET['PageName'])) {
                $PagesFolder = scandir($PagesDirectory, 0);
                unset($PagesFolder[0], $PagesFolder[1]);
                $PageName = $_GET['PageName'];
                if (in_array($PageName . '.php', $PagesFolder)) {
                  include($PagesDirectory . '/' . $PageName . '.php');
                } else {
                  echo '<h1 id="request">You are Lost..</h1>';
                  echo '<h2>Sorry Page Not Found</h2>';
                }
              } else {
                include($PagesDirectory . '/Home.php');
              }
            ?>
              <!--End Php Pages-->
		

    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About</h2>
              <p>Hi! I’m Patrycja Kozdrach, an Account Executive and Order Management Coordinator focused on client success, efficiency, and growth. I build strong relationships and deliver strategic solutions to exceed targets.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php#home-section"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="index.php#about-section"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="index.php#services-section"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="index.php#projects-section"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                <li><a href="index.php#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Account Management</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Order & Project Coordination</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Sales & Business Development 
				</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Client Support & Consultation 
				</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Process Optimization & Strategy 
				</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"> Professor Van der Scheerstraat 201, Haarlem, NL </span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+31 638230039 </span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@kozdrach.com </span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  by <a href="https://kozdrach.com" target="_blank">kozdrach</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/scrollax.min.js"></script>
  
  <script src="assets/js/main.js"></script>
    
  </body>
</html>