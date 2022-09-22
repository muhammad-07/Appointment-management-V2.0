<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk_c.php');
	require_once('condata.php');
	$msgs = array();
	$clink = $_SESSION['candidate']['link'];
	if(!empty($_FILES['rsmfile']) && is_uploaded_file($_FILES['rsmfile']['tmp_name']))
	{
		$iname = $_FILES['rsmfile']['name'];
		$pi = pathinfo($iname);
		$itxt = $pi['filename'];
		$iext = $pi['extension'];
		
		//$newLname = time().substr(md5(time()),0,8).mt_rand().".".$iext;
		//$newLname = 'user.png';
		if($iext == 'doc' || $iext == 'docx' || $iext == 'pdf')
		{
			$itmp = $_FILES['rsmfile']['tmp_name'];
				
			if (!is_dir('../profile/candidate/'.$clink.'/resumes/'))
			{
				mkdir('../profile/candidate/'.$clink.'/resumes/', 0777, true);
				
			}
			else
			{
				$sql = "SELECT rlink FROM c_resume WHERE clink = '".$clink."' limit 1";
				$q = $dbh->query($sql);
				$row = $q->fetch(PDO::FETCH_ASSOC);
				
				if($row['rlink'] != '')
				unlink('../profile/candidate/'.$clink.'/resumes/'.$row['rlink']);
				
				$sql = "DELETE FROM c_resume WHERE clink = '".$clink."'";
				$q = $dbh->query($sql);
			}
			
			if(move_uploaded_file($itmp, '../profile/candidate/'.$clink.'/resumes/Uploaded-Resume-WWW.PROPICKD.COM.'.$iext))
			{
				
				$stmt = $dbh->prepare('INSERT INTO `c_resume` (rlink, clink, r_oname) VALUES(:rlink, :clink, :r_oname)');
				
				$suc = $stmt->execute(array(
					':rlink' => 'Uploaded-Resume-WWW.PROPICKD.COM.'.$iext,
					':clink' => $clink,
					':r_oname' => $iname				
				));
				if($suc > 0)
					$msgs[] = "<div class='alertMsg bggreen'>Your resume uploaded successfully.</div>";					
				else
					$msgs[] = "<div class='alertMsg bgred'>Your resume could not be uploaded.</div>";
				
				$_SESSION['MSGS'] = $msgs;
				header('location: '.PATH. 'candidate/profile?l='.$clink);
				exit(0);
			}
		}
		else
		{
			$msgs[] = "<div class='alertMsg bgred'>Invalid file format, Please select doc, docx or pdf file.</div>";
			$_SESSION['MSGS'] = $msgs;
			header('location: '.PATH. 'candidate/profile?l='.$clink);
			exit(0);
		}
	
	}
?>