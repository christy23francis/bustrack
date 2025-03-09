<?php
session_start();
if(!isset($_SESSION['SESS_CONDUCTOR_ID']) || (trim($_SESSION['SESS_CONDUCTOR_ID']) == '')) {
	header("location:../");
	exit();
}

?>
