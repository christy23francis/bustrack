<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id = $_SESSION['SESS_PASSENGER_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("include/css.php"); ?>
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
		$result = $db->prepare("SELECT DISTINCT bname, vno FROM stops LIMIT 4");
		$result->execute();
		while ($rows = $result->fetch()) {
		?>	
        <div class="col-md-4">
            <a href="bus-details.php<?php echo '?bname=' . urlencode($rows["bname"]); ?>">
                <div class="card">
                    <div class="card-header">
                        BUS : <?php echo htmlspecialchars($rows["bname"], ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                    <div class="card-body">
                        <img src="app/photos/<?php echo htmlspecialchars($rows["bname"], ENT_QUOTES, 'UTF-8'); ?>.jpg" width="100%" onerror="this.src='default-bus.png';">
                    </div>
                    <div class="card-footer">
                      BUS NO :  <?php echo htmlspecialchars($rows["vno"], ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>

<?php
    include("include/sidebar.php");
    include("include/js.php");
?>
</body>
</html>
