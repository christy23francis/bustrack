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
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Search </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Vehicle Search</h4>
                    <hr>
                    <form class="forms-sample" action="vehicle_search_view.php" method="post" autocomplete="off">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Vehicle No</label>
                        <input list="vno" required class="form-control" name="vno" placeholder="Vehicle No">
                        <datalist id="vno">
                            <option value="">Select</option> 
                             <?php
                                $result = $db->prepare("select distinct(vno) from vehicle");
                                $result->execute();
                                for($i=0; $rows = $result->fetch(); $i++)
                                {
                                echo '<option>'.$rows['vno'].'</option>';
                                }
                            ?>	                                         					
                        </datalist>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2 pull-right"> Search </button>
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