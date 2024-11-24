
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="clearfix hidden-md-up"></div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            About Me
          </div>
          <div class="card-body text-center">
            <div class="d-flex flex-row m-2">
              <img src="assets/images/PK1.png" class='img-fluid' alt="" srcset="" style="height: 250px; width: 250px;">
              <p class='text-lead p-2'>
                <?php
                    $sql = "SELECT * FROM about_tb LIMIT 1";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                      if ($row = mysqli_fetch_assoc($result)) {
                        echo $row['about_text'];
                      }
                  }
                ?>
                <br><br>
                <span class='btn-light text-dark px-5 py-2 mt-2 text-center btn' data-bs-toggle="modal" data-bs-target="#editModal">Edit Details</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit About Me</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method='post' action="Admin.php?PageName=About">

          <input type="number" name='id' value="<?php echo $row['id']; ?>" hidden>
          <div class="mb-3">
            <label for="aboutText" class="form-label">About Text</label>
            <textarea class="form-control" id="about_text" name="about_text" rows="5">
            <?php

                    $sql = "SELECT * FROM about_tb LIMIT 1";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                      if ($row = mysqli_fetch_assoc($result)) {
                        echo $row['about_text'];
                      }
                  }
                ?>
            </textarea>
          </div>

          <div class="mb-3">
            <label for="aboutImage" class="form-label"> Projects completed</label>
            <input class="form-control" type="number" id="aboutImage" name='about_projects' value="<?php  echo $row['about_projects'];?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name='submitEditAboutForm'>Save Changes</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

<!-- Bootstrap JS + Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
  
</script>