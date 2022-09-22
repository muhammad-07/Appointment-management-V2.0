<?php
/*
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);*/
	/*$hostname='localhost';
	$username='root';
	$password='';*/
	/*
	$hostname='localhost';
	$username='job_board_user';
	$password='1C-TE@zh!uw^';
	
	/*
	$hostname='localhost';
	$username='giftworksAdmin';
	$password='8866202134mM#';
*/
$hostname='localhost';
	$username='ywxcosqf_prouser';
	$password='JSmg22@@';
	try
	{
		$dbh = new PDO("mysql:host=$hostname;dbname=ywxcosqf_propickd;charset=utf8",$username,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	catch(PDOException $e)
    {
		echo $e->getMessage();
    }
?>