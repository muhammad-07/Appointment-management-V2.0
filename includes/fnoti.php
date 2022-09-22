<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk.php');
	require_once 'condata.php';
	require_once 'funcs.php';
	//require_once 'ntype_def.php';
			
		$sql = "SELECT *, UNIX_TIMESTAMP() - UNIX_TIMESTAMP(addedon) AS TimeSpent from `noti`
		WHERE nto = '".$_SESSION[$_SESSION['utype']]['link']."' and isRead = 0
		GROUP BY nfor, ntype
		ORDER BY nid DESC";
		
		$q = $dbh->query($sql);
		$totnotis = $q->rowCount($sql);
		if($totnotis > 0)
		{
		$revusr = getRevUsr($_SESSION['utype']);
		
		$totnotis = 0;
		
			while( $row = $q->fetch(PDO::FETCH_ASSOC) )
			{ 
				$noti_msg = '';
				$noti_pg_link = '';
				/*if($row['ntype'] == '1')
				{
					$noti_pg_link = 'proposals?job=';
					$noti_msg = 'One of your job has received new proposal(s)';
				}*/
				switch($row['ntype'])
				{
					case '1':
						$noti_pg_link = 'proposals?job=';
						$noti_msg = 'One of your job has received new proposal(s)';
					break;
					case '2':
						$noti_pg_link = PATH . 'viewJob.php?j=';
						$noti_msg = 'You are hired for a job, Accept to start contract';
					break;
					case '5':
						$noti_pg_link = PATH . 'business/proposals?job=';
						$noti_msg = 'You posted a new job';
					break;
					case '11': // Contract started
						$noti_pg_link = PATH . ($_SESSION['utype'] == 'business' ? 'business#' : 'viewJob.php?j=');
						$noti_msg = 'Contract started';
					break;
					case '7': // Invitation for job
						$noti_pg_link = PATH . 'viewJob.php?j=';
						$noti_msg = 'Invitation for job';
					break;
					default:
						$noti_msg = '';
						$noti_pg_link = '';
					
				}
				if($row['isRead'] == '0')
				{
					$totnotis++;
				}
		?>

				<li>
                                        <a href="<?php echo $noti_pg_link . $row['nfor'].'&noti=1&live=on&usersonly=true';?>">
                                             <!--<span class="image">
					    <i class="fa fa-angle-right"></i>
                                       <img src="<?php echo PATH.'profile/'.$revusr.'/'.$row['nfrom'].'/'.getUserPic($row['nfrom'], $revusr, $dbh); ?>" alt="user" />
                                    </span>-->
                                            <span>
                                       <!-- <strong><?php echo getUserName($row['nfrom'], 'candidate', $dbh); ?></strong>
                                            <span class="time"><?php echo postago($row['TimeSpent']);?></span>-->
                                            </span>
                                            <span class="message">
                                        <i class="fa fa-flag"></i>&nbsp; <?php echo $noti_msg  ?><br/>
					<span style="float:right; margin-top:7px; color:#c1c1c1"><?php echo postago($row['TimeSpent']);?></span>
					    </span>
					    
                                        </a>
                                </li>
			<?php	//$id = $row['nid'];
			}
			echo '**N_T_E_X_P**'.$totnotis;
		}
		else echo 0;
		
	
?>