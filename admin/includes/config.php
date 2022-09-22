<?php
if (!isset($_SESSION)) {  session_start();} 
define("HOST", "localhost");
define("DBU", "root");
define("DBPASS", "asd12D");
define("DB", "appointment_management");

/*
define("HOST", "localhost");
define("DBU", "root");
define("DBPASS", "");

/*
define('HTTP_SERVER', 'http://uniqueagriculturezone.com/');
define('HTTPS_SERVER', 'http://uniqueagriculturezone.com/');
define("HOST", "50.62.209.76:3306");
define("DBU", "unique");
define("DBPASS", "skydot@123");
define("DB", "unique");
*/
$connect=mysqli_connect(HOST, DBU, DBPASS, DB) or die("Connection could not established...");
// mysqli_select_db(DB, $connect) or die("database could not open");



?>