<?php
	if(isset($_COOKIE['remember_c'])) {
		$c = $_COOKIE['remember_c'];
		if(!defined('PATH')) define('PATH','../');
		if(!isset($dbh) ||  $dbh == '')
		include_once('condata.php');
	
		function logout()
		{
			session_destroy();
			if (isset($_SERVER['HTTP_COOKIE']))
			{
				$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
				$domain = ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != 'localhost:786') ? $_SERVER['HTTP_HOST'] : false;
				foreach($cookies as $cookie) {
					$parts = explode('=', $cookie);
					$name = trim($parts[0]);
					setcookie($name, $_COOKIE[$name], time()-100, '/', $domain, false);
					//setcookie($name, $_COOKIE[$name], time()-100, '/');
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
			$p = $stmtl->fetch();
			
			$domain = ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != 'localhost:786') ? $_SERVER['HTTP_HOST'] : false;
			
			if($p['ctype'] == '1')
			{
				//logout();		
							$stmt = $dbh->prepare('SELECT fname,lname,country, state, city, isco, classification, industry, skills, languages, profImage,isAnonymous,isActive FROM candidate WHERE link = :link limit 1');
							$stmt->execute(array(
							':link' => $p['cfor']
							));
							if($stmt->rowCount() > 0)
							{
								$data = $stmt->fetch();
								
								
								unset($_SESSION['business']['link']);
								
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
								
								
								setcookie('remember_c', $_COOKIE['remember_c'], strtotime( '+ 7days' ), '/', $domain, false);
										
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
									
							/*header('location: '. PATH .'test/competence/competence_test');
							exit(0);*/
							
			}
			else
			{
				
				$msg[] = '<div class="alertMsg bgred">2Please signin to continue.</div>';
				$_SESSION['MSGS'] = $msg;
				header('location: '.PATH.'signin.php');
				exit();
			}
				
					
			
		}catch(PDOException $e) {
					echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	else{
		$msg[] = '<div class="alertMsg bgred">3Please signin to continue.</div>';
		$_SESSION['MSGS'] = $msg;
		header('location: '.PATH.'signin.php');
		exit();
	}
?>