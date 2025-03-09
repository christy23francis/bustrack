<?php
	include('../../../db_connect/db.php');
	
	$wlt_id=$_GET['wlt_id'];

	$sql = "update payment set status='Accept' where wlt_id='$wlt_id'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	

	header("location:../payment_request.php");
?>
