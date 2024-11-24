
 
<div class="container">
        <div class="row">
                <div class="col-lg-8">
                <div class="card m-3">
                <div class="card-header ">
                        <h3> Send Message To Client</h3>
                </div>
                <div class="table-responsive">
                <!-- /.card-header -->
                <div class="card-body">
<div class="container"></div>
                <form action='Admin.php?PageName=SendClientMessage&clientEmail=<?php echo $_GET["clientEmail"]?>' method="post" class="">
                <div class="row ">
                            <div class="col-lg-12 col-md-6  form-group">
                                <?php
                                if (count($errors) > 0) {
                                ?>
                                    <div class="alert alert-danger text-center p-2">
                                        <?php
                                        foreach ($errors as $showerror) {
                                            echo $showerror;
                                        }
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>

<?php
                                if (isset($success['success'])) {
                                ?>
                                    <div class="alert alert-success text-center p-2">
                                        <?php
                                        echo $success['success'];
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
<div class="row">
  
     

    
    <div class="col-lg-1">
    </div>
    <div class="col-lg-11  form-group">
         <input type="text" name="clientEmail" value='<?php echo $_GET["clientEmail"]?>' id="clientEmail"  hidden  class="form-control" required>
        <input type="email" value='<?php echo $_GET["clientEmail"]?>'    class="form-control" disabled required>
    </div>
   
   <div class="col-lg-1">
    </div>
    <div class="col-lg-11  form-group">
         <input type="text" name="Subject" placeholder='Enter Subject' id="Subject"   class="form-control" required>
      
    </div>
    
     <div class="col-lg-1">
    </div>
    <div class="col-lg-11  form-group">
        <textarea type="text" name="Message" placeholder='Enter Message' id="Message"   class="form-control" required rows="5"></textarea>
    </div>
</div>

<div class="row">
<div class="col-lg-1">
       </div>
    <div class="col-lg-3 col-md-6 form-group  text-center ">
        <input class="form-control btn btn-dark " type="submit"  name="submitMessageForm" value="Send" required>
    </div>
    <div class="col-lg-3 col-md-6 form-group  text-center ">
        <input class="form-control btn btn-outline-danger " type="reset" value="Reset" required>
    </div>
</div>

</form>
                </div>

                </div>
                </div>
                <!-- /.card-body -->
        </div>
       


                </div>
        </div>
</div>
