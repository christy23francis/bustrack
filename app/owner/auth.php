<?php
session_start();
if(!isset($_SESSION['SESS_OWNER_ID']) || (trim($_SESSION['SESS_OWNER_ID']) == '')) {
	header("location:../");
	exit();
}

?>
