<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
	$result = $db->prepare("select * from admin where Log_Id='$Log_Id'");
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
                        <div class="text-center pb-4">
                          <img src="../photos/<?php echo $photo;?>" alt="profile" class="img-lg rounded-circle mb-3" />                     
                        </div><center>
                          <a href="profile_update.php"><input type="submit" value="Update" class="btn btn-danger"></a>
                          </center></div>
                      <div class="col-lg-8">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h3><?php echo $name;?></h3>                            
                          </div>
                          <div>                           
                          </div>
                        </div>
                        
                        <br>
                        <div class="profile-feed well">
                         <form action="action/profile_update.php" method="post" enctype="multipart/form-data" autocomplete="off">
 										<!-- <div class="row"> -->
 											<div class="col-md-6">
                        <div class="form-group">
                           <p class="clearfix">
                              <span class="float-left">Age</span>
                              <span class="float-right text-muted">
                                <?php echo $age;?>
                              </span>
                            </p>
                          </div>
                        </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                           <p class="clearfix">
                              <span class="float-left">Gender</span>
                              <span class="float-right text-muted">
                                <?php echo $sex;?>
                              </span>
                            </p>
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="form-group">
                            <p class="clearfix">
                               <span class="float-left">Location</span>
                               <span class="float-right text-muted">
                                 <?php echo $ulocation;?>
                               </span>
                             </p>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <p class="clearfix">
                                 <span class="float-left">Address</span>
                                 <span class="float-right text-muted">
                                   <?php echo $addrs;?>
                                 </span>
                               </p>
 												</div>
 											</div>
                                           
                      <div class="col-md-6">
 												<div class="form-group">
                         <p class="clearfix">
                                 <span class="float-left">Contact No</span>
                                 <span class="float-right text-muted">
                                   <?php echo $cntno;?>
                                 </span>
                               </p>
                              </div>
                            </div>                                           
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <p class="clearfix">
                                        <span class="float-left">Email</span>
                                        <span class="float-right text-muted">
                                          <?php echo $email;?>
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