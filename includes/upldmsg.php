<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk.php');
	require_once 'condata.php';
	if(!empty($_FILES['FileInput']) && is_uploaded_file($_FILES['FileInput']['tmp_name'])){
		$iname = $_FILES['FileInput']['name'];
		$pi = pathinfo($iname);
		
		$itxt = $pi['filename'];
		$iext = strtolower($pi['extension']);
		
		//$ftype    = null;
		$newIname = null;
		
		/*if($iext == 'exe' || $iext == 'msi')
		{
			echo 'Unsupported file type, You can upload this file by compressing(zip/7zip/rar..etc).';
			exit();
		}*/
		
		if($iext == 'jpg' || $iext == 'jpeg' || $iext == 'bmp' || $iext == 'png' || $iext == 'gif' || $iext == 'tiff')
			$ftype = 1;
		else if($iext == 'psd')
			$ftype = 2;
		else if($iext == 'doc' || $iext == 'docx')
			$ftype = 3;
		else if($iext == 'ppt' || $iext == 'pptx')
			$ftype = 4;
		else if($iext == 'xls' || $iext == 'xlsx')
			$ftype = 5;
		else if($iext == 'html' || $iext == 'php')
			$ftype = 6;
		else if($iext == 'exe' || $iext == 'msi')
			$ftype = 9;
		else
			$ftype = 0;
		
		$rid = $_POST['token'];
		
		$newIname = time().substr(md5(time()),0,8).mt_rand().".".$iext;

		$itmp = $_FILES['FileInput']['tmp_name'];
		
		if (!is_dir(PATH."chatuploads/".$_SESSION['utype']."/".$_SESSION[$_SESSION['utype']]['link']))
		{
			mkdir(PATH."chatuploads/".$_SESSION['utype']."/".$_SESSION[$_SESSION['utype']]['link'], 0777, true);
		}

		if(move_uploaded_file($itmp, PATH."chatuploads/".$_SESSION['utype']."/".$_SESSION[$_SESSION['utype']]['link']."/".$newIname))
		{
		//$isuccess = true;		
		/*$sql = "INSERT INTO `message`
		(rid,sid,mtype,mlink,oname) VALUES('".$_POST['token']."', '".$_SESSION[$_SESSION['utype']]['link']."', '".$ftype."', '".$newIname."', '".$iname."') ";
		if($dbh->query($sql))*/
		
		$statement = $dbh->prepare("INSERT INTO `message`
		(rid,sid,mtype,mlink,oname) VALUES(:rid, :sid, :mtype, :mlink, :oname)");
		
		$inssuccess = $statement->execute(array(
						':rid' => $rid,
						':sid' => $_SESSION[$_SESSION['utype']]['link'],
						':mtype' => $ftype,
						':mlink' => $newIname,
						':oname' => $iname
						
					));
		
		
		if($inssuccess > 0)
		echo 1;
		}
	}
	/*if( isset( $_POST['rc'] ) && !empty( $_POST['rc'] ) )
	{
		
		$sql = "INSERT INTO `message`
		(rid,sid,msg) VALUES('".$_POST['rc']."', '".$_SESSION[$_SESSION['utype']]['link']."', '".$_POST['msg']."') ";
		if($dbh->query($sql))
		echo 1;
		
		
	}*/
?>