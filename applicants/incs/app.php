<?php
	session_start();
	define('PATH','../../');
	include_once(PATH . 'includes/condata.php');
	include_once(PATH . 'includes/funcs.php');
	$msgs = array();

	if(!isset($_POST['fname']) || $_POST['fname'] == '' || 
		!isset($_POST['lname']) || $_POST['lname'] == '' || 
		!isset($_POST['mname']) || $_POST['mname'] == '' || 
		!isset($_POST['eml']) || $_POST['eml'] == '' || 
		!isset($_POST['bc']) || $_POST['bc'] == '' || 
		!isset($_POST['melli']) || $_POST['melli'] == '' || 
		!isset($_POST['type']) || !is_array($_POST['type']) || 
		!isset($_POST['adt']) || $_POST['adt'] == '' || 
		!isset($_POST['avltime']) || $_POST['avltime'] == ''
	)
	{
		$msgs[] = '<div class="alertMsg bgred">Something is missing, please fill all required field incorrect format.</div>';
		$_SESSION['MSGS'] = $msgs;
		
		header('location:../../register-application');
		exit(0);
	}
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$eml = $_POST['eml'];
	$bc = $_POST['bc'];
	$melli = $_POST['melli'];
	
	$adate = date('Y-m-d', strtotime($_POST['adt']));
	$atime = $_POST['avltime'];
	
	$descr  = (isset($_POST['desc']) && $_POST['desc'] != '') ? $_POST['desc'] : NULL;
	
	$apmnts = isAppointmentTaken($_POST['adt'],$_POST['avltime'],$dbh);
	if($apmnts > 1)
	{
		$msgs[] = '<div class="alertMsg bgred">Appointment has been taken on '.$_POST['adt'].' '.$_POST['avltime'].' Please select another time or date.</div>';
		$_SESSION['MSGS'] = $msgs;
		
		header('location:../../register-application');
		exit(0);
	}
	
	$atypes = '';
	foreach($_POST['type'] as $atype)
	{
		
			if($atype == '1')
				$typ = 'Passport';
			if($atype == '2')
				$typ = 'Birth Certificate';
			if($atype == '3')
				$typ = 'Power of Attorney';
			if($atype == '4')
				$typ = 'Marriage Certificate';
			if($atype == '5')
				$typ = 'Devorce Certificate';
			if($atype == '6')
				$typ = 'Student Affairs';
			if($atype == '7')
				$typ = 'Others';
			
			$atypes .= $typ.', ';
			
	}
	
	$atype = implode(',', $_POST['type']);
	$atypes = rtrim($atypes, ', ');
	
	$window = ($apmnts == 0 ? 0 : 1);
	
	$uniquelink = getLnkbyEml($eml, 'applicants', $dbh);
	if($uniquelink == '')
	{
		$uniquelink = randomPassword(4, 'applicants', 'link', $dbh);
		$u = $dbh->prepare("INSERT INTO applicants
				(link, fnm, lnm, mnm, eml, pass)
				VALUES(:link, :fnm, :lnm, :mnm, :eml, :pass)");
		$confsuccess = $u->execute(array(
					':link' => $uniquelink,
					':fnm' => $fname,
					':lnm' => $lname,
					':mnm' => $mname,
					':eml' => $eml,
					':pass' => $uniquelink.mt_rand(100,999)
					));
	}
	else
	{
		$confsuccess = 1;
	}
	if($confsuccess > 0)
	{
		$alink = randomPassword(4, 'appointment', 'alink', $dbh);
		$ap = $dbh->prepare("INSERT INTO appointment
				(ulink, alink, atype, adate, atime, window, melli, bc, descr)
				VALUES(:ulink, :alink, :atype, :adate, :atime, :window, :melli, :bc, :descr)");
		$appsuccess = $ap->execute(array(
					':ulink' => $uniquelink,
					':alink' => $alink,
					':atype' => $atype,
					':adate' => $adate,
					':atime' => $atime,
					':window'=> $window,
					':melli' => $melli,
					':bc' => $bc,
					':descr' => $descr
					));
		if($appsuccess > 0)
		{
		
			$window = ($window == 0 ? 'A-1' : 'B-1');
			
			$adate = $_POST['adt']; // For format
			require_once('al.php');
			
			
			
			include_once(PATH . 'email/Minty/email_funcs.php');
		
		$email_body = get_email_head().get_email_webviewpart().get_email_menu()
		.email_headtxt('Hello '.$fname.' '.$mname.' '.$lname.',', $align='left', $padding='25px 0 0 15px')
		.email_txt('Your appointment has been registered with us, for the following details below:<br/>', $align='left', $padding='0 15px')
		.email_txt('Appointment for: <b>'.$atypes.'</b>', $align='left', $padding='0 15px')
		.email_txt('Appointment Date & Time: <b>'.$adate.' at '.$atime.'</b>', $align='left', $padding='0 15px')
		
		.email_txt('Please come there before few minutes so that you do not miss appointment.', $align='left', $padding='0 15px')
		
		.email_txt('Thank you', $align='left', $padding='0 15px')
		.email_btn('Download Appointment letter', 'https://codbuddy.com/demo/Appointment-management-V2.0/applicants/incs/'.$uniquelink.'/al/appointment-'.$alink.'.pdf', 'center', $padding='0 15px')
		.email_txt('<br/><br/><br/>', $align='left', $padding='0 15px')
		.get_email_footer();
		
		
		$receiver = 'muhammad.begawala@gmail.com';
		mail($eml, 'Appointment Scheduled at <b>'.$adate.' at '.$atime.'</b>', $email_body, get_email_headers());
		
					
		$msgs[] = "<div class='alertMsg bggreen'>Appointment has been scheduled, <a href='https://codbuddy.com/demo/Appointment-management-V2.0/applicants/incs/".$uniquelink."/al/appointment-".$alink.".pdf'>download the appointment letter</a>, we have sent you a confirmation email.</div>";	
		$_SESSION['MSGS'] = $msgs;
		header('location: ../../register-application');
		exit(0);
		}
	}
	
	