<?php
	if(!defined('PATH')) define('PATH','../');
	session_start();
	//$msg = array();
	
	//$msg[] = '<div class="alertMsg bgred">Please signin to continue.</div>';
	
			if(!isset($_SESSION['business']['link']) || empty($_SESSION['business']['link']))
			{
				/*$_SESSION['MSGS'] = $msg;
				header('location: '.PATH.'signin.php');
				exit();*/
				$_SESSION['business']['return'] = $_SERVER['REQUEST_URI'];
				
				require_once(PATH.'includes/cookie_b.php');
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