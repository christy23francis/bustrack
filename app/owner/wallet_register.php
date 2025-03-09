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
              <h3 class="page-title">Conductor</h3>
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
                    <h4 class="card-title">New Wallet Creation</h4>
                    <hr>
                    	<form action="action/wallet_create.php" method="post" enctype="multipart/form-data" autocomplete="off">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Phone No</label>
                                        <select class="form-control" name="cntno" id="cntno" required>
                                            <option value="">Select</option>
                                            <?php
                                                $result = $db->prepare("SELECT distinct(cntno) FROM passenger");
                                                $result->execute();
                                                $row_count =  $result->rowcount();
                                                for($i=0; $rows = $result->fetch(); $i++)
                                                {
                                                echo '<option>'.$rows['cntno'].'</option>';
                                                }
                                            ?>	 
                                        </select>
									</div>
								</div>
                      			<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Name</label>
                                        <input type="hidden"  name="Log_Id" class="form-control" id="Log_Id">
                                        <input type="hidden"  name="photo" class="form-control" id="photo">
										<input type="text" class="form-control" id="name" name="name" required pattern="[a-zA-Z]*">
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Age</label>                                       
										<input type="number" class="form-control" id="age" name="age" min="18" max="100" required>
									</div>
								</div>
                      			<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Gender</label>
										<input type="text" class="form-control" id="sex" name="sex" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Address</label>
										<input type="text" class="form-control" name="addrs" id="addr" required>
									</div>
								</div>                     			
                      			<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Email</label>
										<input class="form-control" type="email" name="email" id="email" required>  
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Wallet ID <i class="fas fa-id-card"></i></label>
										<input class="form-control" type="test" name="waltid" value="<?php echo rand(789872,2);?>" readonly> 
									</div>
								</div>                                           	
                      			<div class="col-md-6">
									<div class="form-group">
										<label class="control-label mb-10">Desposit</label>
										<input class="form-control" name="amt" type="number" required min="0" step="0.01" />
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-12 text-center">
									<input type="submit" value="Create" class="btn btn-primary pull-right">
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
			$('#cntno').change(function()
			{
				var cntno = $("#cntno").val();
				$.ajax({				
					type:'POST',
					url:'wallet_select.php',
					data:'cntno='+cntno,	
					dataType:"JSON",			
					success:function(data)
					{
					   $('#Log_Id').val(data.Log_Id);  
					   $('#name').val(data.name); 
					   $('#age').val(data.age);
					   $('#sex').val(data.sex);   
					   $('#addr').val(data.addr);
					   $('#email').val(data.email);
					   $('#photo').val(data.photo);
					}				
				}); 						
			});			
		});
		</script>
  </body>
</html>