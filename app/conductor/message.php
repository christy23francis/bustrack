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
  <link rel="stylesheet" href="assets/vendors/datatable/dataTables.bootstrap4.css">
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
              <h3 class="page-title">Message</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Message </li>
                </ol>
              </nav>
            </div>
            <div class="row">
            
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Message</h4>
                    <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                         <?php
							$result = $db->prepare("select * from message where Log_Id='$Log_Id' and status='Pending'");
							$result->execute();
							for($i=1; $row = $result->fetch(); $i++)
							{
								$msg_id = $row['msg_id'];	
							?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row["subj"];?></td>
                            <td><?php echo $row["descp"];?></td>
                            <td><?php echo $row["data"];?></td>  
                            <td>
                             <button class="btn btn-outline-danger">Pedning</button>
                            
                            </td>                         
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/datatable/jquery.dataTables.js"></script>
   <script src="assets/vendors/datatable/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/data-table.js"></script>
  
  </body>
</html>