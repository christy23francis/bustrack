<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_CONDUCTOR_ID'];
	$result = $db->prepare("select * from conductor where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$name=$rows["name"];
		$age=$rows["age"];
		$sex=$rows["sex"];
		$addrs=$rows["addrs"];
		$cntno=$rows["cntno"];
		$email=$rows["email"];
		$password=$rows["password"];
		$ulocation=$rows["ulocation"];
		$photo=$rows["photo"];
		$bassign=$rows["bassign"];
		$ldate=$rows["ldate"];
		$vno=$rows["vno"];
		$lno=$rows["lno"];
	}
	$result = $db->prepare("select * from vehicle where vno='$bassign'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$vtype=$rows["vtype"];
		$vphoto=$rows["photo"];
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
              <h3 class="page-title"> Profile </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                          <p><?php echo $addrs;?></p>                         
                        </div>                      
                        <div class="border-bottom py-4">
                          <div class="d-flex mb-3">
                            <div class="progress progress-md flex-grow">
                              <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="progress progress-md flex-grow">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                        <div class="py-4">
                          <p class="clearfix">
                            <span class="float-left"> License No </span>
                            <span class="float-right text-muted"> <?php echo $lno;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> License Date </span>
                            <span class="float-right text-muted"> <?php echo $ldate;?></span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Vehicle No </span>
                            <span class="float-right text-muted"> <?php echo $vno;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Email </span>
                            <span class="float-right text-muted">
                              <a href="#"><?php echo $email;?></a>
                            </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Contact </span>
                            <span class="float-right text-muted">
                              <a href="#"><?php echo $cntno;?></a>
                            </span>
                          </p>
                        </div>
                        <button class="btn btn-primary btn-block">Preview</button>
                      </div>
                      <div class="col-lg-8">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h3><?php echo $name;?></h3>                            
                          </div>
                          <div>                           
                          </div>
                        </div>
                        <div class="mt-4 py-2 border-top border-bottom">
                          <ul class="nav profile-navbar">
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                Age <?php echo $age;?> </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link active" href="#">
                                Gender <?php echo $sex;?> </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                Location <?php echo $ulocation;?></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                 Bus <?php echo $bassign;?></a>
                            </li>
                          </ul>
                        </div>
                        <br>
                        <div class="profile-feed well">
                         <form action="action/profile_update.php" method="post" enctype="multipart/form-data" autocomplete="off">
 										<div class="row">
 											<div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Name</label>
                                                    <input type="hidden" value="<?php echo $Log_Id;?>" name="Log_Id">
 													<input type="text" class="form-control" value="<?php echo $name;?>" name="name" required pattern="[a-zA-Z]*">
 												</div>
 											</div>
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Age</label>
 													<input type="number" class="form-control" value="<?php echo $age;?>" name="age" min="18" max="80" required>
 												</div>
 											</div>
                     
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Location</label>
 													<input type="text" class="form-control" value="<?php echo $ulocation;?>" name="ulocation" required>
 												</div>
 											</div>
                                           
 											<div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Address</label>
 													<input type="text" class="form-control" value="<?php echo $addrs;?>" name="addrs" required>
 												</div>
 											</div>
                                           
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Contact No</label>
 													<input type="text" class="form-control" value="<?php echo $cntno;?>" name="cntno" required pattern="[0-9]{10,10}" maxlength="10" minlength="10" >
 												</div>
 											</div>                                           
 											
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Email</label>
 													<input class="form-control" type="email" name="email" required  value="<?php echo $email;?>">  
 												</div>
 											</div>
                      <div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Password</label>
 													<input class="form-control" type="password" name="password" value="<?php echo $password;?>" required maxlength="20" minlength="4"> 
 												</div>
 											</div>                                           	
                      <div class="col-md-6">
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