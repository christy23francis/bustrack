<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_ADMIN_ID'];
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
              <h3 class="page-title">Vehicle</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Register </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-8  grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">New Vehicle Register</h4>
                    <form action="action/vehicle_register.php" method="post" enctype="multipart/form-data" autocomplete="off">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Vehicle No</label>
									<input type="text" class="form-control" placeholder="Vehicle No" name="vno" required>
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Bus Name</label>
									<input type="text" class="form-control" placeholder="Name" name="bname" required>
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Route: Stop 1</label>
									<input type="text" class="form-control" placeholder="Start" name="rstart" required>
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Route: Stop 2</label>
									<input type="text" class="form-control" placeholder="Stop" name="rstop" required>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Vehicle Type</label>
									<select class="form-control" name="vtype" required>
										<option value="">Select</option>											
											<option>Private</option>
                                            <option>Public</option>
										</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Engine Chase No</label>
									<input type="text" class="form-control" placeholder="Engine Chase No" name="engno" required>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Vehicle Model</label>
									<input type="text" class="form-control" placeholder="Vehicle Model" name="vmdl" required>
								</div>
							</div>                                           
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Vehicle Color</label>
									<input type="text" class="form-control" placeholder="Vehicle Color" name="vcolor" required>
								</div>
							</div> 											
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Company</label>
									<input type="text" class="form-control" placeholder="Company" name="cmpny" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Test Date</label>
									<input class="form-control" type="date" placeholder="Test Date" name="tdate" required min="<?php echo date("Y-m-d");?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label mb-10">Owner Name</label>
									<select class="form-control" name="oname" id="oname" required>
                                        <option value="">Select</option>
                                        <?php
                                            $result = $db->prepare("SELECT distinct(name) FROM owner");
                                            $result->execute();
                                            $row_count =  $result->rowcount();
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
									<input class="form-control" type="text" name="osex" readonly id="osex" required>  
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Owner Age</label>
									<input class="form-control" type="text" name="oage" readonly id="oage" required> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Owner Address</label>
									<input class="form-control" type="text" name="oaddrs" readonly id="oaddrs" required> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Owner Location</label>
									<input class="form-control" type="text" name="ulocation" readonly id="ulocation" required> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Owner Contact No</label>
									<input class="form-control" type="text" name="ocntno" readonly id="ocntno" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label mb-10">Registration Date</label>
									<input class="form-control" type="date" placeholder="Registration Date" name="rdate" required max="<?php echo date("Y-m-d");?>"> 
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
								<input type="submit" value="Register" class="btn btn-primary pull-right">
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