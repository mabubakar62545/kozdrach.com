
 

        <div class="card m-3">
        <div class="card-header">
        <div class="container">
                                <div class="row">
                                        <div class="col-lg-4"> <h3>   Clients </h3></div>
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
                                       
                                        <th> Name</th>
                    <th> Email</th>
                    <th> Phone Number</th>
                    <th>Client Income</th>
                    <th>Client Orders</th>
                                             
                                         
                                                
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $barberId = $_SESSION['id'];
                                     $sql = " SELECT *  FROM client_tb where barberId =  $barberId";
                                        $result = mysqli_query($con, $sql);
                                        if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                        <tr>
                                                       
                                                        
                        

                                                        <td><?php echo $row['clientName'];
                            ?></td>
                        <td><?php echo $row['clientEmail'];
                                    ?></td>
                                    <td><?php echo $row['clientNumber'];
                                    ?></td>
                                    <td><?php echo $row['clientIncome'];
                                    ?></td>
                                     <td><?php echo $row['clientOrders'];
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