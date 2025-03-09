<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
	$vno=$_GET["vno"];
	$result = $db->prepare("select * from vehicle where vno='$vno'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{		
		$vno=$rows["vno"];
		$bname=$rows["bname"];
		$vtype=$rows["vtype"];
		$engno=$rows["engno"];
		$vmdl=$rows["vmdl"];
		$vcolor=$rows["vcolor"];
		$cmpny=$rows["cmpny"];
		$tdate=$rows["tdate"];
		$oname=$rows["oname"];
		$osex=$rows["osex"];
		$oage=$rows["oage"];
		$oaddrs=$rows["oaddrs"];
		$ocntno=$rows["ocntno"];
		$rdate=$rows["rdate"];
		$photo=$rows["photo"];
		$ulocation=$rows["ulocation"];
		
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
              <h3 class="page-title"> Bus </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Route</li>
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
                          <p><?php echo $bname;?>  </p>
                          
                        </div>
                      
                        
                       <div class="py-4">
                          <p class="clearfix">
                            <span class="float-left"> Type </span>
                            <span class="float-right text-muted"> <?php echo $vtype;?> </span>
                          </p>
                           <p class="clearfix">
                            <span class="float-left"> Engine No </span>
                            <span class="float-right text-muted"> <?php echo $engno;?> </span>
                          </p>
                           <p class="clearfix">
                            <span class="float-left"> Model </span>
                            <span class="float-right text-muted"> <?php echo $vmdl;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Color </span>
                            <span class="float-right text-muted"> <?php echo $vcolor;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Company </span>
                            <span class="float-right text-muted"><?php echo $cmpny;?> </span>
                          </p>   
                          <p class="clearfix">
                            <span class="float-left"> Test Date </span>
                            <span class="float-right text-muted"><?php echo $tdate;?> </span>
                          </p>                         
                        </div>
                       

                      </div>
                      <div class="col-lg-8">
                        <div class="d-flex justify-content-between">
                          <div>
                            <h3>Bus Rote Information</h3>
                            <hr>
                          </div>
                        </div>
                        
                        <div class="profile-feed">

                          <div class="row">
                            <div class="col-md-12">
                            <h5 class="alert alert-danger">Route Timiing</h5>
                              <table class="table table-hover table-bordered">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Stop</th>
                                    <th>Time</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                $result = $db->prepare("select * from stops where vno='$vno'");
                                $result->execute();
                                for($i=1; $rows = $result->fetch(); $i++)
                                {
                                    $bus_tid = $rows['bus_tid'];	
                                ?>
                                  <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $rows["stop"];?></td>
                                    <td><?php echo $rows["time"];?></td>                                   
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