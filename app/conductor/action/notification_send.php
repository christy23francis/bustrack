<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$Log_Id=$_POST["Log_Id"];
	$subj=$_POST["subj"];
	$dscp=$_POST["dscp"];
	$photo=$_POST["photo"];
	$name=$_POST["name"];
	
	$date=date("Y-m-d");
	
	
	$sql = "insert into notification(Log_Id,subj,dscp,date,photo,name)values('$Log_Id','$subj','$dscp','$date','$photo','$name')";
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../notification.php");
?>
