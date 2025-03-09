<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_CONDUCTOR_ID'];
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
                  <li class="breadcrumb-item active" aria-current="page"> Payment </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Payment</h4>
                    <hr>
                    <form class="forms-sample" action="report_payment_view.php" method="post">
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label mb-10">From</label>
                              <input type="date" class="form-control" name="fdate" required max="<?php echo date("Y-m-d");?>">
                            </div>
                          </div>
                          <div class="col-md-6">
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