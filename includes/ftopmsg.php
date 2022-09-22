<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk.php');
	require_once 'condata.php';
	require_once 'funcs.php';
			
		$sql = "SELECT mid,msg,sid, UNIX_TIMESTAMP() - UNIX_TIMESTAMP(addedon) AS TimeSpent from `message`
		WHERE rid = '".$_SESSION[$_SESSION['utype']]['link']."' and isRead = 0
		GROUP BY sid
		ORDER BY mid ASC
		";
		
		$q = $dbh->query($sql);
		$totmsg = $q->rowCount($sql);
		if($totmsg > 0)
		{
		$revusr = getRevUsr($_SESSION['utype']);
			while( $row = $q->fetch(PDO::FETCH_ASSOC) )
			{ ?>
				<li>
                                        <a href="<?php echo 'message?cnv='.$row['sid'].'&secure=1&live=on&usersonly=true';?>">
                                            <span class="image">
                                        <img src="<?php echo PATH.'profile/'.$revusr.'/'.$row['sid'].'/'.getUserPic($row['sid'], $revusr, $dbh); ?>" alt="user" />
                                    </span>
                                            <span>
                                        <span><?php echo getUserName($row['sid'], 'candidate', $dbh); ?></span>
                                            <span class="time"><?php echo postago($row['TimeSpent']);?></span>
                                            </span>
                                            <span class="message">
                                        <?php echo $row['msg']; ?>
					    </span>
                                        </a>
                                </li>
			<?php	//$id = $row['mid'];
			}
			echo '**M_S_G_E_X_P**'.$totmsg;	
		}
		else echo 0;
		
	
?>