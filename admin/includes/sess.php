<?php
if(!defined('PATH')) define('PATH','');
	session_start();
	
	$msg[] = '<div class="alertMsg bgred">Please signin to continue.</div>';
	
	if(!isset($_SESSION['a']['link']) && $_SESSION['a']['link'] == '')
	{
		$_SESSION['MSGS'] = $msg;
		header('location: '.PATH.'index.php');
		exit();
	}
?>