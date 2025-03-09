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
            <hr>
                <form action="action/payment.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="padding: 10px;">
                                <label class="control-label mb-10">Bus</label>
                                <input type="hidden" name="cname" value="<?php echo $name;?>">
                                <input type="hidden" name="ccntno" value="<?php echo $cntno;?>">
                                <input type="hidden" name="Log_Id" value="<?php echo $Log_Id;?>">
                                 <input list="bname" required class="form-control" name="bname" placeholder="Name">
                                <datalist id="bname">
                                    <option value="">Select</option> 
                                     <?php
                                        $result = $db->prepare("select distinct(bname) from  vehicle");
                                        $result->execute();
                                        for($i=0; $rows = $result->fetch(); $i++)
                                        {
                                        echo '<option>'.$rows['bname'].'</option>';
                                        }
                                    ?>	                                         					
                                </datalist>
                                 <label class="control-label mb-10">From</label>
                                 <input list="frm" required class="form-control" name="frm" placeholder="Start">
                                <datalist id="frm">
                                    <option value="">Select</option> 
                                     <?php
                                        $result = $db->prepare("select distinct(stop) from stops");
                                        $result->execute();
                                        for($i=0; $rows = $result->fetch(); $i++)
                                        {
                                        echo '<option>'.$rows['stop'].'</option>';
                                        }
                                    ?>	                                         					
                                </datalist>
                                 <label class="control-label mb-10">To</label>
                                 <input list="retrun" required class="form-control" name="retrun" placeholder="Stop">
                                <datalist id="retrun">
                                    <option value="">Select</option> 
                                     <?php
                                        $result = $db->prepare("select distinct(stop) from  stops");
                                        $result->execute();
                                        for($i=0; $rows = $result->fetch(); $i++)
                                        {
                                        echo '<option>'.$rows['stop'].'</option>';
                                        }
                                    ?>	                                         					
                                </datalist>
                                <label class="control-label mb-10">Amount</label>
                                <input type="number" class="form-control" placeholder="Amount" name="amt" required min="0" step="0.01">
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
</body>
</html>