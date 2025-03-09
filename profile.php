<?php
	include("auth.php");
	include('db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	$result = $db->prepare("select * from passenger where Log_Id='$Log_Id'");
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++)
	{
		$name=$rows["name"];
		$age=$rows["age"];
		$sex=$rows["sex"];
		$addr=$rows["addr"];
		$cntno=$rows["cntno"];
		$email=$rows["email"];
		$password=$rows["password"];
		$ulocation=$rows["ulocation"];
		$photo=$rows["photo"];
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
        <div class="col-md-4" style="padding: 30px;">
            <hr>
                Profile Update
            <hr>
            <form action="action/profile_update.php" method="post" enctype="multipart/form-data">
                <div class="d-flex justify-content-center rounded-2 mb-4">
                <div class="form-profile w-100">
                <div class="text-center mb-3 position-relative">
                <div class="position-absolute edit-bt">
                <label for="upload-photo" class="mb-0"><span class="icofont-pencil-alt-5 text-white"></span></label>
                <input type="file" name="photo" id="upload-photo"  accept=".png, .jpg, .jpeg"/>
                </div>
                <img src="app/photos/<?php echo $photo;?>" class="rounded-2" width="100%">
                </div>
                <div class="form-group">
                <label class="text-muted f-10 mb-1">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>" required pattern="[a-zA-Z]*">
                </div>
                <div class="form-group">
                <label class="text-muted f-10 mb-1">Age</label>
                <input type="number" class="form-control" name="age" value="<?php echo $age;?>" min="15" max="100" required>
                </div>
                <div class="form-group">
                <label class="text-muted f-10 mb-1">Gender</label>
                <select name="sex" class="form-control" required>
                	<option><?php echo $sex;?></option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Transgender</option>
                </select>
                </div>
                <div class="form-group">
                <label class="text-muted f-10 mb-1">Contact</label>
                <input type="text" class="form-control" name="cntno" value="<?php echo $cntno;?>" required pattern="[0-9]{10,10}" maxlength="10" minlength="10">
                </div>
                <div class="form-group">
                <label class="text-muted f-10 mb-1">Location</label>
                <input type="text" class="form-control" name="ulocation" value="<?php echo $ulocation;?>" required>
                </div>
                 <div class="form-group">
                <label class="text-muted f-10 mb-1">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email;?>" required>
                </div>
                 <div class="form-group">
                <label class="text-muted f-10 mb-1">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password;?>" required minlength="5" maxlength="15">
                </div>
                <div class="form-group">
                <label class="text-muted f-10 mb-1">Address</label>
                <textarea class="form-control" name="addr" required><?php echo $addr;?></textarea>
                </div>
                <div class="mb-5">
                	<input type="submit" class="btn btn-danger btn-block osahanbus-btn rounded-1" value="UPDATE PROFILE">
                </div>
                </div>
                </div>
            </form>
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