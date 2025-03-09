<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$Log_Id="BDRV".rand(987456321789,0);

	$name=$_POST["name"];
	$age=$_POST["age"];
	$sex=$_POST["sex"];
	$addrs=$_POST["addrs"];
	$cntno=$_POST["cntno"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$ulocation=$_POST["ulocation"];
	$aadharno=$_POST["aadharno"];
	
	
	$user_type="Owner";

	$date=date("Y-m-d");
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photos/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	 
	$sql = "insert into owner( Log_Id, aadharno, name, age, cntno, sex, addrs, ulocation, email, password, user_type, photo, date)values('$Log_Id','$aadharno','$name','$age','$cntno','$sex','$addrs','$ulocation','$email','$password','$user_type','$photo','$date')";
	$q1 = $db->prepare($sql);
	$q1->execute();		

	header("location:../owner_search.php");
?>
