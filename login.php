<?php
	//Start session
	session_start();
	
	include('db_connect/db.php');
		
	//Sanitize the POST values
	$cntno = $_POST['cntno'];
	$password = $_POST['password'];
	//Create query
	$qryad = $db->prepare("SELECT * FROM passenger WHERE cntno='$cntno' AND password='$password' AND user_type='Passenger'");
	$qryad->execute();
	$countad = $qryad->rowcount();
	
	
	if($countad > 0) {
		//Login Successful
		session_regenerate_id();
		$rowsad = $qryad->fetch();
		$_SESSION['SESS_PASSENGER_ID'] = $rowsad['Log_Id'];
		session_write_close();
		header("location: home.php");
		exit();
	}	
	
	else 
	{
		//Login failed
		echo "<script>alert('Check mobile number and password, Try Again'); window.location='signin.php'</script>";
		exit();
	}
?>
