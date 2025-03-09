<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$msg_id=$_POST["msg_id"];
	$reply=$_POST["descp"];
	
	$dated=date("Y-m-d");
	
	$status="Clear";
	
	$sql = "update message set reply='$reply',reply_date='$dated',status='$status' where msg_id='$msg_id'";
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../message_reply.php");
?>
