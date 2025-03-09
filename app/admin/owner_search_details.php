<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
	$aadharno=$_POST["aadharno"];
	$result = $db->prepare("select * from owner where aadharno='$aadharno'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$DLog_Id=$rows["Log_Id"];
		$name=$rows["name"];
		$age=$rows["age"];
		$sex=$rows["sex"];
		$addrs=$rows["addrs"];
		$cntno=$rows["cntno"];
		$email=$rows["email"];
		$password=$rows["password"];
		$ulocation=$rows["ulocation"];
		$aadharno=$rows["aadharno"];
		$photo=$rows["photo"];
		
	}
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
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
      
      <?php
        include("include/header.php");
      ?>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Owner </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Vehicle</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="border-bottom text-center pb-4">
                          <img src="../photos/<?php echo $photo;?>" alt="profile" class="img-lg rounded-circle mb-3" />
                          <p><?php echo $addrs;?> </p>
                          
                        </div>
                      
                        
                        <div class="py-4">
                          <p class="clearfix">
                            <span class="float-left"> Name </span>
                            <span class="float-right text-muted"> <?php echo $name;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Phone </span>
                            <span class="float-right text-muted"> <?php echo $cntno;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Mail </span>
                            <span class="float-right text-muted"><?php echo $email;?> </span>
                          </p>                          
                        </div>
                        <div class="row">
                            <div class="col-12  grid-margin">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Update Details</h4>
                                  <form class="" action="action/owner_update.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Aadhar No</label>
                                          <input type="hidden" value="<?php echo $DLog_Id;?>" name="Log_Id" required>
                                          <input type="text" class="form-control" value="<?php echo $aadharno;?>" name="aadharno" required>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Name</label>
                                          <input type="text" class="form-control" value="<?php echo $name;?>" name="name" required pattern="[a-zA-Z]*">
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Age</label>
                                          <input type="number" class="form-control" value="<?php echo $age;?>" name="age" min="18" max="80" required>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Phone Number</label>
                                          <input type="text" class="form-control" value="<?php echo $cntno;?>" name="cntno" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Gender</label>
                                          <select class="form-control" name="sex" required>
                                            <option><?php echo $sex;?></option>
                                              <option>Male</option>
                                              <option>Female</option>
                                              <option>Other</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Address</label>
                                          <textarea class="form-control" rows="5"   name="addrs" required><?php echo $addrs;?></textarea>
                                        </div>
                                      </div>                                           											
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Location</label>
                                          <input type="text" class="form-control" value="<?php echo $ulocation;?>"name="ulocation" required>
                                        </div>
                                      </div> 		
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Email</label>
                                          <input type="email" class="form-control" value="<?php echo $email;?>" name="email" required>
                                        </div>
                                      </div>									
                                  
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="control-label mb-10">Photo</label>
                                          <input class="form-control" name="photo" type="file" accept=".png, .jpg, .jpeg">
                                        </div>
                                      </div>
                                      <div class="clearfix"></div>
                                      <div class="col-md-12 text-center">
                                        <input type="submit" value="Update" class="btn btn-danger pull-right">
                                      </div>
                                  </div>
                                </form>
                                </div>
                              </div>
                            </div>
                            
                            
                          </div>

                      </div>
                      <div class="col-lg-8">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h3>Vehicle Details</h3>
                            <hr>
                          </div>
                        </div>
                        
                        <div class="profile-feed">
                          
                          <div class="d-flex align-items-start profile-feed-item">
                             <div class="ms-4">
                              <h6> Willie Stanley </h6>
                              <img src="assets/images/samples/1280x768/12.jpg" alt="sample" class="rounded mw-100" />
                              <p class="small text-muted mt-2 mb-0">
                                <span>
                                  <i class="mdi mdi-star me-1"></i>4 </span>
                                <span class="ms-2">
                                  <i class="mdi mdi-comment me-1"></i>11 </span>
                                <span class="ms-2">
                                  <i class="mdi mdi-reply"></i>
                                </span>
                              </p>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php
            include("include/footer.php");
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php
    include("include/js.php");
  ?>
  </body>
</html>