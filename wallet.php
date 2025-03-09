<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$result = $db->prepare("select * from wallet where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$amt=$rows["amt"];
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Wallet Balance
                </div>
                <div class="card-body">
                    <label class="alert alert-primary" style="width: 100%; font-size:40px;text-align:center; letter-spacing:4px; text-shadow:0px 2px 2px black;"> Rs <?php echo $amt;?></label>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Print" class="btn btn-block btn-info" onclick="window.print();">
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