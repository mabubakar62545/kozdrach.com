<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="clearfix hidden-md-up"></div>
            <div class="col-lg-4">
                <div class="card m-3">
                    <div class="card-header text-center">
                        <h4>Add New Role</h4>
                    </div>
                    <div class="table-responsive">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container"></div>
                            <form action="Admin.php?PageName=ManageRole" method="post" class="">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 form-group">
                                        <?php if (count($errors) > 0) { ?>
                                            <div class="alert alert-danger text-center p-2">
                                                <?php foreach ($errors as $showerror) {
                                                    echo $showerror;
                                                } ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (isset($success['success'])) { ?>
                                            <div class="alert alert-success text-center p-2">
                                                <?php echo $success['success']; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-1"></div>

                                    <div class="col-lg-3">
                                        <label for="">Title</label>
                                    </div>
                                    <div class="col-lg-8 form-group">
                                        <input type="text" name="title" id="title" placeholder="Account Executive" class="form-control" required>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-3 col-md-6 form-group text-center">
                                        <input class="form-control btn btn-dark" type="submit" name="submitRoleForm" value="Submit" required>
                                    </div>
                                    <div class="col-lg-3 col-md-6 form-group text-center">
                                        <input class="form-control btn btn-outline-danger" type="reset" value="Reset" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="col-lg-8">
                <div class="card m-3">
                    <div class="card-header">
                        <input type="text" class='form-control' placeholder="Search..." id="myInput">
                    </div>
                    <div class="table-responsive">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered text-center table-striped bg-dark">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                   
                                    $sql = "SELECT * FROM roles_tb";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                              
                                                <td align="center">
                                                    <!-- Edit button with modal trigger -->
                                                    <a title="Edit" href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <!-- Delete button with confirmation -->
                                                    <a title="Delete" href="#" class="btn btn-danger btn-xs" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal Structure -->
                                                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Skill</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="Admin.php?PageName=ManageRole" method="post">
                                                        
                                                        <input type="number" name='id' value="<?php echo $row['id']; ?>" hidden>
                                                        <div class="form-group">
                                                            <label for="skillTitle">Title</label>
                                                            <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name='submitEditRoleForm' class="btn btn-primary">Save changes</button>
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
                    <!-- /.card-body -->
                </div>

                <script>
                    // Add your script here
                </script>
            </div>
        </div>
    </div>
</section>

<script>
    function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = 'Admin.php?PageName=ManageRole&roleId=' + id;
    }
}
</script>