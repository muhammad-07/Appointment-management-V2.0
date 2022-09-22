<?php
	include_once('condata.php');
	//include_once('../template/sesschk.php');
									$sql = "SELECT DISTINCT ".$_POST['t']."
											FROM `".$_POST['t']."s`
											WHERE `".$_POST['t']."` like '%".$_POST['tvalues']."%'
											AND isActive IS NULL
											AND ".$_POST['t']." != ''
											ORDER BY ".$_POST['t']."
											LIMIT 5";
									
									$q = $dbh->query($sql);
									$tags = '';
									while($row = $q->fetch(PDO::FETCH_ASSOC))
									{
										$tags .= '***'.$row[$_POST['t']];
									}
									echo $tags;
									//echo '***'.'asds'.'***'.'dasds';
?>