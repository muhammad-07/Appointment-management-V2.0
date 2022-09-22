<?php
	include('sess.php');
	include('sess.php');include 'config.php';
	$res = array();
	if(count($_POST) > 0){	
	
		if(isset($_REQUEST['id']) AND $_REQUEST['values']!='')
		{
			$update="update country set countryname='$_REQUEST[values]' where cid=$_REQUEST[id]";
			$rs = mysql_query($update) or die(mysql_error());
		
		}else{
			
		$errors = array();			
		$isError = false;
		$country = $_POST['cname'];
		if(empty($country)){
		
			$errors['country'] = 'Please Enter Country Name';
		}else{
			
			$check_query=mysql_query("select * from country where countryname='$country'");
			if(mysql_num_rows($check_query)==1)
			{
				$errors['country'] = 'Country Name Already';
			}
			
		}
		
		if(count($errors)>0){
			$isError = true;
		}
		if(!$isError){
		
			
			
			//Insert Member Data in database
			$dateupdate=date('Y-m-d H:i:s');
			$ins="insert into country (countryname,status)values('".addslashes($country)."','1')";
			$rs = mysql_query($ins) or die(mysql_error());
		}

		if(count($errors)>0){
			$isError = true;
		}

		if(!$isError){		
			$res['status'] = 'success';
		} else{
			$res['status'] = 'fail';
			$res['errors'] = $errors;
		}
		}
	}

	header("Content-Type: application/json");
	echo json_encode($res);
  exit;
?>