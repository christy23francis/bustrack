<?php
	include('../../../db_connect/db.php');
	
	$not_id=$_GET['not_id'];

	$sql = "delete from notification where not_id='$not_id'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	

	header("location:../notification.php");
?>
