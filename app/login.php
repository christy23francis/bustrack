<?php
	//Start session
	session_start();
	
	include('../db_connect/db.php');
		
	//Sanitize the POST values
	$email = $_POST['email'];
	$password = $_POST['password'];
	//Create query
	$qryad = $db->prepare("SELECT * FROM admin WHERE email='$email' AND password='$password' AND user_type='Admin'");
	$qryad->execute();
	$countad = $qryad->rowcount();
	
	//Check whether the query was successful or not
	$qryow = $db->prepare("SELECT * FROM owner WHERE email='$email' AND password='$password' AND user_type='Owner'");
	$qryow->execute();
	$countow = $qryow->rowcount();
	
	//Check whether the query was successful or not
	$qrycnd = $db->prepare("SELECT * FROM conductor WHERE email='$email' AND password='$password' AND user_type='Conductor' and status='allow'");
	$qrycnd->execute();
	$countcnd = $qrycnd->rowcount();
	
	//Check whether the query was successful or not
	$qrydrv = $db->prepare("SELECT * FROM driver WHERE email='$email' AND password='$password' AND user_type='Driver' and status='allow'");
	$qrydrv->execute();
	$countdrv = $qrydrv->rowcount();
	
	if($countad > 0) {
		//Login Successful
		session_regenerate_id();
		$rowsad = $qryad->fetch();
		$_SESSION['SESS_ADMIN_ID'] = $rowsad['Log_Id'];
		session_write_close();
		header("location: admin/index.php");
		exit();
	}	
	else if($countow > 0) {
		//Login Successful
		session_regenerate_id();
		$rowsow = $qryow->fetch();
		$_SESSION['SESS_OWNER_ID'] = $rowsow['Log_Id'];
		session_write_close();
		header("location: owner/index.php");
		exit();
	}	
	else if($countcnd > 0) {
		//Login Successful
		session_regenerate_id();
		$rowscnd = $qrycnd->fetch();
		$_SESSION['SESS_CONDUCTOR_ID'] = $rowscnd['Log_Id'];
		session_write_close();
		header("location: conductor/index.php");
		exit();
	}	
	else if($countdrv > 0) {
		//Login Successful
		session_regenerate_id();
		$rowsdrv = $qrydrv->fetch();
		$_SESSION['SESS_DRIVER_ID'] = $rowsdrv['Log_Id'];
		session_write_close();
		header("location: driver/index.php");
		exit();
	}	
	else 
	{
		//Login failed
		echo "<script>alert('Check Username And Password Try Again'); window.location='index.php'</script>";
		exit();
	}
?>
