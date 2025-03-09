<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_OWNER_ID'];
	$name=$_POST["name"];
	$result = $db->prepare("select * from driver where name='$name' and  OLog_Id='$Log_Id'");
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
		$photo=$rows["photo"];
		$bassign=$rows["bassign"];
		$status=$rows["status"];
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
              <h3 class="page-title"> Driver </h3>
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
                          <p><?php echo $addrs;?>  </p>
                          
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
                            <span class="float-left"> Age </span>
                            <span class="float-right text-muted"><?php echo $age;?> </span>
                          </p>    
                           <p class="clearfix">
                            <span class="float-left"> Address </span>
                            <span class="float-right text-muted"><?php echo $addrs;?> </span>
                          </p> 
                           <p class="clearfix">
                            <span class="float-left"> Assign Bus </span>
                            <span class="float-right text-muted"><?php echo $bassign;?> </span>
                          </p>   
                           <p class="clearfix">
                            <span class="float-left"> System Access </span>
                            <span class="float-right text-muted"><?php echo strtoupper($status);?> </span>
                          </p>                       
                          <br>
                          <form method="get" action="action/driver_assign.php" autocomplete="off">
                            <div class="form-group">
                            	<input type="hidden" name="DLog_Id" value="<?php echo $DLog_Id;?>">
                                <label class="control-label mb-10">Bus</label>
                                <input list="vno" required class="form-control" name="vno" placeholder="Vehicle No">
                                    <datalist id="vno">
                                        <option value="">Select</option> 
                                         <?php
                                            $result = $db->prepare("select distinct(vno) from  vehicle where Log_Id='$Log_Id'");
                                            $result->execute();
                                            for($i=0; $rows = $result->fetch(); $i++)
                                            {
                                            echo '<option>'.$rows['vno'].'</option>';
                                            }
                                        ?>	                                         					
                                    </datalist>                               
                              </div>
                              <input type="submit" value="Assign" class="btn btn-danger">
                              <a href="action/driver_block.php?DLog_Id=<?php echo $DLog_Id;?>" class="btn btn-warning">Block</a>
                          </form>
                          
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
                              <h6> Vehicle No <?php echo $bassign;?></h6>
                              <img src="../photos/<?php echo $vphoto;?>" alt="sample" class="rounded mw-100" />                              
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