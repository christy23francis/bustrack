<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
        include("include/css.php")
    ?>
</head>
<body class="bg-light">

<div class="osahan-listing">
    <div class="osahan-header-nav shadow-sm p-3 d-flex align-items-center bg-danger">
        <h5 class="font-weight-normal mb-0 text-white">
            <a class="text-danger" href="home.php"><i class="icofont-rounded-left"></i></a>
        </h5>
        <div class="ml-auto d-flex align-items-center">
            <a href="home.php" class="text-white h6 mb-0"><i class="icofont-search-1"></i></a>
            <a href="#" class="mx-4 text-white h6 mb-0"></a>
            <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive-sm">         
                	<a class="alert alert-danger" style="font-size: 20px; letter-spacing:3px; color:black">Noficiations</a> 
                    <table id="order-listing" class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
						$result = $db->prepare("select * from notification");
						$result->execute();
						for($i=1; $row = $result->fetch(); $i++)
						{	
						?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row["subj"];?></td>
                            <td><?php echo $row["dscp"];?></td>
                            <td><?php echo $row["date"];?></td>  
                          </tr>
                         <?php }?>
                        </tbody>
                      </table>
                    </div>
                   
            </div>
        </div>
    </div>


</div>

<?php
        include("include/sidebar.php")
    ?>
<?php
        include("include/js.php")
    ?>
</body>
</html>