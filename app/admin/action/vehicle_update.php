<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$vno=$_POST["vno"];
	$vtype=$_POST["vtype"];
	$engno=$_POST["engno"];
	$vmdl=$_POST["vmdl"];
	$vcolor=$_POST["vcolor"];
	$cmpny=$_POST["cmpny"];
	$tdate=$_POST["tdate"];
	$oname=$_POST["oname"];
	$osex=$_POST["osex"];
	$oage=$_POST["oage"];
	$oaddrs=$_POST["oaddrs"];
	$ocntno=$_POST["ocntno"];
	$rdate=$_POST["rdate"];
	$bname=$_POST["bname"];
	
	
	$ulocation=$_POST["ulocation"];
	
	

	
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photos/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	
	
	if($photo=="")
	{
		$sql = "update vehicle set bname='$bname',vno='$vno',vtype='$vtype',engno='$engno',ulocation='$ulocation',vmdl='$vmdl',vcolor='$vcolor',cmpny='$cmpny',tdate='$tdate',oname='$oname',osex='$osex',oage='$oage',oaddrs='$oaddrs',ocntno='$ocntno',rdate='$rdate' where vno='$vno'";
		$q1 = $db->prepare($sql);
		$q1->execute();	
	}
	else
	{
		$sql = "update vehicle set bname='$bname',vno='$vno',vtype='$vtype',engno='$engno',ulocation='$ulocation',vmdl='$vmdl',vcolor='$vcolor',cmpny='$cmpny',tdate='$tdate',oname='$oname',osex='$osex',oage='$oage',oaddrs='$oaddrs',ocntno='$ocntno',rdate='$rdate',photo='$photo' where vno='$vno'";
		$q1 = $db->prepare($sql);
		$q1->execute();		
	}

	header("location:../vehicle_search.php");
?>
