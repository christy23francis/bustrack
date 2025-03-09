<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$Log_Id=$_POST["Log_Id"];
	$subject=$_POST["subject"];
	$descp=$_POST["descp"];
	$dated=date("Y-m-d");
	
	$status="Pending";
	
	$sql = "insert into message(Log_Id,subj,descp,data,status)values('$Log_Id','$subject','$descp','$dated','$status')";
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../message.php");
?>
