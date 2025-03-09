<?php
	include("../auth.php");
	include('../db_connect/db.php');
	
	$BLog_Id=$_POST["BLog_Id"];
	$resultw = $db->prepare("select * from vehicle where Log_Id='$BLog_Id'");
	$resultw->execute();
	for($i=0; $roww = $resultw->fetch(); $i++)
	{
		$bname=$roww["bname"];			
	}
	
	$Log_Id=$_POST["Log_Id"];
	$cname=$_POST["cname"];
	$ccntno=$_POST["ccntno"];
	$frm=$_POST["frm"];
	$retrun=$_POST["retrun"];
	$amt=$_POST["amt"];
	
	$status="Pending";
	
	$date=date("Y-m-d");
	
	date_default_timezone_set('Asia/Kolkata');
	$tme = date( 'h:i:s A', time () );
	
	
	$sql = "insert into payment(Log_Id,cname,ccntno,bname,frm,retrun,amt,date,tme,status)values('$Log_Id','$cname','$ccntno','$bname','$frm','$retrun','$amt','$date','$tme','$status')";
	$q1 = $db->prepare($sql);
	$q1->execute();

	header("location:../payment_upi.php?amt=$amt");
	
?>
