<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
	$vno=$_POST["vno"];
	$result = $db->prepare("select * from vehicle where vno='$vno'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$VLog_Id=$rows["Log_Id"];
		$vno=$rows["vno"];
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
		$bname=$rows["bname"];
		
		
	}
	$result = $db->prepare("select * from owner where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$ophoto=$rows["photo"];
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
              <h3 class="page-title"> Vehicle </h3>
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
                          <p><?php echo $oname;?> </p>
                          
                        </div>
                      
                        
                        <div class="py-4">
                          <p class="clearfix">
                            <span class="float-left"> Name </span>
                            <span class="float-right text-muted"> <?php echo $oname;?> </span>
                          </p>
                           <p class="clearfix">
                            <span class="float-left"> Age </span>
                            <span class="float-right text-muted"> <?php echo $oage;?> </span>
                          </p>
                           <p class="clearfix">
                            <span class="float-left"> Gender </span>
                            <span class="float-right text-muted"> <?php echo $osex;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Phone </span>
                            <span class="float-right text-muted"> <?php echo $ocntno;?> </span>
                          </p>
                          <p class="clearfix">
                            <span class="float-left"> Location </span>
                            <span class="float-right text-muted"><?php echo $ulocation;?> </span>
                          </p>                          
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
                              <!-- <h6> Willie Stanley </h6> -->
                              <img src="../photos/<?php echo $photo;?>" alt="sample" class="rounded mw-100" width="200px" height="200px" />
                              
                            </div>
                          </div>
                          <hr>
                          <h3>Update Vehicle </h3>
                            <hr>
                          <form action="action/vehicle_update.php" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Vehicle No</label>
                                  <input type="text" class="form-control" placeholder="Vehicle No" name="vno" value="<?php echo $vno?>" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Name</label>
                                  <input type="text" class="form-control" placeholder="Name" name="bname" value="<?php echo $bname?>" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Vehicle Type</label>
                                  <select class="form-control" name="vtype" required>
                                    <option><?php echo $vtype?></option>
                                      <option>Two</option>
                                      <option>Three</option>
                                      <option>Four</option>
                                      <option>Heavy</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Engine Chase No</label>
                                  <input type="text" class="form-control" placeholder="Engine Chase No" name="engno" value="<?php echo $engno?>"  required>
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Vehicle Model</label>
                                  <input type="text" class="form-control" placeholder="Vehicle Model" name="vmdl" value="<?php echo $vmdl?>"  required>
                                </div>
                              </div>                                           
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Vehicle Color</label>
                                  <input type="text" class="form-control" placeholder="Vehicle Color" name="vcolor" value="<?php echo $vcolor?>"  required>
                                </div>
                              </div> 											
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Company</label>
                                  <input type="text" class="form-control" placeholder="Company" name="cmpny" value="<?php echo $cmpny?>"  required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Test Date</label>
                                  <input class="form-control" type="date" placeholder="Test Date" name="tdate" value="<?php echo $tdate?>"  required min="<?php echo date("Y-m-d");?>">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label mb-10">Owner Name</label>
                                  <select class="form-control" name="oname" id="oname" required>
                                        <option><?php echo $oname?></option>
                                        <?php
                                            $result = $db->prepare("SELECT distinct(name) FROM owner");
                                            $result->execute();
                                            for($i=0; $rows = $result->fetch(); $i++)
                                            {
                                            echo '<option>'.$rows['name'].'</option>';
                                            }
                                        ?>	 
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Owner Gender</label>
                                  <input type="hidden"  name="Log_Id" class="form-control" id="Log_Id" readonly>
                                  <input class="form-control" type="text" name="osex" value="<?php echo $osex?>" readonly id="osex" required>  
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Owner Age</label>
                                  <input class="form-control" type="text" name="oage" value="<?php echo $oage?>" readonly id="oage" required> 
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Owner Address</label>
                                  <input class="form-control" type="text" name="oaddrs" value="<?php echo $oaddrs?>" readonly id="oaddrs" required> 
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Owner Location</label>
                                  <input class="form-control" type="text" name="ulocation" value="<?php echo $ulocation?>" readonly id="ulocation" required> 
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Owner Contact No</label>
                                  <input class="form-control" type="text" name="ocntno" value="<?php echo $ocntno?>" readonly id="ocntno" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Registration Date</label>
                                  <input class="form-control" type="date" value="<?php echo $rdate?>" name="rdate" required max="<?php echo date("Y-m-d");?>"> 
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label mb-10">Photo</label>
                                  <input class="form-control" name="photo" type="file" required />
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-12 text-center">
                                <input type="submit" value="Update" class="btn btn-danger pull-right">
                              </div>
                            </div>
                          </form>

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
   <script type="text/javascript">
		$(document).ready(function()
		{
			$('#oname').change(function()
			{
				var oname = $("#oname").val();
				$.ajax({				
					type:'POST',
					url:'owner_select.php',
					data:'oname='+oname,	
					dataType:"JSON",			
					success:function(data)
					{
						
					   $('#Log_Id').val(data.Log_Id);  
					   $('#osex').val(data.osex); 
					   $('#oage').val(data.oage);
					   $('#oaddrs').val(data.oaddrs);   
					   $('#ocntno').val(data.ocntno);
					   $('#ulocation').val(data.ulocation);
					}				
				}); 						
			});			
		});
		</script>
  </body>
</html>