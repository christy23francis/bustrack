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
 											<div class="col-md-6">
 												<div class="form-group">
 													<label class="control-label mb-10">Name</label>
                                                    <input type="hidden" value="<?php echo $Log_Id;?>" name="Log_Id">
 													<input type="text" class="form-control" value="<?php echo $name;?>" name="name" required pattern="[a-zA-Z]*{ }">
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
 													<input class="form-control" name="photo" type="file" accept=".png, .jpg, .jpeg" required />
 												</div>
 											</div>
 											<div class="clearfix"></div>
 											<div class="col-md-12 text-center">
 												<input type="submit" value="Update" class="btn btn-danger pull-right">
                        <?php
                        if (isset($_POST['Update'])) {
                          $Log_Id = $_POST['Log_Id'];
                          $name = $_POST['name'];
                          $age = $_POST['age'];
                          $ulocation = $_POST['ulocation'];
                          $addrs = $_POST['addrs'];
                          $cntno = $_POST['cntno'];
                          $email = $_POST['email'];
                          $password = $_POST['password'];
                          $photo = $_FILES['photo']['name'];
                          $sql = "UPDATE admin SET name = '$name', age = '$age', ulocation = '$ulocation', addrs = '$addrs', cntno = '$cntno', email = '$email', password = '$password', photo = '$photo' WHERE Log_Id = '$Log_Id'";
                          $stmt = $pdo->prepare($sql);
                          if ($stmt->rowCount() > 0) {
                              echo "Profile updated successfully!";
                          } else {
                              echo "Error updating profile!";
                          
                     }
                    }
                        ?>
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