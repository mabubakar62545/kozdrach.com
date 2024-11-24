
 

        <div class="card m-3">
                <div class="card-header">
                        <div class="container">
                                <div class="row">
                                        <div class="col-lg-4"> <h3> Cancel  Appointments </h3></div>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">  <input type="button" id="btnExport" value="    Export As PDF" class="btn btn-success form-control" /></div>
                                        <div class="col-lg-12 p-2">
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
                                       
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th>Hair Cut</th>
                    <th>Hair Charges</th>
                   
                    
                                             
                                         
                                                
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                     $barberId = $_SESSION['id'];
                                     $sql = " SELECT * FROM client_tb , appointment_tb 
                                     WHERE client_tb.clientId = appointment_tb.clientId and client_tb.BarberId = $barberId and  appointment_tb.appointmentStatus = 'Active'";
                                        $result = mysqli_query($con, $sql);
                                        if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                        <tr>
                                                       
                                                        
                        <td><?php echo $row['clientName'];
                            ?></td>
                                                    <td><?php echo $row['clientEmail'];
                            ?>
                                     <td><?php echo $row['clientHairCut'];
                                    ?></td>
                                    <td><?php echo $row['appointmentCharges'];
                                    ?></td>
                                      
                                    

                                   
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