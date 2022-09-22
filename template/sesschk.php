<?php
	if(!defined('PATH')) define('PATH','../');
	session_start();
	//$msg = array();
	
	$msg[] = '<div class="alertMsg bgred">Please signin to continue.</div>';
	
	if(!isset($_SESSION['utype']) && $_SESSION['utype'] == '')
	{
		$_SESSION['MSGS'] = $msg;
		header('location: '.PATH.'signin.php');
		exit();
	}
	else
	{
		if($_SESSION['utype'] == 'candidate')
		{
			if(!isset($_SESSION['candidate']['link']) || empty($_SESSION['candidate']['link']))
			{
				$_SESSION['MSGS'] = $msg;
				header('location: '.PATH.'signin.php');
				exit();
			}
			
				
		}
		else if($_SESSION['utype'] == 'business')
		{
			if(!isset($_SESSION['business']['link']) || empty($_SESSION['business']['link']))
			{
				$_SESSION['MSGS'] = $msg;
				header('location: '.PATH.'signin.php');
				exit();
			}
		}
		else
		{
			$_SESSION['MSGS'] = $msg;
			header('location: '.PATH.'signin.php');
			exit();
		}
			
	}
	
?>