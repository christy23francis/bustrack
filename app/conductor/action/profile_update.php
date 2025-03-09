<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$Log_Id=$_SESSION['SESS_CONDUCTOR_ID'];

	$name=$_POST["name"];
	$age=$_POST["age"];
	$addrs=$_POST["addrs"];
	$cntno=$_POST["cntno"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$ulocation=$_POST["ulocation"];
	
	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photos/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	if($photo=="")
	{
		$sql = "update conductor set name='$name',age='$age',addrs='$addrs',cntno='$cntno',email='$email',password='$password',ulocation='$ulocation' where Log_Id='$Log_Id'";
		$q1 = $db->prepare($sql);
		$q1->execute();	
	}
	else
	{
		$sql = "update conductor set name='$name',age='$age',addrs='$addrs',cntno='$cntno',email='$email',password='$password',photo='$photo',ulocation='$ulocation' where Log_Id='$Log_Id'";
		$q1 = $db->prepare($sql);
		$q1->execute();	
	}
		

	header("location:../profile.php");
?>
