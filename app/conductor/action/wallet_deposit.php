<?php
	include("../auth.php");
	include('../../../db_connect/db.php');
	
	
	$waltid=$_POST["waltid"];
	$damt=$_POST["amt"];
	$resultw = $db->prepare("select * from wallet where waltid='$waltid'");
	$resultw->execute();
	for($i=0; $roww = $resultw->fetch(); $i++)
	{
		$Log_Id=$roww["Log_Id"];
		$cntno=$roww["cntno"];
		$name=$roww["name"];
		$age=$roww["age"];
		$sex=$roww["sex"];
		$addr=$roww["addr"];
		$email=$roww["email"];
		$total=$roww["amt"];			
	}
	
	
	$date=date("Y-m-d");
	
	 
	$status="Deposit";
	

	$totald=$total+$damt;	
	
	
	$sql = "update wallet set amt='$totald' where waltid='$waltid'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	
	$sql = "insert into deposit(Log_Id,cntno,name,age,sex,addr,email,waltid,amt,date,status)values('$Log_Id','$cntno','$name','$age','$sex','$addr','$email','$waltid','$damt','$date','$status')";
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../wallet_deposited.php");
?>
