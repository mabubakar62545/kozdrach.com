<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-info elevation-1">
            <i class="nav-icon fas fa-users"></i>
          </span>
          <a href="Admin.php?PageName=ClientStatistics" class="text-light">
            <div class="info-box-content">
              <span class="info-box-text">Happy Customers</span>
              <span class="info-box-number">
                
                <?php echo 50; ?>
              </span>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
          </span>
          <a href="Admin.php?PageName=Appointments" class="text-light">
            <div class="info-box-content">
              <span class="info-box-text">Projects</span>
              <span class="info-box-number">
                <?php echo 55; ?>
              </span>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1">
            <i class="fa fa-list-alt" aria-hidden="true"></i>
          </span>
          <a href="Admin.php?PageName=CancelAppointment" class="text-light">
            <div class="info-box-content">
              <span class="info-box-text">Services</span>
              <span class="info-box-number">
                <?php echo 6; ?>
              </span>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1">
            <i class="fa fa-usd" aria-hidden="true"></i>
          </span>
          <a href="Admin.php?PageName=Earnings" class="text-light">
            <div class="info-box-content">
              <span class="info-box-text">Blogs</span>
              <span class="info-box-number">
                <?php echo 3; ?>
              </span>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title"> My Roles</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-bordered text-center table-striped bg-dark m-0">
                <tbody>
                  <?php
                    $barberId = $_SESSION["id"];
                    $sql = "SELECT * FROM roles_tb";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        
                        $title = $row["title"];
                        echo "<tr><td>$title</td></tr>";
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">My Skill Set</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table id="myTable" class="table text-center table-striped bg-dark">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Strength</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $barberId = $_SESSION["id"];
                    $sql = "SELECT * FROM skills_tb";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                            <td><?php echo $row["title"]; ?></td>
                            <td><?php echo $row["strength"]; ?></td>
                          </tr>
                        <?php
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
