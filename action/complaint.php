<?php
	include('../db_connect/db.php');
	
		
	$Log_Id=$_POST["Log_Id"];
	$name=$_POST["name"];
	$subj=$_POST["subj"];
	$descp=$_POST["descp"];
	$cdate=$_POST["cdate"];
	$data=date("Y-m-d");
	$status="Pending";
	
	
		
	$sql = "insert into message(Log_Id,name,subj,descp,cdate,data,status)values('$Log_Id','$name','$subj','$descp','$cdate','$data','$status')";
	$q1 = $db->prepare($sql);
	$q1->execute();		

	header("location:../complaint_view.php");
?>

