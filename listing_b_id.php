<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$OLog_Id=$_GET["OLog_Id"];
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
    	<?php		
		$result = $db->prepare("select distinct bname,vno,photo,Log_Id from vehicle where Log_Id='$OLog_Id'");
		$result->execute();
		for($i=0; $rows = $result->fetch(); $i++)
		{
		?>	
        <div class="col-md-4">
            <a href="bus-details.php<?php echo '?bname='.$rows["bname"]; ?>">
                <div class="card">
                    <div class="card-header">
                        BUS : <?php echo $rows["bname"];?>   BUS ID : <?php echo $rows["Log_Id"];?>
                    </div>
                    <div class="card-body">
                    <img src="app/photos/<?php echo $rows["photo"];?>" width="100%">
                    </div>
                    <div class="card-footer">
                      BUS NO :  <?php echo $rows["vno"];?>
                    </div>
                    <a href="payment_fisrt.php" class="btn btn-danger">Payment</a>
                </div>
            </a>
        </div>
        
        <?php }?>
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