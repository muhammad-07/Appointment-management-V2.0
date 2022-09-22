<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk.php');
	require_once 'condata.php';
	if( isset( $_POST['rc'] ) && !empty( $_POST['rc'] ) )
	{
		
		$statement = $dbh->prepare("INSERT INTO `message`
		(rid,sid,msg) VALUES(:rid, :sid, :msg)");
		
		$inssuccess = $statement->execute(array(
						':rid' => $_POST['rc'],
						':sid' => $_SESSION[$_SESSION['utype']]['link'],
						':msg' => $_POST['msg']
					));
		if($inssuccess > 0)
		echo 1;
		
	}
?>