<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_OWNER_ID'];
	$fdate=$_POST["fdate"];
	$tdate=$_POST["tdate"];	
	$bname=$_POST["bus"];	
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
      <!-- partial:../../partials/_sidebar.html -->
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
              <h3 class="page-title"> Report </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Concession</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card px-2">
                  <div class="card-body">
                    <div class="container-fluid">
                      <h3 class="text-right my-5">Invoice&nbsp;&nbsp;#INV-17</h3>
                      <hr>
                    </div>
                    <div class="container-fluid d-flex justify-content-between">
                      <div class="col-lg-3 ps-0">
                        <p class="mb-0 mt-5">From Date : <?php echo $fdate;?></p>
                        <p>To Date : <?php echo $tdate;?></p>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                      <div class="table-responsive w-100">
                        <table class="table">
                          <thead>
                            <tr class="bg-dark text-white">
                            	<th>Sl No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
						  $tot=0;	
							$result = $db->prepare("select * from  payment where date>='$fdate' and date<='$tdate' and bname='$bname' and status='Accept'");
							$result->execute();
							for($i=1; $rows = $result->fetch(); $i++)
							{
								$tot=$tot+$rows["amt"];
						  ?>
                            <tr class="text-right">
                             	 <td><?php echo $i;?></td>
                                <td><?php echo $rows["cname"];?></td>
                                <td><?php echo $rows["ccntno"];?></td>
                                <td><?php echo $rows["date"];?></td>
                                <td><?php echo $rows["frm"];?></td>
                                <td><?php echo $rows["retrun"];?></td>
                                <td><?php echo $rows["tme"];?></td>                           
                                <td><?php echo $rows["amt"];?></td>
                            </tr>
                           <?php }?> 
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="container-fluid mt-5 w-100">                     
                      <h4 class="text-right mb-5">Total : <?php echo $tot;?></h4>
                      <hr>
                    </div>
                    <div class="container-fluid w-100">
                      <a href="#" class="btn btn-primary float-right mt-4 ms-2" onClick="window.print()"><i class="mdi mdi-printer me-1"></i> Print</a>
                \    </div>
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