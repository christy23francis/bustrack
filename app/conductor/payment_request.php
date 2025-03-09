<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_CONDUCTOR_ID'];
	$result = $db->prepare("select * from conductor where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$vno=$rows["vno"];
	}
	$result = $db->prepare("select * from vehicle where vno='$vno'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
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
        <!-- Side Bar Start -->
          <?php
            include("include/sidebar.php");
          ?>
       <!-- Side Bar End -->
      <div class="container-fluid page-body-wrapper">
        
       <!-- Side Bar Start -->
       <?php
            include("include/header.php");
          ?>
       <!-- Side Bar End -->

        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard template.</span>
              </h3>
            </div>
            
            <div class="row">
              <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Payment Request</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-light">
                          <tr>
                          	<th>Sl No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php							
						$tot=0;	
						$result = $db->prepare("select * from  payment where bname='$bname' and status='Pending'");
						$result->execute();
						for($i=1; $rows = $result->fetch(); $i++)
						{
							$tot=$tot+$rows["amt"];
							$wlt_id = $rows['wlt_id'];	
						?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $rows["cname"];?></td>
                            <td><?php echo $rows["ccntno"];?></td>
                            <td><?php echo $rows["date"];?></td>
                            <td><?php echo $rows["frm"];?></td>
                            <td><?php echo $rows["retrun"];?></td>
                            <td><?php echo $rows["tme"];?></td>                           
                            <td><?php echo $rows["amt"];?></td>
                            <td>
                              <a href="action/payment_accept_p.php<?php echo '?wlt_id='.$wlt_id; ?>" class="btn btn-success">Accept</a>
                            </td>                           
                          </tr>
                         <?php
						}
						 ?> 
                         <tr>
                        	<th colspan="7">Total</th>
                            <th colspan="2"><?php echo $tot;?></th>
                        </tr>
                        </tbody>
                      </table>
                    </div>                   
                  </div>
                </div>
              </div>
          
            </div>
            
            
            
            
          
          </div>
          <!-- Footer Start -->
            <?php
              include("include/footer.php");
            ?>
          <!-- Footer End -->
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