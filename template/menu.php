<?php
	
	if(isset($_SESSION['utype']))
	{
		if($_SESSION['utype'] == 'candidate')
			include_once('c_menu.php');
		else
			include_once('b_menu.php');
	}
	else
			include_once('_menu.php');
	
		
?>