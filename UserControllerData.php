<?php
require_once("Connection.php");
session_start();
$errors = array();
$success = array();

 //Login
if (isset($_POST['Login'])) {
 

        $UserEmail = mysqli_real_escape_string($con, $_POST['UserEmail']);
        $UserPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
        
        
        echo $hashedPassword;
        
           
          $check_email = "SELECT * FROM users_tb WHERE UserEmail = '$UserEmail'";
          $res = mysqli_query($con, $check_email);
          
          if (mysqli_num_rows($res) > 0) {
              $fetch = mysqli_fetch_assoc($res);
              $fetch_pass = $fetch['UserPassword'];
              if (password_verify($UserPassword, $fetch_pass)) { 
                      $_SESSION['id'] = $fetch['UserId'];
                      $_SESSION['name'] = $fetch['UserName'];
                      $_SESSION['email'] = $UserEmail;
                      $_SESSION['type'] = 'Barber';
                      $_SESSION['password'] = $UserPassword;
                      header("location: Admin.php");
                  } 
               else {
                  $errors['email'] = "Incorrect user password!";
              }
          } else {
              $errors['email'] = "It's look like you're not an admin!";
          }
        }
//Signup
        if (isset($_POST['UserRegister'])) {

                $UserName = mysqli_real_escape_string($con, $_POST['UserName']);
                $UserEmail = mysqli_real_escape_string($con, $_POST['UserEmail']);
                $UserPassword = mysqli_real_escape_string($con, $_POST['UserPassword']);
                $ConfirmUserPassword = mysqli_real_escape_string($con, $_POST['ConfirmUserPassword']);
              
              
              
                $UserNameQuery = "SELECT * FROM users_tb  WHERE UserName = '$UserName'";
                $ResultUserName = mysqli_query($con, $UserNameQuery);
              
                $UserEmailQuery = "SELECT * FROM users_tb  WHERE UserEmail = '$UserEmail'";
                $ResultUserEmail = mysqli_query($con, $UserEmailQuery);
              
              
                if (mysqli_num_rows($ResultUserName) > 0) {
                  $errors['UserName'] = "UserName  that you have entered is already exist.";
                  if (mysqli_num_rows($ResultUserEmail) > 0)
                    $errors['UserEmail'] = "UserEmail  that you have entered is already exist.";
                  if ($UserPassword !== $ConfirmUserPassword)
                    $errors['UserPassword'] = "Password does't matched.";
                } else 
                 if (mysqli_num_rows($ResultUserEmail) > 0) {
                  $errors['UserEmail'] = "UserEmail  that you have entered is already used.";
                  if ($UserPassword !== $ConfirmUserPassword)
                    $errors['UserPassword'] = "Password does't matched.";
                } else if ($UserPassword !== $ConfirmUserPassword) {
                  $errors['UserPassword'] = "Password does't matched.";
                } else {
              
                  $UserPassword = password_hash($UserPassword, PASSWORD_BCRYPT);
                  $InsertQuery = " INSERT INTO `users_tb`
                   (`UserId`, `UserName`, `UserEmail`, `UserPassword`, `UserCode`) 
                   VALUES (NULL, '$UserName', '$UserEmail', '$UserPassword', '0')";
                  $CheckQuery = mysqli_query($con, $InsertQuery);
              
                  if ($CheckQuery) {
                       $sql = "SELECT * FROM users_tb WHERE UserEmail = '$UserEmail'";
                       $run_Sql = mysqli_query($con, $sql);
                        $fetch_info = mysqli_fetch_assoc($run_Sql);
                    $_SESSION['name'] = $UserName;
                    $_SESSION['id'] =  $fetch_info['UserId'];
                    $_SESSION['email'] = $UserEmail;
                    $_SESSION['password'] = $UserPassword;
                    $_SESSION['type'] = 'Barber';
                    header("location: Admin.php");
                  } else {
                    $errors['db-error'] = "Failed while inserting data into database!";
                  }
                }
              }



      //if user click change password button
if (isset($_POST['change-password'])) {
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if ($password !== $cpassword) {
            $errors['password'] = "Confirm Password does't matched.";
        } else {
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $password = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users_tb SET UserCode = $code, UserPassword = '$password' WHERE UserEmail = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if ($run_query) {
              $_SESSION['email'] = $email;
              $_SESSION['type'] = 'Barber';
              $_SESSION['password'] = $password;
                header('Location: Admin.php');
            } else {
                $errors['db-error'] = "Failed to change your password!";
            }
        }
      }

      if (isset($_POST['submitSkillForm'])) {
  
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $strength = mysqli_real_escape_string($con, $_POST['strength']);
       
        
        $Query = "INSERT INTO `skills_tb`
         (`id`, `title`, `strength`) 
         VALUES (NULL, '$title', '$strength')";
        $data_check = mysqli_query($con, $Query);
      
        if ($data_check) {
          $success['success'] = "Record is successfuly Saved.! "; 
        } else
        {
          $errors['db'] = "Failed while inserting data into database!"; 
        }
            
          
      }

      if (isset($_POST['submitEditSkillForm'])) {
  
        // Sanitize inputs to prevent SQL injection
          $id = mysqli_real_escape_string($con, $_POST['id']);
          $title = mysqli_real_escape_string($con, $_POST['title']);
          $strength = mysqli_real_escape_string($con, $_POST['strength']);
          
          // SQL Query to update the record in the database based on the id
          $Query = "UPDATE `skills_tb` 
                    SET `title` = '$title', `strength` = '$strength'
                    WHERE `id` = $id";
          
          // Execute the query
          $data_check = mysqli_query($con, $Query);
          
          if ($data_check) {
            // Success alert
            echo "<script>alert('Record successfully updated!');</script>";
          } else {
              // Error alert
              echo "<script>alert('Failed while updating the record in the database!');</script>";
          }
      }

      if (isset($_POST['submitRoleForm'])) {
  
        $title = mysqli_real_escape_string($con, $_POST['title']);
        
        $Query = "INSERT INTO `roles_tb`
         (`id`, `title`) 
         VALUES (NULL, '$title')";
        $data_check = mysqli_query($con, $Query);
      
        if ($data_check) {
          $success['success'] = "Record is successfuly Saved.! "; 
        } else
        {
          $errors['db'] = "Failed while inserting data into database!"; 
        }
            
          
      }

      if (isset($_POST['submitServicesForm'])) {
  
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        
        $Query = "INSERT INTO `services_tb`
         (`id`, `title`, `description`) 
         VALUES (NULL, '$title', '$description')";
        $data_check = mysqli_query($con, $Query);
      
        if ($data_check) {
          $success['success'] = "Record is successfuly Saved.! "; 
        } else
        {
          $errors['db'] = "Failed while inserting data into database!"; 
        }
            
          
      }

      if (isset($_POST['submitEditServiceForm'])) {
  
        // Sanitize inputs to prevent SQL injection
          $id = mysqli_real_escape_string($con, $_POST['id']);
          $title = mysqli_real_escape_string($con, $_POST['title']);
          $description = mysqli_real_escape_string($con, $_POST['description']);
          
          // SQL Query to update the record in the database based on the id
          $Query = "UPDATE `services_tb` 
                    SET `title` = '$title', `description` = '$description'
                    WHERE `id` = $id";
          
          // Execute the query
          $data_check = mysqli_query($con, $Query);
          
          if ($data_check) {
            // Success alert
            echo "<script>alert('Record successfully updated!');</script>";
          } else {
              // Error alert
              echo "<script>alert('Failed while updating the record in the database!');</script>";
          }
      }

      if (isset($_GET['serviceId'])) {
        $id = $_GET['serviceId'];
      
        $sql = "DELETE FROM services_tb  WHERE id = $id ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $sql = " select * from services_tb";
            header('Location: Admin.php?PageName=ManageServices');
        } else {
            echo '<script> alert("Failed to Delete this record.!"); </script>';
        }
      }

      if (isset($_POST['submitProjectForm'])) {
  
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        
        $Query = "INSERT INTO `projects_tb`
         (`id`, `title`, `description`) 
         VALUES (NULL, '$title', '$description')";
        $data_check = mysqli_query($con, $Query);
      
        if ($data_check) {
          $success['success'] = "Record is successfuly Saved.! "; 
        } else
        {
          $errors['db'] = "Failed while inserting data into database!"; 
        }
            
          
      }

      if (isset($_POST['submitEditProjectForm'])) {
  
        // Sanitize inputs to prevent SQL injection
          $id = mysqli_real_escape_string($con, $_POST['id']);
          $title = mysqli_real_escape_string($con, $_POST['title']);
          $description = mysqli_real_escape_string($con, $_POST['description']);
          
          // SQL Query to update the record in the database based on the id
          $Query = "UPDATE `projects_tb` 
                    SET `title` = '$title', `description` = '$description'
                    WHERE `id` = $id";
          
          // Execute the query
          $data_check = mysqli_query($con, $Query);
          
          if ($data_check) {
            // Success alert
            echo "<script>alert('Record successfully updated!');</script>";
          } else {
              // Error alert
              echo "<script>alert('Failed while updating the record in the database!');</script>";
          }
      }

      if (isset($_POST['submitEditAboutForm'])) {
  
        // Sanitize inputs to prevent SQL injection
          $id = mysqli_real_escape_string($con, $_POST['id']);
          $about_text = mysqli_real_escape_string($con, $_POST['about_text']);
          $about_projects = mysqli_real_escape_string($con, $_POST['about_projects']);
          
          // SQL Query to update the record in the database based on the id
          $Query = "UPDATE `about_tb` 
                    SET `about_text` = '$about_text', `about_projects` = '$about_projects'
                    WHERE `id` = $id";
          
          // Execute the query
          $data_check = mysqli_query($con, $Query);
          
          if ($data_check) {
            // Success alert
            echo "<script>alert('Record successfully updated!');</script>";
          } else {
              // Error alert
              echo "<script>alert('Failed while updating the record in the database!');</script>";
          }
      }

      if (isset($_GET['projectId'])) {
        $id = $_GET['projectId'];
      
        $sql = "DELETE FROM projects_tb  WHERE id = $id ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $sql = " select * from projects_tb";
            header('Location: Admin.php?PageName=ManageProjects');
        } else {
            echo '<script> alert("Failed to Delete this record.!"); </script>';
        }
      }

      if (isset($_POST['submitEditRoleForm'])) {
  
        // Sanitize inputs to prevent SQL injection
          $id = mysqli_real_escape_string($con, $_POST['id']);
          $title = mysqli_real_escape_string($con, $_POST['title']);
          
          // SQL Query to update the record in the database based on the id
          $Query = "UPDATE `roles_tb` 
                    SET `title` = '$title'
                    WHERE `id` = $id";
          
          // Execute the query
          $data_check = mysqli_query($con, $Query);
          
          if ($data_check) {
            // Success alert
            echo "<script>alert('Record successfully updated!');</script>";
          } else {
              // Error alert
              echo "<script>alert('Failed while updating the record in the database!');</script>";
          }
      }

      if (isset($_POST['submitEditEducationForm'])) {
          $id = mysqli_real_escape_string($con, $_POST['id']);
          $degree = mysqli_real_escape_string($con, $_POST['degree']);
          $institution = mysqli_real_escape_string($con, $_POST['institution']);
          $start_year = mysqli_real_escape_string($con, $_POST['start_year']);
          $end_year = mysqli_real_escape_string($con, $_POST['end_year']);

          $Query = "UPDATE `education_tb` 
                    SET `degree` = '$degree', `institution` = '$institution', `start_year` = '$start_year', `end_year` = '$end_year'
                    WHERE `id` = $id";

          $data_check = mysqli_query($con, $Query);
          
          if ($data_check) {
            echo "<script>alert('Record successfully updated!');</script>";
          } else {
              echo "<script>alert('Failed while updating the record in the database!');</script>";
          }
      }
    
      if (isset($_GET['skillId'])) {
        $id = $_GET['skillId'];
      
        $sql = "DELETE FROM skills_tb  WHERE id = $id ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $sql = " select * from client_tb";
            header('Location: Admin.php?PageName=ManageSkills');
        } else {
            echo '<script> alert("Failed to Delete this record.!"); </script>';
        }
      }

      if (isset($_GET['roleId'])) {
        $id = $_GET['roleId'];
      
        $sql = "DELETE FROM roles_tb  WHERE id = $id ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $sql = " select * from roles_tb";
            header('Location: Admin.php?PageName=ManageRole');
        } else {
            echo '<script> alert("Failed to Delete this record.!"); </script>';
        }
      }

      if (isset($_GET['educationId'])) {
        $id = $_GET['educationId'];
      
        $sql = "DELETE FROM education_tb  WHERE id = $id ";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $sql = " select * from education_tb";
            header('Location: Admin.php?PageName=ManageEducation');
        } else {
            echo '<script> alert("Failed to Delete this record.!"); </script>';
        }
      }

      if (isset($_POST['submitExperienceForm'])) {

        $position = mysqli_real_escape_string($con, $_POST['position']);
        $company = mysqli_real_escape_string($con, $_POST['company']);
        $years = mysqli_real_escape_string($con, $_POST['years']);
        $location = mysqli_real_escape_string($con, $_POST['location']);
        $descriptions = $_POST['description'];  // Handling the array of job responsibilities
        foreach ($descriptions as $description) {
           echo $description;
        }
        

        // Insert the experience details
        $Query = "INSERT INTO `experience_tb` (`id`, `position`, `company`, `years`, `location`) 
                  VALUES (NULL, '$position', '$company', '$years', '$location')";
        $data_check = mysqli_query($con, $Query);
    
        
        if ($data_check) {
            // Get the inserted experience ID
            $experienceId = mysqli_insert_id($con);
            foreach ($_POST['description'] as $sectionIndex => $responsibilities) {
              foreach ($responsibilities['responsibility'] as $responsibility) {
                  // Process each responsibility
                  $description = mysqli_real_escape_string($con, $responsibility);
    
                  $descQuery = "INSERT INTO `description_tb` (`id`, `experience_id`, `description`)
                              VALUES (NULL, '$experienceId', '$description')";
                   mysqli_query($con, $descQuery);
              }
          }
          echo '<script> alert(" Record  Is Successfully saved.!"); </script>';
        } else {
          echo '<script> alert("Failed while inserting data into database!"); </script>';
        }
    }

    if (isset($_POST['submitEditExperienceForm'])) {

      // Sanitize inputs to prevent SQL injection
      $id = mysqli_real_escape_string($con, $_POST['id']);
      $position = mysqli_real_escape_string($con, $_POST['position']);
      $company = mysqli_real_escape_string($con, $_POST['company']);
      $years = mysqli_real_escape_string($con, $_POST['years']);
      $location = mysqli_real_escape_string($con, $_POST['location']);
  
      // SQL Query to update the experience record in the database
      $Query = "UPDATE `experience_tb`
                SET `position` = '$position', `company` = '$company', `years` = '$years', `location` = '$location'
                WHERE `id` = $id";
  
      // Execute the query
      $data_check = mysqli_query($con, $Query);
  
      if ($data_check) {
          // Success alert
          echo "<script>alert('Experience successfully updated!');</script>";
      } else {
          // Error alert
          echo "<script>alert('Failed while updating the experience record in the database!');</script>";
      }
  }
  

    if (isset($_GET['experienceId'])) {
      $id = $_GET['experienceId'];
    
      // Delete the experience from the experience_tb table
      $sql = "DELETE FROM experience_tb WHERE id = $id";
      $result = mysqli_query($con, $sql);
      
      if ($result) {
          // If the deletion is successful, delete related responsibilities from description_tb
          $descSql = "DELETE FROM description_tb WHERE experience_id = $id";
          $descResult = mysqli_query($con, $descSql);
  
          if ($descResult) {
              // Redirect to the ManageExperience page
              header('Location: Admin.php?PageName=ManageExperience');
          } else {
              echo '<script> alert("Failed to delete associated responsibilities!"); </script>';
          }
      } else {
          echo '<script> alert("Failed to delete this experience!"); </script>';
      }
  }

  
      if (isset($_POST['submitEducationForm'])) {
          // Get form data
          $degree = mysqli_real_escape_string($con, $_POST['degree']);
          $institution = mysqli_real_escape_string($con, $_POST['institution']);
          $start_year = mysqli_real_escape_string($con, $_POST['start_year']);
          $end_year = mysqli_real_escape_string($con, $_POST['end_year']);

          // Insert new education data into the 'education_tb' table
          $sql = "INSERT INTO education_tb (degree, institution, start_year, end_year) 
                  VALUES ('$degree', '$institution', '$start_year', '$end_year')";
          
          // Execute the query and check if the insertion is successful
          if (mysqli_query($con, $sql)) {
              echo '<script> alert(" Record  Is Successfully saved.!"); </script>';
              header("Location: Admin.php?PageName=ManageEducation");
              exit();
          } else {
            echo '<script> alert("Failed while inserting data into database!"); </script>';
          }
      }

  
    
    


   
          function getClientIncome($clientId)
          {
           $barberId = getBarberId();
            $query = "SELECT * FROM client_tb WHERE  clientId = '$clientId'";
            $res = mysqli_query(  $GLOBALS['con'], $query);
            if (mysqli_num_rows($res) > 0) {
                $fetch = mysqli_fetch_assoc($res);
                return $fetch['clientIncome'];
              }
              return 0;
          }
          function getClientOrders($clientId)
          {
               $barberId = getBarberId();
            $query = "SELECT * FROM client_tb WHERE  clientId = '$clientId'";
            $res = mysqli_query(  $GLOBALS['con'], $query);
            if (mysqli_num_rows($res) > 0) {
                $fetch = mysqli_fetch_assoc($res);
                return $fetch['clientOrders'];
              }
              return 0;
          }
          function updateClientsDetail($clientId ,$charges){
             $income =   $charges + getClientIncome($clientId);
             $orders = getClientOrders($clientId)+1;
             $query = "UPDATE client_tb 
             SET clientIncome = $income ,  clientOrders = $orders
             WHERE clientId = $clientId";
             mysqli_query($GLOBALS['con'], $query);
          }
  
         
          if (isset($_GET['editAppointmentId'])) {
            $id = $_GET['editAppointmentId'];
             if(checkAlreadyCancel($id))
              {
                $sql = "update  appointment_tb set appointmentStatus = 'Cancel' WHERE appointmentId = $id ";
                $result = mysqli_query($con, $sql);
                if ($result) {
                  CancelAppointment($id);
                    header('Location: Admin.php?PageName=AppointmentListEdit');
                } else {
                    echo '<script> alert("Failed to update the Appointment Detail.!"); </script>';
                }
              }
              else
              echo '<script> alert("Appointment is already Canceled.!"); </script>';
         
          }
        function checkAlreadyCancel($id){
          $res = mysqli_query(  $GLOBALS['con'], "select * from appointment_tb where appointmentId = $id ");
          $fetch = mysqli_fetch_assoc($res);
          if($fetch['appointmentStatus'] == 'Cancel')
           return false;
           return true;
        }
         function CancelAppointment($appointmentId){
          $res = mysqli_query(  $GLOBALS['con'], "select * from appointment_tb where appointmentId = $appointmentId ");
          $fetch = mysqli_fetch_assoc($res);
          $clientId =  $fetch['clientId'];
          $appointmentCharges = $fetch['appointmentCharges'];
          $res = mysqli_query(  $GLOBALS['con'], "select * from client_tb where clientId = $clientId");
          $fetch = mysqli_fetch_assoc($res);
          $orders = $fetch['clientOrders'] - 1 ;
          $Charges = $fetch['clientIncome'] -  $appointmentCharges;
          mysqli_query($GLOBALS['con'], "update client_tb set clientOrders = $orders , clientIncome = $Charges where clientId = $clientId");
         }
         function getTodayEarning(){
         $barberId = getBarberId();
          $today = date("Y-m-d");
          $today = substr($today, -5);
          $res = mysqli_query(  $GLOBALS['con'], "SELECT sum(appointmentCharges) as todayEarning FROM client_tb , appointment_tb 
                                     WHERE client_tb.clientId = appointment_tb.clientId and client_tb.BarberId = $barberId and  appointment_tb.appointmentStatus = 'Active' and appointmentDate like '%$today'");
          $fetch = mysqli_fetch_assoc($res);
          return $fetch['todayEarning'];
         }
         function getTodayApp(){
          $barberId = getBarberId();
          date_default_timezone_set('Asia/Kuwait');
          $today = date("Y-m-d");
          $today = substr($today, -5);
          $res = mysqli_query(  $GLOBALS['con'], "SELECT count(appointmentId) as todayApp FROM client_tb , appointment_tb 
                                     WHERE client_tb.clientId = appointment_tb.clientId and client_tb.BarberId = $barberId and  appointment_tb.appointmentStatus = 'Active' and appointmentDate like '%$today'");
          $fetch = mysqli_fetch_assoc($res);
          return $fetch['todayApp'];
         }

         function getTotalClient(){
              $barberId =getBarberId();
          $res = mysqli_query(  $GLOBALS['con'], "SELECT COUNT(`clientId`) as totalClient FROM `client_tb` where barberId = $barberId;");
          $fetch = mysqli_fetch_assoc($res);
          return $fetch['totalClient'];
         }

         function getTotalApp(){
              $barberId = getBarberId();
          $res = mysqli_query(  $GLOBALS['con'], "SELECT count(appointmentId) as totalApp FROM client_tb , appointment_tb 
                                     WHERE client_tb.clientId = appointment_tb.clientId and client_tb.BarberId = $barberId ");
          $fetch = mysqli_fetch_assoc($res);
          return $fetch['totalApp'];
         }


         function getTotalCancelApp(){
              $barberId = getBarberId();
          $res = mysqli_query(  $GLOBALS['con'], "SELECT count(appointmentId) as cancelApp FROM client_tb , appointment_tb 
                                     WHERE client_tb.clientId = appointment_tb.clientId and client_tb.BarberId = $barberId and  appointment_tb.appointmentStatus = 'Cancel'");
          $fetch = mysqli_fetch_assoc($res);
          return $fetch['cancelApp'];
         }

         function getTotalEarning(){
          $barberId = getBarberId();
          $res = mysqli_query(  $GLOBALS['con'], "SELECT SUM(`clientIncome`) as totalEarning FROM `client_tb` where barberId = $barberId");
          $fetch = mysqli_fetch_assoc($res);
          return $fetch['totalEarning'];
         }
         function getBarberId(){
             return $_SESSION['id'];
         }
      
      
if (isset($_POST['submitMessageForm'])) {
    
    $UserEmail = mysqli_real_escape_string($con, $_POST['email']);
    $Subject = mysqli_real_escape_string($con, $_POST['subject']);
    $Message = mysqli_real_escape_string($con, $_POST['message']);
    $From = 'mmabubakar850@gmail.com';
    
            
      $retval = mail ($UserEmail,$Subject,$Message,$From);
       if( $retval == true ) 
       {
        echo " <script> alert('Your Message is successfuly sent.!');</script>";
        header('Location: index.php?PageName=Home');
        } 
    else {
      
      echo ' <script> alert(" UserEmail is not Valid!");</script>';
    }
      
}
         
         
         
?>

