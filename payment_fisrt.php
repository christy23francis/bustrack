<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$result = $db->prepare("select * from passenger where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$name=$rows["name"];
		$cntno=$rows["cntno"];
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" style="padding: 10px;">
                         <a href="payment.php" class="btn btn-info  btn-block">Pay Wallet</a>
                         <a href="payment_w.php" class="btn btn-primary  btn-block">Online Pay UPI</a>
                    </div>                            
                </div>
                <div class="col-md-12">
                	<a href="pay_qr.php" class="btn btn-warning  btn-block">Pay QR Code Scan</a>
                    <!-- <a href="pay_qr.php">
                        <img src="img/qr/qr.png" width="100%">
                    </a> -->
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
    <script>
        // jQuery code to update the textbox when the dropdown value changes
        $('#fare').change(function() 
		{			         
			<?php
				$amt=rand(30,15);
			?>
            $('#amt').val(<?php echo $amt+10;?>);   
        });
    </script>
    <script>
  $(document).ready(function() {
    $('#myLink').click(function(event) {
      event.preventDefault();  // Prevents the link from being followed
      alert('Link clicked, but no navigation happens!');
    });
  });
</script>
</body>
</html>