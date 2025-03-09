<?php
session_start();
if(!isset($_SESSION['SESS_PASSENGER_ID']) || (trim($_SESSION['SESS_PASSENGER_ID']) == '')) {
	header("location:../");
	exit();
}

?>
