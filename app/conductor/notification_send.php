<?php
	include("auth.php");
	include('../../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_CONDUCTOR_ID'];
	$result = $db->prepare("select * from conductor where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$Log_Id=$rows["Log_Id"];
		$name=$rows["name"];
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
              <h3 class="page-title"> Message</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Message</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <form class="" action="action/notification_send.php" method="post" enctype="multipart/form-data" autocomplete="off">
                          <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label mb-10">Subject</label>
                                  <input type="hidden" value="<?php echo $Log_Id?>" name="Log_Id">
                                   <input type="hidden" value="<?php echo $photo?>" name="photo">
                                   <input type="hidden" value="<?php echo $name?>" name="name">
                                  <textarea name="subj" rows="1" class="form-control" required ></textarea>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="control-label mb-10">Descipton</label>
                                  <textarea name="dscp" rows="10" class="form-control" required ></textarea>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="col-md-12 text-center">
                                <input type="submit" value="Send" class="btn btn-primary pull-right">
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