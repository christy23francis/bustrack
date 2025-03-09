<?php
session_start();
if(!isset($_SESSION['SESS_DRIVER_ID']) || (trim($_SESSION['SESS_DRIVER_ID']) == '')) {
	header("location:../");
	exit();
}

?>
