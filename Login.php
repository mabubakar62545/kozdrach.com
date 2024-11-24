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
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
	  
  <div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100">
      <div class="login100-pic js-tilt" data-tilt>
        <img
          src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png"
          alt="IMG"
        />
      </div>
      <form class="login100-form" action='Login.php' method="POST">
        <span class="login100-form-title">Admin Login</span>
        
        <?php if (count($errors) > 0) { ?>
            <div class="alert alert-danger text-danger alert-dismissible fade show text-center" role="alert" style="color: red; font-weight: bold;">
            <?php foreach ($errors as $showerror) {
                echo $showerror . '<br>';
            } ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <div class="wrap-input100 validate-input">
          <input
            class="input100"
            type="text"
            name="UserEmail"
            placeholder="Email"
            required
          />
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
        </div>

        <div class="wrap-input100 validate-input">
          <input
            class="input100"
            type="password"
            name="UserPassword"
            placeholder="Password"
            required
          />
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn" type="submit" name='Login' value='Login'>
            Login
          </button>
        </div>

        <div class="text-center p-t-12">
          <a class="txt2" href="index.php">
            Go to the Site
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
          </a>
        </div>
      </form>
    </div>
  </div>
</div>



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