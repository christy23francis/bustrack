<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_OWNER_ID'];
	
	$vno=$_GET["vno"];
	$result = $db->prepare("select * from vehicle where vno='$vno'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$photo=$rows["photo"];
		$bname=$rows["bname"];
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
      <div class="container-fluid page-body-wrapper">
      <?php
        include("include/header.php");
      ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Bus</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Time </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12  grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New Stop Register</h4>
                    <hr>
                    <form action="action/bustime_register.php" method="get" enctype="multipart/form-data" autocomplete="off">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label mb-10">Stop</label>
									<input type="hidden" name="Log_Id" value="<?php echo $Log_Id;?>">
                  <input type="hidden" name="vno" value="<?php echo $vno;?>">
                  <input type="hidden" name="bname" value="<?php echo $bname;?>">
                  <input type="text" class="form-control" placeholder="Location" name="stop" required>
								</div>
							</div>							
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label mb-10" style="color:red">Time (H:M:AM/PM)</label>
									<input type="text" class="form-control" name="time" required>
								</div>
							</div>
              <div class="col-md-3">
								<div class="form-group">
									<label class="control-label mb-10">Distance from Start</label>
									<input type="text" class="form-control" name="distance" required>
								</div>
							</div>
              <!-- <div class="col-md-3">
								<div class="form-group">
									<label class="control-label mb-10" style="color:red">Time (H:M:AM/PM)</label>
									<input type="text" class="form-control" name="rtrn" required>
								</div>
							</div> -->
							<div class="clearfix"></div>
							<div class="col-md-3 text-center d-flex justify-content-end align-items-center">
								<input type="submit" value="Register" class="btn btn-primary pull-right">
							</div>
						</div>
					</form>
					<hr>
					<table class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Stop</th>
                            <th>Time</th>
                            <th>Distance from Start</th>
                            <!-- <th>Time</th> -->
							<th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
						$result = $db->prepare("select * from stops where vno='$vno' and OLog_Id='$Log_Id'");
						$result->execute();
						for($i=1; $rows = $result->fetch(); $i++)
						{
							$bus_tid = $rows['bus_tid'];	
						?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $rows["stop"];?></td>
                            <td><?php echo $rows["time"];?></td>
                            <td><?php echo $rows["distance"];?></td>
                            <td>
                              <a href="action/btime_remove.php<?php echo '?bus_tid='.$bus_tid; ?>" class="btn btn-warning">Remove</a>
                            </td>
                          </tr>
                         <?php
						}
						 ?> 
                        </tbody>
                      </table>
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