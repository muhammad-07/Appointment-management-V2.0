<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
	if(!defined('PATH')) define('PATH','../');
	//require_once(PATH.'includes/cookiechk.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php if(isset($title)) echo $title; else echo 'codbuddy.com'; ?></title>
    <meta name="description" content="Hire talented candidates by our codbuddy technology if you are a company, or find job if you are a job seeker by taking competence test.">
		<meta name="keywords" content="codbuddy job company talented talent hire business competence test" />
		<meta name="author" content="Muhammad" />
		<meta name="Copyright" content="&copy; codbuddy.com and Muhammad" />
        <meta name="MSSmartTagsPreventParsing" content="TRUE" />
		<meta name="robots" content="index, follow">
        <meta name="revisit-after" content="2 Days" />
        <meta name="Rating" content="General" />
		<link rel="author" href="https://plus.google.com/109782197870894866104"/>
		<link rel="publisher" href="https://plus.google.com/109782197870894866104"/>
		
		<meta property="og:title" content="codbuddy | Hire talent or Find job"/>
		<meta property="og:type" content="website"/>
		<meta property="og:image" content="http://www.codbuddy.com/images/codbuddy-banner.jpg"/>
		<meta property="og:url" content="http://www.codbuddy.com"/>
		<meta property="og:description" content="Hire talented candidates by our codbuddy technology if you are a company, or find job if you are a job seeker by taking competence test."/>
		
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="http://www.codbuddy.com">
		<meta name="twitter:title" content="codbuddy | Hire talent or Find job">
		<meta name="twitter:description" content="Hire talented candidates by our codbuddy technology if you are a company, or find job if you are a job seeker by taking competence test.">
		<meta name="twitter:image" content="http://www.codbuddy.com/images/codbuddy-banner.jpg">
		<meta name="twitter:creator" content="@Mb7Prince">
		<meta name="twitter:creator:id" content="@Mb7Prince">

		<link rel="icon" href="fevicon.ico" type="image" />
		<link rel="shortcut icon" href="http://www.codbuddy.com/images/fevicon.png" type="image" />
    <!-- Bootstrap core CSS -->
<link href="<?php echo PATH ?>css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="<?php echo PATH ?>css/editor/index.css" rel="stylesheet">
    <link href="<?php echo PATH ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo PATH ?>fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo PATH ?>css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo PATH ?>css/custom.css" rel="stylesheet">
    <link href="<?php echo PATH ?>css/icheck/flat/green.css" rel="stylesheet">


    <script src="<?php echo PATH ?>js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->