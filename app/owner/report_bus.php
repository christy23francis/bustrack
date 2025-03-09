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
              <h3 class="page-title">Report</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Bus </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bus</h4>
                    <hr>
                    <form class="forms-sample" action="report_bus_view.php" method="post">
                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label mb-10">Bus</label>
                              <select name="bus" class="form-control" required >
                                  <option value="">Select</option>
                                  <?php 
								  $result = $db->prepare("select * from vehicle where Log_Id='$Log_Id'");
									$result->execute();
									for($i=0; $rows = $result->fetch(); $i++)
									{
									?>
                                    	<option><?php echo $rows["bname"];?></option>
                                    <?php
									}
								  ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label mb-10">From</label>
                              <input type="date" class="form-control" name="fdate" required max="<?php echo date("Y-m-d");?>">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="control-label mb-10">To</label>
                               <input type="date" class="form-control" name="tdate" required max="<?php echo date("Y-m-d");?>">
                            </div>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2 pull-right"> Submit </button>
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