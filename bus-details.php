<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$bname=$_GET["bname"];
	$result = $db->prepare("select * from stops where bname='$bname'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$vno=$rows["vno"];
	}
	$result = $db->prepare("select * from conductor where bname='$bname'");
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
		$photo=$rows["photo"];
		$vno=$rows["vno"];
		$vtype=$rows["vtype"];
		$vmdl=$rows["vmdl"];
		$cmpny=$rows["cmpny"];
		$tdate=$rows["tdate"];
		$oname=$rows["oname"];
		$ocntno=$rows["ocntno"];
	}
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
        <div class="col-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                <div class="border-bottom text-center pb-4">
                    <img src="app/photos/<?php echo $photo;?>" class="img-lg rounded-circle mb-3" width="100%" />
                    <p><?php echo $bname;?> </p>
                    
                </div>
                
                
                <div class="py-4">
                    <p class="clearfix">
                    <span class="float-left"> Bus No </span>
                    <span class="float-right text-muted"> <?php echo $vno?> </span>
                    </p>
                    <p class="clearfix">
                    <span class="float-left"> Model </span>
                    <span class="float-right text-muted"> <?php echo $vno?> </span>
                    </p>
                    <p class="clearfix">
                    <span class="float-left"> Type </span>
                    <span class="float-right text-muted"> <?php echo $vtype?></span>
                    </p>
                     <p class="clearfix">
                    <span class="float-left"> Company </span>
                    <span class="float-right text-muted"> <?php echo $cmpny?> </span>
                    </p>
                    <p class="clearfix">
                    <span class="float-left"> Owner </span>
                    <span class="float-right text-muted">
                        <a href="#"><?php echo $oname?></a>
                    </span>
                    </p>
                    <p class="clearfix">
                    <span class="float-left"> Phone No </span>
                    <span class="float-right text-muted">
                        <a href="#"><?php echo $ocntno?></a>
                    </span>
                    </p>
                </div>
                

                </div>
                <div class="col-lg-8">
                <div class="d-flex justify-content-between">
                    <div>
                    <h3>Bus Route Information</h3>
                    <hr>
                    </div>
                </div>
                
                <div class="profile-feed">

                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="alert alert-danger">Route Timing</h5>
                            <table class="table-bordered table">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Stops</th>
                                    <th>Time</th>
                                    </tr>
                                     <?php
										$result = $db->prepare("select * from stops where vno='$vno'");
										$result->execute();
										for($i=1; $rows = $result->fetch(); $i++)
										{
										?>
										  <tr>
											<td><?php echo $i;?></td>
											<td><?php echo $rows["stop"];?></td>
											<td><?php echo $rows["time"];?></td>										
										  </tr>
										 <?php
										}
										 ?> 
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <a href="home.php" class="btn btn-block btn-danger">Back</a>
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

<?php
        include("include/sidebar.php")
    ?>
<?php
        include("include/js.php")
    ?>
</body>
</html>