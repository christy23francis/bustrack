<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
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
              <h3 class="page-title">Owner</h3>
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
                    <h4 class="card-title">New Vehicle Owner Register</h4>
                    <form class="" action="action/owner_register.php" method="post" enctype="multipart/form-data" autocomplete="off">
                      <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label mb-10">Aadhar No</label>
                            <input type="text" class="form-control" placeholder="Aadhar No" name="aadharno" required maxlength="12" minlength="12">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label mb-10">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required pattern="[a-zA-Z]*">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label mb-10">Age</label>
                            <input type="number" class="form-control" placeholder="Age" name="age" min="18" max="80" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label mb-10">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Phone Number" name="cntno" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
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
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label mb-10">Address</label>
                            <textarea class="form-control" placeholder="Address" rows="5"   name="addrs" required></textarea>
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
                            <label class="control-label mb-10">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                          </div>
                        </div>									
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label mb-10">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required minlength="4" maxlength="15">
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