<style>
    .content {
        margin-top: 20px;
    }

    .card {
        margin-bottom: 20px;
    }

    .card-header {
        padding: 15px;
    }

    .table-responsive {
        max-height: 500px;
        overflow-y: auto;
    }

    table {
        width: 100%;
    }

    @media (max-width: 768px) {
        .col-lg-12 {
            padding-left: 15px;
            padding-right: 15px;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Form Column (Top) for Education -->
            <div class="col-lg-12 mb-4">
                <div class="card m-3">
                    <div class="card-header text-center">
                        <h4>Add New Education</h4>
                    </div>
                    <div class="card-body">
                        <form id="educationForm" action="Admin.php?PageName=ManageEducation" method="POST">
                            <!-- Dynamic Education Fields -->
                            <div id="educationFields">
                                <div class="education-entry">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="degree">Degree</label>
                                            <input type="text" name="degree" class="form-control" placeholder="M.S. Sound Engineering" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="institution">Institution</label>
                                            <input type="text" name="institution" class="form-control" placeholder="The Chopin University of Music, Warsaw" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="years">Start Year</label>
                                            <input type="number" name="start_year" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="years">End Year</label>
                                            <input type="text" name="end_year" class="form-control" value='Present'>
                                        </div>
                                    </div>

                                    <hr>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" name='submitEducationForm' class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Table Column (Full Screen) for Education -->
            <div class="col-lg-12">
                <div class="card m-3">
                    <div class="card-header">
                        <input type="text" class='form-control' placeholder="Search..." id="myInput">
                    </div>
                    <div class="table-responsive">
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered text-center table-striped bg-dark">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Degree</th>
                                        <th>Institution</th>
                                        <th>Start Year</th>
                                        <th>End Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to fetch education data from the database
                                    $sql = "SELECT * FROM education_tb";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                        
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['degree']; ?></td>
                                                <td><?php echo $row['institution']; ?></td>
                                                <td><?php echo $row['start_year']; ?></td>
                                                <td><?php echo $row['end_year']; ?></td>
                            
                                                <td align="center">
                                                    <a title="Edit" href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a title="Delete" href="#" class="btn btn-danger btn-xs" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal Structure for Education -->
                                            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Education</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="Admin.php?PageName=ManageEducation" method="post">
                                                            <input type="number" name='id' value="<?php echo $row['id']; ?>" hidden>
                                                            <div class="form-group">
                                                                <label for="degree">Degree</label>
                                                                <input type="text" class="form-control" name="degree" value="<?php echo $row['degree']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="institution">Institution</label>
                                                                <input type="text" class="form-control" name="institution" value="<?php echo $row['institution']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="years">Start Year</label>
                                                                <input type="number" class="form-control" name="start_year" value="<?php echo $row['start_year']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="years">End Year</label>
                                                                <input type="text" class="form-control" name="end_year" value="<?php echo $row['end_year']; ?>" required>
                                                            </div>
                                                          
                                                            <div class="modal-footer">
                                                                <button type="submit" name='submitEditEducationForm' class="btn btn-primary">Save changes</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = 'Admin.php?PageName=ManageEducation&educationId=' + id;
        }
    }

    let subjectCounter = 1; // Start at 1 because Subject 0 is predefined

    // Event listener to add a new subject section
    document.getElementById("addSubjectEntry").addEventListener

</script>