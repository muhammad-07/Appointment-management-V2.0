<?php
	include_once('condata.php');
	include_once('funcs.php');
	if(isset($_POST['adt']) && $_POST['adt'] != '' && isset($_POST['typ']) && is_array($_POST['typ']))
	{
		//isAppointmentTaken($_POST['adt'],$_POST['avltime'])
		$gi = "SELECT atime
				FROM `appointment`
				WHERE adate = '" . date('Y-m-d',strtotime($_POST['adt'])) . "' 
				";
				
		$gi = "SELECT atime 
				FROM `appointment` 
				WHERE adate = '" . date('Y-m-d',strtotime($_POST['adt'])) . "' 
				GROUP BY atime 
				HAVING ( COUNT(atime) > 1 )";
										
		$gic = $dbh->query($gi);
		$dbtime = array();
		while($rowcon = $gic->fetch(PDO::FETCH_ASSOC))
			{
				
				$at = explode(' ', $rowcon['atime']);
				$dbtime[] = (float)$at[0];
			}
		//if($gic->rowCount() > 0)
		//{
			//$rowcon = $gic->fetch(PDO::FETCH_ASSOC);
			//header('Content-Type: application/json');
			//echo json_encode($rowcon);
		/*}
		else
			echo json_encode(0);*/
		
		
		
		$max = 12.00;
		
		
		foreach($_POST['typ'] as $typ)
		{
			if((int)$typ < 4)
			{
				$max = 10.00;
				break;
			}
		}
		
		
		$rtn = ''; $tmp = '';
		$timeary = array(); 
		for($i = 8.00; $i<$max; $i+=0.05)
		{
			$timeary[] = $i;
			$tmp = (string)$i.'.,00';
			
			//$rtn .= $tmp;
			$tmp = explode('.', $tmp);
			
			if($tmp[1] == '55')
				$i+=0.40;
			
			
		}
		/*while($rowcon = $gic->fetch(PDO::FETCH_ASSOC))
			{
				$at = explode(' ', $rowcon['atime']);
				if($i == (float)$at[0])
					$startposAll = array_diff($startposAll,array($pHistory['eid']));
					
			}*/
			
		//if($gic->rowCount() > 1)
		$timeary = array_diff($timeary,$dbtime);
		
		echo $timeary = implode(',',$timeary);
		
		
		
		
		/*if($q->rowCount() > 0)
		{
			echo '<option value="">Select State</option>';
			while($row = $q->fetch(PDO::FETCH_ASSOC))
			{
				echo '<option value="' . $row['statename'] . '">' . $row['statename'] . '</option>';
			}
			
		}
		else 
		{
			echo 1;
		}*/
	}
	else echo 'Something went wrong.';
?>