<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$Log_Id=$_POST['Log_Id'];

	$name=$_POST["name"];
	$cntno=$_POST["cntno"];
	$addrs=$_POST["addrs"];
	$age=$_POST["age"];
	$sex=$_POST["sex"];
	$aadharno=$_POST["aadharno"];

	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photos/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	
	
	if($photo=="")
	{
		$sql = "update owner set aadharno='$aadharno',name='$name',cntno='$cntno',addrs='$addrs',age='$age',sex='$sex' where Log_Id='$Log_Id'";
		$q1 = $db->prepare($sql);
		$q1->execute();	
	}
	else
	{
		$sql = "update owner set aadharno='$aadharno',name='$name',cntno='$cntno',addrs='$addrs',photo='$photo',age='$age',sex='$sex' where Log_Id='$Log_Id'";
		$q1 = $db->prepare($sql);
		$q1->execute();		
	}

	header("location:../owner_search.php");
?>
