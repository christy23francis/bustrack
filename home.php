<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$result = $db->prepare("select * from passenger where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$homphoto=$rows["photo"];
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

<div class="osahan-verification padding-bt">
    <div class="p-3 shadow bg-danger danger-nav osahan-home-header">
        <div class="font-weight-normal mb-0 d-flex align-items-center">
            <img src="img/logo.png" class="img-fluid osahan-nav-logo">
            <div class="ml-auto d-flex align-items-center">
                <a href="profile.php" class="mr-3"><img src="app/photos/<?php echo $homphoto;?>" class="img-fluid rounded-circle"></a>
                <a class="toggle osahan-toggle h4 m-0 text-white ml-auto" href="#"><i class="icofont-navigation-menu"></i></a>
            </div>
        </div>
    </div>

    <div class="bg-danger px-3 py-4">
        <div class="bg-white rounded-1 p-3">
            <form action="listing.php" method="get">
                <div class="form-group border-bottom pb-2">
                    <label class="mb-2"><span class="icofont-search-map text-danger"></span> From</label><br>
                    <select class="js-example-basic-single form-control" name="from" id="from-dropdown" required>
                        <option value="">Select</option>
                        <?php
                            $result = $db->prepare("SELECT DISTINCT stop FROM stops");
                            $result->execute();
                            while ($rows = $result->fetch()) {
                                echo '<option value="' . $rows['stop'] . '">' . $rows['stop'] . '</option>';
                            }
                        ?>	 
                    </select>
                </div>
                <div class="form-group border-bottom pb-2">
                    <label class="mb-2"><span class="icofont-search-map text-danger"></span> To</label><br>
                    <select class="js-example-basic-single form-control" name="to" id="to-dropdown" required disabled>
                        <option value="">Select</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger btn-block osahanbus-btn rounded-1">Search</button>
            </form>

            <!-- <hr> -->
            <!-- <form action="listing_b.php" method="get">
                <div class="form-group border-bottom pb-2">
                    <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-search-map text-danger"></span> Bus</label><br>
                    <select class="js-example-basic-single form-control" name="bname" required>
                        <option value="">Select</option>
				 		<?php
							$result = $db->prepare("SELECT distinct(bname) FROM stops");
							$result->execute();
							$row_count =  $result->rowcount();
							for($i=0; $rows = $result->fetch(); $i++)
							{
							echo '<option>'.$rows['bname'].'</option>';
							}
						?>	 
                    </select>
                </div>
                <button type="submit" class="btn btn-danger btn-block osahanbus-btn rounded-1">Search</button>
            </form> -->
             <!-- <hr> -->
            <!-- <form action="listing_b_id.php" method="get">
                <div class="form-group border-bottom pb-2">
                    <label for="exampleFormControlSelect1" class="mb-2"><span class="icofont-search-map text-danger"></span> BUS ID</label><br>                   <select class="js-example-basic-single form-control" name="OLog_Id" required>
                        <option value="">Select</option>
				 		<?php
							$result = $db->prepare("SELECT distinct(Log_Id) FROM vehicle");
							$result->execute();
							for($i=0; $rows = $result->fetch(); $i++)
							{
							echo '<option>'.$rows['Log_Id'].'</option>';
							}
						?>	 
                    </select>               
                </div>
                <button type="submit" class="btn btn-danger btn-block osahanbus-btn rounded-1">Search</button>
            </form> -->
        </div>
    </div>

    <div class="p-3 bg-warning">
        <div class="row m-0">
            <?php		
			$result = $db->prepare("select * from vehicle");
			$result->execute();
			for($i=0; $rows = $result->fetch(); $i++)
			{
			?>	
            <div class="col-6 py-1 pr-1 pl-0">
                <div class="p-3 bg-white shadow-sm rounded-1">
                    <img class="img-fluid" src="app/photos/<?php echo $rows["photo"];?>" alt>
                    <p class="mb-0 mt-4 font-weight-bold"><?php echo $rows["bname"];?></p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>

    <!-- <div class="p-3">
        <h6 class="text-center">Bus Discounts For You</h6>
        <div class="row m-0">
            <div class="col-6 py-1 pr-1 pl-0">
                <a href="#">
                <img class="img-fluid rounded-1 shadow-sm" src="img/offer3.jpg" alt>
                </a>
            </div>
            <div class="col-6 py-1 pl-1 pr-0">
                <a href="#">
                <img class="img-fluid rounded-1 shadow-sm" src="img/offer4.jpg" alt>
                </a>
            </div>
        </div>
    </div> -->
</div>

<div class="fixed-bottom p-3">
    <div class="footer-menu row m-0 bg-danger shadow rounded-2">
        <div class="col-4 p-0 text-center">
            <a href="home.php" class="home text-white active">
            <span class="icofont-ui-home h5"></span>
            <p class="mb-0 small">Home</p>
            </a>
        </div>

        <!-- <div class="col-3 p-0 text-center">
            <a href="payment_fisrt.php" class="home text-white">
            <span class="icofont-ticket h5"></span>
            <p class="mb-0 small">Payment</p>
            </a>
        </div> -->
        <div class="col-4 p-0 text-center">
            <a href="wallet.php" class="home text-white">
            <span class="icofont-wallet h5"></span>
            <!-- <small class="osahan-n">4</small> -->
            <p class="mb-0 small">Wallet</p>
            </a>
        </div>
        <div class="col-4 p-0 text-center">
            <a href="profile.php" class="home text-white">
            <span class="icofont-user h5"></span>
            <p class="mb-0 small">Account</p>
            </a>
        </div>
    </div>
</div>

<?php
        include("include/sidebar.php")
    ?>
<?php
        include("include/js.php")
    ?>
<script>
    $(document).ready(function () {
    $("#from-dropdown").change(function () {
        var fromStop = $(this).val();

        if (fromStop) {
            $("#to-dropdown").prop("disabled", false);

            $.ajax({
                url: "action/fetch_to_stops.php", // Create this PHP file
                type: "POST",
                data: { from: fromStop },
                success: function (response) {
                    $("#to-dropdown").html(response);
                }
            });
        } else {
            $("#to-dropdown").prop("disabled", true);
            $("#to-dropdown").html('<option value="">Select</option>');
        }
    });
});

</script>
</body>
</html>