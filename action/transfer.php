<?php
	include("../auth.php");
	include('../db_connect/db.php');
	$Log_Id=$_SESSION['SESS_PASSENGER_ID'];
	
	$dwaltid=$_POST["waltid"];
	$amt=$_POST["amt"];
	
	$resultw = $db->prepare("select * from wallet where Log_Id='$Log_Id'");
	$resultw->execute();
	for($i=0; $roww = $resultw->fetch(); $i++)
	{
		$tamt=$roww["amt"];		
		$tname=$roww["name"];		
	}
	
	$resultw = $db->prepare("select * from wallet where waltid='$dwaltid'");
	$resultw->execute();
	for($i=0; $roww = $resultw->fetch(); $i++)
	{
		$damt=$roww["amt"];	
		$dname=$roww["name"];			
	}
	
	
	$totalf=$tamt-$amt;	
	
	
	$totald=$damt+$amt;	

	
	$status="Pending";
	
	$date=date("Y-m-d");
	
	date_default_timezone_set('Asia/Kolkata');
	$tme = date( 'h:i:s A', time () );
	
	
	$sql = "update wallet set amt='$totald' where waltid='$dwaltid'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	
	$sql = "update wallet set amt='$totalf' where Log_Id='$Log_Id'";
	$q1 = $db->prepare($sql);
	$q1->execute();		
	
	
	
	
	$sql = "insert into transfer(Log_Id,tname,dname,amt,date,tme)values('$Log_Id','$tname','$dname','$amt','$date','$tme')";
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../payment_trasfered.php");
	
?>
