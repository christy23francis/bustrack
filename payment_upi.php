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
	$amt=$_GET["amt"];
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
                <form action="payment_trasfered.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="padding: 10px;">
                                <label class="control-label mb-10">Name</label>
                                <input type="text" name="cname" class="form-control" value="<?php echo $name;?>">
                                <label class="control-label mb-10">Phone</label>
                                <input type="text" name="ccntno" class="form-control" value="<?php echo $cntno;?>">
                                <label class="control-label mb-10">Amount</label>
                                <input type="number" class="form-control" name="amt" value="<?php echo $amt;?>">
                                <label class="control-label mb-10">UPI ID</label>
                                <input type="text" class="form-control" name="amt" maxlength="6" minlength="6">
                                <br>
                                <input type="submit" value="Pay" class="btn btn-danger  btn-block">
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