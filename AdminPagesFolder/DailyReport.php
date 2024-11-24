<?php
     $barberId = $_SESSION['id'];
     $selectDate = $_SESSION['Date'];
     $sql = " SELECT * FROM client_tb , appointment_tb 
     WHERE client_tb.clientId = appointment_tb.clientId and client_tb.BarberId = $barberId and appointment_tb.appointmentDate ='%$selectDate'";
?>
 

        <div class="card m-3">
                <div class="card-header">
                        <div class="container">
                                <div class="row">
                                        <div class="col-lg-12 p-2 text-center"> <h3> Daily Report</h3></div>
                                     
                                        <div class="col-lg-12">
                                        <input type="date" class='form-control col-lg-5 ' placeholder="Select Day" id="">
                                        <input type="submit" class='btn btn-info col-lg-2 m-2' value='Search' id="">
                                        </div>
                                </div>
                        </div>
                       
                          
                       
                       
                </div>
                <div class="table-responsive">
                <!-- /.card-header -->
                <div class="card-body">
                        <table id="myTable" class="table table-bordered  text-center table-striped bg-dark">
                                <thead>
                                    <tr>
                                        <th colspan='2'>
                                             Appointments
                                        </th>
                                        <th>
                                          5
                                        </th>
                                        <th colspan='2'>
                                             Income
                                        </th>
                                        <th>
                                            300$
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan='6' class='h3'>
                                            Appointments Detail
                                        </th>
                    
                                        
                                    </tr>
                                        <tr>
                                       
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Hair Cut</th>
                    <th>Appointment Status</th>
                    
                                             
                                         
                                                
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                
                                        $result = mysqli_query($con, $sql);
                                        if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                        <tr>
                                                       
                                                        
                        <td><?php echo $row['clientName'];
                            ?></td>
                                                    <td><?php echo $row['clientEmail'];
                            ?></td>
                        <td><?php echo $row['appointmentDate'];
                                    ?></td>
                                    <td><?php echo $row['appointmentTime'];
                                    ?></td>
                                     <td><?php echo $row['clientHairCut'];
                                    ?></td>
                                      
                                     <td>
 <strong><?php if ($row['appointmentStatus']== 'Active')
 {
?>

<i class="fa fa-check " aria-hidden="true" ></i>


<?php
 }
 else
 {
        ?>
     <i class="fa fa-times" aria-hidden="true"></i>
        <?php     
 }
                                    ?>
</td>
                                   
                                                        </tr>
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

</script>