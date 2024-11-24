<?php
require('UserControllerData.php');
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$user = $_SESSION['type'];
//if user not admin than gotoback page
if ($email != false && $password != false && $user == "Barber") {
  $sql = "SELECT * FROM users_tb WHERE UserEmail = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
  }
} else {
  echo "<script>   window.history.back(); </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/d6ef7f2f5c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i> </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      Brand Logo
      <a href="Admin.php" class="brand-link">
        <img src="assets/images/PK1.png" alt="Logo" class="brand-image img-circle elevation-3" >
        <span class="brand-text ">
          <h5>Patrycja Kozdrach </h5>
        </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <h5> <?php echo $_SESSION['name'];?> </h5>
          </div>
        </div> -->



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              
               <!-- <li class="nav-item">
              <a href="Admin.php?PageName=Profile" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Manage About
                </p>
              </a>
            </li> -->
            <li class="nav-header">MANAGE</li>

            <li class="nav-item">
              <a href="Admin.php?PageName=ManageRole" class="nav-link">
              <i class="fas fa-user-shield px-2"></i>
                <p>
                 Roles 
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Admin.php?PageName=About" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
                <p class='px-2'>
                 About 
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Admin.php?PageName=ManageSkills" class="nav-link">
              <i class="fas fa-tools px-2"></i>
                <p>
                 Skills
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Admin.php?PageName=ManageExperience" class="nav-link">
              <i class="fas fa-briefcase px-2"></i>
                <p>
                 Experience
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Admin.php?PageName=ManageEducation" class="nav-link">
              <i class="fas fa-graduation-cap px-2"></i>
                <p>
                 Education
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Admin.php?PageName=ManageServices" class="nav-link">
              <i class="fas fa-cogs px-2"></i>
                <p>
                 Services
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="Admin.php?PageName=ManageProjects" class="nav-link">
              <i class="fas fa-tasks px-2"></i>
                <p>
                 Projects
                </p>
              </a>
            </li>
          

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>
                Blogs
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <p>Add New Blog </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <p>Edit Blog </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <p>Blogs List </p>
                  </a>
                </li>

              </ul>
            </li>



            <li class="nav-header">ACCOUNT SETTINGS</li>
            <li class="nav-item">
              <a href="Admin.php?PageName=Profile" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  View Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Admin.php?PageName=UpdateProfile" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Update Profile
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="Logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-2">
      <!-- Php Pages -->
      <?php

      $PagesDirectory = 'AdminPagesFolder';
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
        include($PagesDirectory . '/Landing.php');
      }
      ?>
      <!--End Php Pages-->

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script>

    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    $("body").on("click", "#btnExport", function() {
                html2canvas($('table')[0], {
                    onrendered: function(canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Report.pdf");
                    }
                });
            });
  </script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

</body>

</html>