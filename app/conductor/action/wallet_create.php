<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	$Log_Id=$_POST["Log_Id"];
	$cntno=$_POST["cntno"];
	$name=$_POST["name"];
	$age=$_POST["age"];
	$sex=$_POST["sex"];
	$addr=$_POST["addrs"];
	$email=$_POST["email"];
	$waltid=$_POST["waltid"];
	$photo=$_POST["photo"];
	$amt=$_POST["amt"];
	$date=date("Y-m-d");
	
	 
	$status="Deposit";
	
	$sql = "insert into wallet(Log_Id,cntno,name,age,sex,addr,email,waltid,amt,date,photo)values('$Log_Id','$cntno','$name','$age','$sex','$addr','$email','$waltid','$amt','$date','$photo')";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	
	$sql = "insert into deposit(Log_Id,cntno,name,age,sex,addr,email,waltid,amt,date,status)values('$Log_Id','$cntno','$name','$age','$sex','$addr','$email','$waltid','$amt','$date','$status')";
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../wallet_created.php");
?>
