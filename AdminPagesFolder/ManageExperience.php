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
    max-height: 500px; /* Adjust the height for the table */
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
            <!-- Form Column (Top) -->
            <div class="col-lg-12 mb-4">
                <div class="card m-3">
                    <div class="card-header text-center">
                        <h4>Add New Experience</h4>
                    </div>
                    <div class="card-body">
                        <form id="experienceForm" action="Admin.php?PageName=ManageExperience" method="POST">
                            <!-- Dynamic Experience Fields -->
                            <div id="experienceFields">
                                <div class="experience-entry">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="position">Position</label>
                                            <input type="text" name="position" class="form-control" placeholder="Call Center Agent" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="company">Company</label>
                                            <input type="text" name="company" class="form-control" placeholder="IPSOS S.A., Amsterdam" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="years">Years</label>
                                            <input type="text" name="years" class="form-control" placeholder="2016 - 2018" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="location">Location</label>
                                            <input type="text" name="location" class="form-control" placeholder="Amsterdam" required>
                                        </div>
                                    </div>

                                    <div id="responsibilityListContainer">
                                        <div class="form-group responsibility-entry" data-responsibility-id="0">
                                            <label for="description">Job Responsibilities</label>
                                            <ul class="list-group" id="descriptionList_0">
                                                <li class="list-group-item">
                                                    <div class="input-group">
                                                        <input type="text" name="description[0][responsibility][]" class="form-control" placeholder="Enter responsibility" required>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger removeResponsibility">Remove</button>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <button type="button" class="btn btn-success addResponsibility my-2" data-responsibility-id="0">Add More Responsibility</button>
                                
                                            <hr>
                                        </div>
                                    </div>

                        
                                    <hr>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" name='submitExperienceForm' class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Table Column (Full Screen) -->
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
                                        <th>Position</th>
                                        <th>Company</th>
                                        <th>Years</th>
                                        <th>Location</th>
                                        <th>Responsibilities</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Query to fetch experience data from the database
                                    $sql = "SELECT * FROM experience_tb";
                                    $result = mysqli_query($con, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $experienceId = $row['id'];
                                            
                                            // Query to fetch responsibilities for the current experience
                                            $descQuery = "SELECT description FROM description_tb WHERE experience_id = '$experienceId'";
                                            $descResult = mysqli_query($con, $descQuery);
                                            $responsibilities = [];
                                            
                                            // Fetching all responsibilities for this experience
                                            while ($descRow = mysqli_fetch_assoc($descResult)) {
                                                $responsibilities[] = $descRow['description'];
                                            }

                                            // Truncate responsibilities text
                                            $truncatedResponsibilities = implode("<br>", array_slice($responsibilities, 0, 1)); // Show only first 3 responsibilities
                                            $fullResponsibilities = implode("<br>", $responsibilities); // Full responsibilities
                                    ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['position']; ?></td>
                                                <td><?php echo $row['company']; ?></td>
                                                <td><?php echo $row['years']; ?></td>
                                                <td><?php echo $row['location']; ?></td>
                                                <td>
                                                    <span class="responsibilities-preview">
                                                        <?php echo $truncatedResponsibilities; ?>
                                                    </span>
                                                    <span class="responsibilities-full" style="display:none;">
                                                        <?php echo $fullResponsibilities; ?>
                                                    </span>
                                                    <a href="javascript:void(0)" class="read-more" onclick="toggleResponsibilities(this)">Read More</a>
                                                </td>
                                                <td align="center">
                                                    <a title="Edit" href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a title="Delete" href="#" class="btn btn-danger btn-xs" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal Structure -->
                                            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Experience</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="Admin.php?PageName=ManageExperience" method="post">
                                                            <input type="number" name='id' value="<?php echo $row['id']; ?>" hidden>
                                                            <div class="form-group">
                                                                <label for="position">Position</label>
                                                                <input type="text" class="form-control" name="position" value="<?php echo $row['position']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="company">Company</label>
                                                                <input type="text" class="form-control" name="company" value="<?php echo $row['company']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="years">Years</label>
                                                                <input type="text" class="form-control" name="years" value="<?php echo $row['years']; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>" required>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name='submitEditExperienceForm' class="btn btn-primary">Save changes</button>
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
        window.location.href = 'Admin.php?PageName=AddNewSkill&skillId=' + id;
    }
}

let responsibilityCounter = 1; // Start at 1 because Responsibility 0 is predefined

// Event listener to add a new responsibility section
document.getElementById("addResponsibilityEntry").addEventListener("click", function () {
    let newResponsibilityEntry = document.createElement("div");
    newResponsibilityEntry.classList.add("form-group", "responsibility-entry");
    newResponsibilityEntry.setAttribute("data-responsibility-id", responsibilityCounter);

    // Create the HTML for the new responsibility section
    newResponsibilityEntry.innerHTML = `
        <label for="description">Job Responsibilities</label>
        <ul class="list-group" id="descriptionList_${responsibilityCounter}">
            <li class="list-group-item">
                <div class="input-group">
                    <input type="text" name="description[${responsibilityCounter}][responsibility][]" class="form-control" placeholder="Enter responsibility" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger removeResponsibility">Remove</button>
                    </div>
                </div>
            </li>
        </ul>
        <button type="button" class="btn btn-success addResponsibility" data-responsibility-id="${responsibilityCounter}">Add More Responsibility</button>
        <button type="button" class="btn btn-danger removeResponsibilityEntry">Remove Responsibility Section</button>
        <hr>
    `;

    // Append the new responsibility entry to the container
    document.getElementById("responsibilityListContainer").appendChild(newResponsibilityEntry);

    // Add event listeners for adding more responsibilities and removing the section
    addResponsibilityEventListeners(responsibilityCounter);
    addRemoveResponsibilityEntryEventListener(newResponsibilityEntry);

    responsibilityCounter++; // Increment the counter for the next section
});

// Event listener to add more responsibilities within a section
function addResponsibilityEventListeners(responsibilityId) {
    document.querySelector(`[data-responsibility-id="${responsibilityId}"] .addResponsibility`).addEventListener("click", function () {
        let list = document.getElementById(`descriptionList_${responsibilityId}`);
        let newItem = document.createElement("li");
        newItem.classList.add("list-group-item");

        newItem.innerHTML = `
            <div class="input-group">
                <input type="text" name="description[${responsibilityId}][responsibility][]" class="form-control" placeholder="Enter responsibility" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger removeResponsibility">Remove</button>
                </div>
            </div>
        `;

        list.appendChild(newItem);

        // Attach event listener for removing the new responsibility
        newItem.querySelector(".removeResponsibility").addEventListener("click", function () {
            newItem.remove();
        });
    });

    // Attach event listener for removing existing responsibilities
    document.querySelectorAll(`[data-responsibility-id="${responsibilityId}"] .removeResponsibility`).forEach(function (button) {
        button.addEventListener("click", function () {
            this.closest("li").remove();
        });
    });
}

// Event listener to remove an entire responsibility section
function addRemoveResponsibilityEntryEventListener(responsibilityEntryElement) {
    responsibilityEntryElement.querySelector(".removeResponsibilityEntry").addEventListener("click", function () {
        responsibilityEntryElement.remove();
    });
}

// Initialize event listeners for the first responsibility section
addResponsibilityEventListeners(0);
addRemoveResponsibilityEntryEventListener(document.querySelector('.responsibility-entry[data-responsibility-id="0"]'));

function toggleResponsibilities(link) {
        const responsibilitiesPreview = link.closest('td').querySelector('.responsibilities-preview');
        const responsibilitiesFull = link.closest('td').querySelector('.responsibilities-full');
        
        if (responsibilitiesFull.style.display === 'none') {
            responsibilitiesFull.style.display = 'block';
            responsibilitiesPreview.style.display = 'none';
            link.textContent = 'Read Less';
        } else {
            responsibilitiesFull.style.display = 'none';
            responsibilitiesPreview.style.display = 'block';
            link.textContent = 'Read More';
        }
    }


    function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = 'Admin.php?PageName=ManageExperience&experienceId=' + id;
    }
}
</script>
