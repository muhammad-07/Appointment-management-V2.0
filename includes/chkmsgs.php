<?php
	if(isset($_SESSION['MSGS']))
	{
		
		foreach($_SESSION['MSGS'] as $msg)
		{
			echo $msg;
		}
		
		
		unset($_SESSION['MSGS']);
		
	}
?>