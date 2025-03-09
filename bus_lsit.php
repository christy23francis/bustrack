<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$location=$_GET["location"];
	
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
        <div class="col-md-4 well">
        <h5 class="alert alert-danger">Route <?php echo $location;?></h5>
        <table class="table-bordered table">
            <thead>
                <tr>
                <th>#</th>
                <th>Bus</th>
                <th>Start</th>
                <th>Time</th>
                <th>Return</th>
                <th>Time</th>
                </tr>
                 <?php
                    $result = $db->prepare("select * from stops where stop='$location'");
                    $result->execute();
                    for($i=1; $rows = $result->fetch(); $i++)
                    {
                    ?>
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $rows["bname"];?></td>
                        <td><?php echo $rows["stop"];?></td>
                        <td><?php echo $rows["time"];?></td>											
                      </tr>
                     <?php
                    }
                     ?> 
            </thead>
        </table>
        <iframe class="map" style="width:100%; height:350px;" src="https://maps.google.com/maps?q=<?php echo $location;?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>  
        <a href="home.php" class="btn btn-block btn-danger">Back</a>     
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