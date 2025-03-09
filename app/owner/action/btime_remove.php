<?php
	include('../../../db_connect/db.php');
	
	$bus_tid=$_GET['bus_tid'];

	$sql = "delete from stops where bus_tid='$bus_tid'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	

	header("location:../time_register.php");
?>
