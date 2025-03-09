<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$OLog_Id=$_GET["Log_Id"];
	$vno=$_GET["vno"];
	$bname=$_GET["bname"];
	$stop=$_GET["stop"];
	$time=$_GET["time"];
	$distance=$_GET["distance"];
	
	
	
	$sql = "insert into stops(OLog_Id,vno,bname,stop,time,distance)values('$OLog_Id','$vno','$bname','$stop','$time','$distance')";
	$q1 = $db->prepare($sql);
	$q1->execute();		

	header("location:../time_register_reg.php?vno=$vno");
?>
