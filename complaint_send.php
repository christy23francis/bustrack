<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$result = $db->prepare("select * from passenger where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$name=$rows["name"];
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
            <hr>
                <form action="action/complaint.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="padding: 10px;">
                                <label class="control-label mb-10">Subject</label>
                                <input type="hidden"  name="name" value="<?php echo $name?>">
                                <input type="hidden"  name="Log_Id" value="<?php echo $Log_Id?>">                                
                                <input type="text" class="form-control" name="subj" required >
                                <label class="control-label mb-10">Complaint</label>
                                <textarea class="form-control" rows="5" name="descp" required ></textarea>
                                <label class="control-label mb-10">Complaint Date</label>
                                <input type="date" class="form-control" name="cdate" required max="<?php echo date("Y-m-d");?>">
                                <br>
                                <input type="submit" class="btn btn-primary  btn-block">
                            </div>
                        </div>
                    </div>
                </form>
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