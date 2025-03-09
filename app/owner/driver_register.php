<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_OWNER_ID'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
    include("include/css.php");
  ?>
  </head>
  <body>
    <div class="container-scroller">
    <?php
        include("include/sidebar.php");
    ?>
      <div class="container-fluid page-body-wrapper">
      <?php
        include("include/header.php");
      ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Driver</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Register </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-8  grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New Driver Register</h4>
                    <hr>
                    <form action="action/driver_register.php" method="post" enctype="multipart/form-data" autocomplete="off">
 										<div class="row">
 											<div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Name</label>
 													<input type="text" class="form-control" placeholder="Name" name="name" required pattern="[a-zA-Z]*">
 												</div>
 											</div>
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Age</label>
 													<input type="number" class="form-control" placeholder="Age" name="age" min="18" max="60" required>
 												</div>
 											</div>
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Gender</label>
 													<select class="form-control" name="sex" required>
                              <option value="">Select</option>
                              <option>Male</option>
                              <option>Female</option>
                              <option>Other</option>
                          </select>
 												</div>
 											</div>
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Location</label>
 													<input type="text" class="form-control" placeholder="Location" name="ulocation" required>
 												</div>
 											</div>
                                           
 											<div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Address</label>
 													<input type="text" class="form-control" placeholder="Address" name="addrs" required>
 												</div>
 											</div>
                                           
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Contact No</label>
 													<input type="text" class="form-control" placeholder="Contact No" name="cntno" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" >
 												</div>
 											</div>                                           
 											<div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">License No</label>
 													<input type="text" class="form-control" placeholder="License No" name="lno" required>
 												</div>
 											</div> 											
 											<div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">License Date</label>
 													<input type="date" class="form-control" placeholder="License Date" name="ldate" required max="<?php echo date("Y-m-d");?>">
 												</div>
 											</div>                                           
                      <div class="col-md-6">
 												<div class="form-group">
                         <label class="control-label mb-10">Bus</label>
 													<select class="form-control" name="vno" required>
                                                    	<option value="">Select</option>
                                                        <?php
															$result = $db->prepare("SELECT distinct(vno) FROM vehicle where Log_Id='$Log_Id'");
															$result->execute();
															$row_count =  $result->rowcount();
															for($i=0; $rows = $result->fetch(); $i++)
															{
															echo '<option>'.$rows['vno'].'</option>';
															}
														?>	 
                                                    </select>
 												</div>
 											</div>
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Email</label>
 													<input class="form-control" type="email" name="email" required  placeholder="Email">  
 												</div>
 											</div>
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Password</label>
 													<input class="form-control" type="password" name="password" required maxlength="20" minlength="4"> 
 												</div>
 											</div>                                           	
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Photo</label>
 													<input class="form-control" name="photo" type="file" required accept=".png, .jpg, .jpeg">
 												</div>
 											</div>
 											<div class="clearfix"></div>
 											<div class="col-md-12 text-center">
 												<input type="submit" value="Register" class="btn btn-primary pull-right">
 											</div>
 										</div>
 									</form>
                  </div>
                </div>
              </div>
              
              
            </div>
          </div>
          <?php
            include("include/footer.php");
          ?>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php
        include("include/js.php");
    ?>
  </body>
</html>