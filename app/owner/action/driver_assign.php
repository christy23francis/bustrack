<?php
	include('../../../db_connect/db.php');
	
	$vno=$_GET['vno'];
	$DLog_Id=$_GET['DLog_Id'];

	$sql = "update driver set bassign='$vno' where Log_Id='$DLog_Id'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	

	header("location:../driver_search.php");
?>
