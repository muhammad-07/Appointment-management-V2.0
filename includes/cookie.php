<?php
	if(isset($_COOKIE['remember_user'])) {
		$c = $_COOKIE['remember_user'];
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
		try
		{
			$stmtl = $dbh->prepare('SELECT cfor,ctype FROM kuki WHERE cookie = :c limit 1');
			$stmtl->execute(array(
				':c' => $c
			));
			
			if($stmtl->rowCount() > 0)
			{
			$p = $stmtl->fetch();
			
			$domain = ($_SERVER['HTTP_HOST'] != 'localhost' || $_SERVER['HTTP_HOST'] != 'localhost:786') ? $_SERVER['HTTP_HOST'] : false;
			
			if($p['ctype'] == '1')
			{
							
							$stmt = $dbh->prepare('SELECT fname,lname,country, state, city, isco, classification, industry, skills, languages, profImage,isAnonymous,isActive FROM candidate WHERE link = :link limit 1');
							$stmt->execute(array(
							':link' => $p['cfor']
							));
							if($stmt->rowCount() > 0)
							{
								$data = $stmt->fetch();
							
								logout();
								
								unset($_SESSION['business']);
								
							$_SESSION['utype'] = 'candidate';
							$_SESSION['candidate']['fnm']     = $data['fname'];
							$_SESSION['candidate']['lnm']     = $data['lname'];
							$_SESSION['candidate']['link'] 	 = $p['cfor'];
							$_SESSION['candidate']['profImg'] = (($data['isAnonymous'] != '1' && $data['profImage'] != '' ) ? 'profile/candidate/' . $p['cfor'] . '/' . $data['profImage'] : 'images/user.png');					
							$_SESSION['candidate']['country'] = $data['country'];					
							$_SESSION['candidate']['state'] = $data['state'];					
							$_SESSION['candidate']['city'] = $data['city'];					
							$_SESSION['candidate']['isco'] = $data['isco'];					
							$_SESSION['candidate']['classification'] = $data['classification'];					
							$_SESSION['candidate']['industry'] = $data['industry'];					
							$_SESSION['candidate']['skills'] = $data['skills'];					
							$_SESSION['candidate']['languages'] = $data['languages'];	

							$_SESSION['test']['isco'] = $data['isco'];					
							$_SESSION['test']['classification'] = $data['classification'];
							$_SESSION['test']['link'] = $p['cfor'];
							
							
							setcookie('remember_user', $_COOKIE['remember_user'], strtotime( '+ 7days' ), '/', $domain, false);
									
							$sql = "UPDATE kuki set added = CURRENT_TIMESTAMP WHERE cfor = '".$p['cfor']."'";
							$q = $dbh->query($sql);
							}
							/*header('location: '. PATH .'test/competence/competence_test');
							exit(0);*/
							
			}
			else
			{
				$_SESSION['utype'] = 'business';
				$stmt = $dbh->prepare('SELECT busname, contname, conttitle, country, state, city, profImage, isAnonymous,isActive FROM business WHERE link = :link limit 1');
				$stmt->execute(array(
				':link' => $p['cfor']
				));
				if($stmt->rowCount() > 0)
							{
								$data = $stmt->fetch();
							
								logout();
								unset($_SESSION['candidate']);
							unset($_SESSION['test']);
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
				
				setcookie('remember_user', $_COOKIE['remember_user'], strtotime( '+ 7days' ), '/', $domain, false);
						
				$sql = "UPDATE kuki set added = CURRENT_TIMESTAMP WHERE cfor = '".$p['cfor']."'";
				$q = $dbh->query($sql);
							}
				/*if($plan['amt'] == '' || $plan['tid'] == '')
				{
					header('location: '. PATH .'business/upgrade_plan_b');
					exit(0);
				}
				else{
				
					header('location: '. PATH .'business/');
					exit(0);
				}*/
				
				
			}
								
			}
			
		}catch(PDOException $e) {
					echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	/*else{
		$msg[] = '<div class="alertMsg bgred">5Please signin to continue.</div>';
		$_SESSION['MSGS'] = $msg;
		//header('location: '.PATH.'signin.php');
		//exit();
	}*/
?>