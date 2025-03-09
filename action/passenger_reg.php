<?php
	include('../db_connect/db.php');
	
	$Log_Id="BDRV".rand(987456321789,0);
		
	$name=$_POST["name"];
	$age=$_POST["age"];
	$sex=$_POST["sex"];
	$addr=$_POST["addr"];
	$cntno=$_POST["cntno"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$cstatus="pending";
	$date=date("Y-m-d");
	
	$user_type="Passenger";
	
	$ulocation="Palakkad";
	
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../app/photos/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	
	
	$sql = "insert into passenger(Log_Id,name,age,sex,addr,cntno,photo,email,password,date,user_type,ulocation)values('$Log_Id','$name','$age','$sex','$addr','$cntno','$photo','$email','$password','$date','$user_type','$ulocation')";
	$q1 = $db->prepare($sql);
	$q1->execute();		

	header("location:../signin.php");
?>

