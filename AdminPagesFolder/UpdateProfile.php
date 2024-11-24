<?php

if (isset($_POST['save'])) {
    
    $UserName = mysqli_real_escape_string($con, $_POST['UserName']);
    $email = $_SESSION['email'];
    
                
    $UserNameQuery = "SELECT * FROM users_tb  WHERE UserName = '$UserName'";
    $ResultUserName = mysqli_query($con, $UserNameQuery);

  if (mysqli_num_rows($ResultUserName) > 0) {
    $errors['name'] = "UserName  that you have entered is already exist.";
  } else {
      
      $subject = 'GoBarber';
       $message = 'You username is successfuly updated.!';
       $from = "f180207@nu.edu.pk";
      $retval = mail ($email,$subject,$message,$from);
       if( $retval == true ) 
       {
    $update = "UPDATE users_tb SET
    UserName = '$UserName'
    WHERE UserEmail = '$email'";
     
    $update_res = mysqli_query($con, $update);
    if ($update_res) 
    {
   $_SESSION['name'] = $UserName;
    echo " <script> alert(' UserName is  successfuly updated.!');</script>";
    } 
    else {
      echo " <script> alert('Failed while updating UserName!');</script>";
    }
       }
       else
        echo " <script> alert('UserName is not valid!');</script>";
  
  }
}
if (isset($_POST['ChangePassword'])) {

  $email = $_SESSION['email'];
  if ($_POST['UserConfirmPassword'] == $_POST['UserPassword']) {
    $password = $_POST['UserPassword'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $update = "UPDATE users_tb SET UserPassword = '$password' WHERE UserEmail = '$email'";
    $update_res = mysqli_query($con, $update);
    if ($update_res) {
      echo " <script> alert('Password  is  successfuly Changed.!');</script>";
    } else {
      echo " <script> alert('Failed while updating Password!');</script>";
    }
  } else {
    $errors['UserPassword'] = "Password does't matched.";
  }
}

?>
<section class="book-a-table ">
  <div class="container mt-5" data-aos="fade-up">




    <div class="section-title mt-5 p-4">
      <h2 class="mt-2 text-light">Change UserName</h2>
    </div>

    <form action="Admin.php?PageName=UpdateProfile" method="post" class="php-form">


      <div class="row">


        <div class="col-lg-1 ">
        </div>



        <div class="col-lg-5 col-md-6 form-group mt-3 mt-md-0">
          <input type="text" class="form-control p-4" name="UserName" id="UserName"value="<?php echo $_SESSION['name'] ?>" >
            <div class=" text-danger"> <p> <?php
                                              if (isset($errors['name']))
                                                echo $errors['name']
                                              ?></p> </div>
        </div>

        <div class="col-lg-3  col-md-6 form-group text-center mt-2 ">
          <input class="form-control button" type="submit" name="save" value="Save Changes" required>
        </div>

      </div>

    </form>


    <div class="section-title mt-5 p-4">
      <h2 class="mt-4 text-light">Change Password</h2>
    </div>

    <form action="Admin.php?PageName=UpdateProfile" method="post" class="php-form">

      <div class="row">

        <div class="col-lg-1 ">
        </div>

        <div class="col-lg-5 col-md-6 form-group">
          <input type="password" class="form-control p-4" name="UserPassword" id="UserPassword" placeholder="New Password" required>
          <div class=" text-light"> <p> <?php
                                              if (isset($errors['UserPassword']))
                                                echo $errors['UserPassword']
                                              ?></p> </div>
        </div>


        <div class="col-lg-5 col-md-6 form-group">
          <input type="password" class="form-control p-4" name="UserConfirmPassword" id="UserConfirmPassword" placeholder="Confirm Password" required>
        </div>

      <div class="col-lg-4 ">
        </div>
        <div class="col-lg-3 col-md-6 form-group ">
          <div class="text-center"> <input class="form-control button " type="submit" name="ChangePassword" value="Save Changes" required></div>
        </div>

      </div>


    </form>

  </div>
</section>

