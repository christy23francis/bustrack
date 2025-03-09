<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_CONDUCTOR_ID'];
	$waltid=$_POST["waltid"];
	$result = $db->prepare("select * from wallet where waltid='$waltid'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$DLog_Id=$rows["Log_Id"];
		$name=$rows["name"];
		$age=$rows["age"];
		$sex=$rows["sex"];
		$addr=$rows["addr"];
		$cntno=$rows["cntno"];
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
              <h3 class="page-title"> Wallet </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Card</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="border-bottom text-center pb-4">
                          <img src="../photos/<?php echo $photo;?>" alt="profile" class="img-lg rounded-circle mb-3" />
                         	<table class="table table-bordered">
                            	<tr>
                                	<td class="text-left">
                                    	Travell Id 	
                                    </td>
                                    <td class="text-left">
                                    	<?php echo $Log_Id;?> 	
                                    </td>
                                </tr>
                                <tr>
                                	<td class="text-left">
                                    	Name 	
                                    </td>
                                    <td class="text-left">
                                    	<?php echo $name;?> 	
                                    </td>
                                </tr>
                            </table>
                        </div>
                      </div>
                      <div class="col-lg-6">
                      <img src="assets/images/qr/qr.png" width="100%"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
             <button class="btn btn-danger pull-right" onClick="window.print();">Print</button>
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