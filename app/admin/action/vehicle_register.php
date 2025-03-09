<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$Log_Id=$_POST["Log_Id"];
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
	$rstart=$_POST["rstart"];
	$rstop=$_POST["rstop"];
	$bname=$_POST["bname"];
	
	
	$ulocation=$_POST["ulocation"];
	
		
	$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$image_name = addslashes($_FILES['photo']['name']);
	$image_size = getimagesize($_FILES['photo']['tmp_name']);
	move_uploaded_file($_FILES["photo"]["tmp_name"], "../../photos/" . $_FILES["photo"]["name"]);
	$photo = $_FILES["photo"]["name"];
	
	$sql = "insert into vehicle(Log_Id,vno,vtype,engno,vmdl,vcolor,cmpny,tdate,oname,osex,oage,oaddrs,ocntno,rdate,photo,ulocation,bname,rstart,rstop)values('$Log_Id','$vno','$vtype','$engno','$vmdl','$vcolor','$cmpny','$tdate','$oname','$osex','$oage','$oaddrs','$ocntno','$rdate','$photo','$ulocation','$bname','$rstart','$rstop')";
	$q1 = $db->prepare($sql);
	$q1->execute();		

	header("location:../vehicle_search.php");
?>
