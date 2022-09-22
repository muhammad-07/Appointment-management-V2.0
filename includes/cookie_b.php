<?php
	if(isset($_COOKIE['remember_b'])) {
		$c = $_COOKIE['remember_b'];
		if(!defined('PATH')) define('PATH','../');
		if(!isset($dbh) ||  $dbh == '')
		include_once('condata.php');
	
		function logout()
		{
			session_destroy();
			if (isset($_SERVER['HTTP_COOKIE']))
			{
				$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
				$domain = ($_SERVER['HTTP_HOST'] != 'localhost' || $_SERVER['HTTP_HOST'] != 'localhost:786') ? $_SERVER['HTTP_HOST'] : false;
				foreach($cookies as $cookie) {
					$parts = explode('=', $cookie);
					$name = trim($parts[0]);
					setcookie($name, $_COOKIE[$name], time()-100, '/', $domain, false);
					setcookie($name, $_COOKIE[$name], time()-100, '/');
				}
			}
			session_start();
		}
		//if(isset($_SESSION['return']))
			
		try
		{
			$stmtl = $dbh->prepare('SELECT cfor,ctype FROM kuki WHERE cookie = :c limit 1');
			$stmtl->execute(array(
				':c' => $c
			));
			$p = $stmtl->fetch();
			
			$domain = ($_SERVER['HTTP_HOST'] != 'localhost' || $_SERVER['HTTP_HOST'] != 'localhost:786') ? $_SERVER['HTTP_HOST'] : false;
			
			if($p['ctype'] == '0')
			{
				//logout();
				$_SESSION['utype'] = 'business';
				$stmt = $dbh->prepare('SELECT busname, contname, conttitle, country, state, city, profImage, isAnonymous,isActive FROM business WHERE link = :link limit 1');
				$stmt->execute(array(
				':link' => $p['cfor']
				));
				if($stmt->rowCount() > 0)
				{
					//echo'ssssssssssss';
					$data = $stmt->fetch();
					
					unset($_SESSION['candidate']['link']);
					unset($_SESSION['test']['link']);
					
					$_SESSION['business']['bnm']     = $data['busname'];
					$_SESSION['business']['cnm']     = $data['contname'];
					$_SESSION['business']['country'] = $data['country'];
					$_SESSION['business']['state']   = $data['state'];
					$_SESSION['business']['city']    = $data['city'];
					$_SESSION['business']['link'] 	 = $p['cfor'];
					$_SESSION['business']['ctitle']  = $data['conttitle'];
					$_SESSION['business']['profImg'] = $data['profImage'];		

					$stmt = $dbh->prepare('SELECT tid, amt FROM b_sellings WHERE uid = :link AND expon > DATE_FORMAT( NOW( ) , "%Y-%m-%d %H:%i:%s" ) limit 1');
					$stmt->execute(array(
					':link' => $p['cfor']
					));
					$plan = $stmt->fetch();
					
					setcookie('remember_b', $_COOKIE['remember_b'], strtotime( '+ 7days' ), '/', $domain, false);
							
					$sql = "UPDATE kuki set added = CURRENT_TIMESTAMP WHERE cfor = '".$p['cfor']."'";
					$q = $dbh->query($sql);
				}
				else
				{
					$msg[] = '<div class="alertMsg bgred">Please signin to continue.</div>';
					$_SESSION['MSGS'] = $msg;
					header('location: '.PATH.'signin.php');
					exit();
				}
				
				
				
			}
			else
			{
				$msg[] = '<div class="alertMsg bgred">Please signin to continue.</div>';
				$_SESSION['MSGS'] = $msg;
				header('location: '.PATH.'signin.php');
				exit();
			}
								
			
		}catch(PDOException $e) {
					echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	else{
		$msg[] = '<div class="alertMsg bgred">Please signin to continue.</div>';
		$_SESSION['MSGS'] = $msg;
		header('location: '.PATH.'signin.php');
		exit();
	}
?>