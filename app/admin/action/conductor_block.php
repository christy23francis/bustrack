<?php
	include('../../../db_connect/db.php');
	
	$DLog_Id=$_GET['DLog_Id'];

	$sql = "update conductor set status='block' where Log_Id='$DLog_Id'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	

	header("location:../conductor_search.php");
?>
