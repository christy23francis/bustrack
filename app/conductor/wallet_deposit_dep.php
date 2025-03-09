<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_CONDUCTOR_ID'];
	$waltid=$_POST["waltid"];
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
              <h3 class="page-title">Wallet</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Deposit </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-6  grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Wallet Deposit</h4>
                    <hr>
                    	<form action="action/wallet_deposit.php" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="row">                                       	
                      			<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10">Desposit</label>
                                        <input name="waltid" type="hidden" value="<?php echo $waltid;?>"  />
										<input class="form-control" name="amt" type="number" required />
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-12 text-center">
									<input type="submit" value="Submit" class="btn btn-primary pull-right">
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