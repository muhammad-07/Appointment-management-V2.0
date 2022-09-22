<?php
	if(!defined('PATH')) define('PATH','../');
	session_start();
	//$msg = array();
//echo $_SESSION['candidate']['link'];
		if(!isset($_SESSION['candidate']['link']) || empty($_SESSION['candidate']['link']))
		{
			//echo $_SESSION["return"] = $_SERVER["PHP_SELF"];
			$_SESSION['candidate']['return'] = $_SERVER['REQUEST_URI'];
			require_once(PATH.'includes/cookie_c.php');
			//$_SESSION['rdrto'] = $_SERVER['PHP_SELF'];
			
		}
	/*
	if(!isset($_SESSION['utype']) && $_SESSION['utype'] == '')
	{
		$_SESSION['MSGS'] = $msg;
		header('location: '.PATH.'signin.php');
		exit();
	}
	else
	{
		
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
			
	}*/
	
?>