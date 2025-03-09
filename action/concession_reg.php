<?php
	include('../db_connect/db.php');
	
	$Log_Id="BDRV".rand(987456321789,0);
		
	$name=$_POST["name"];
	$age=$_POST["age"];
	$sex=$_POST["sex"];
	$addr=$_POST["addr"];
	$cntno=$_POST["cntno"];
	$clge=$_POST["clge"];	
	$email=$_POST["email"];
	$password=$_POST["password"];
	$cstatus="pending";
	$date=date("Y-m-d");
	
	$user_type="Student";
	
	$ulocation="Palakkad";
	
		
	$image = addslashes(file_get_contents($_FILES['aadhar']['tmp_name']));
	$image_name = addslashes($_FILES['aadhar']['name']);
	$image_size = getimagesize($_FILES['aadhar']['tmp_name']);
	move_uploaded_file($_FILES["aadhar"]["tmp_name"], "../app/photos/" . $_FILES["aadhar"]["name"]);
	$aadhar = $_FILES["aadhar"]["name"];
	
	$image = addslashes(file_get_contents($_FILES['idcrd']['tmp_name']));
	$image_name = addslashes($_FILES['idcrd']['name']);
	$image_size = getimagesize($_FILES['idcrd']['tmp_name']);
	move_uploaded_file($_FILES["idcrd"]["tmp_name"], "../app/photos/" . $_FILES["idcrd"]["name"]);
	$idcrd = $_FILES["idcrd"]["name"];
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../app/photos/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	
	$sql = "insert into concession(Log_Id,name,age,sex,addr,cntno,clge,aadhar,idcrd,photo,email,password,cstatus,date,user_type,ulocation)values('$Log_Id','$name','$age','$sex','$addr','$cntno','$clge','$aadhar','$idcrd','$photo','$email','$password','$cstatus','$date','$user_type','$ulocation')";
	$q1 = $db->prepare($sql);
	$q1->execute();		

	header("location:../signin.php");
?>

