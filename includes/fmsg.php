<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk.php');
	require_once PATH . 'includes/condata.php';
	require_once PATH . 'includes/funcs.php';
	if( isset( $_POST['cn'] ) && !empty( $_POST['cn'] ) )
	{
		if($_SESSION['utype'] == 'candidate')
		{
			$who = 'candidate';
			//$path = 'candidate';
			$revpath = 'business';
		}
		else{
			$who = 'business';
			//$path = 'business';
			$revpath = 'candidate';
		}
		
		
		$sql = "SELECT mid,msg,rid,sid,mtype,mlink,oname, UNIX_TIMESTAMP() - UNIX_TIMESTAMP(addedon) AS TimeSpent from `message`
		WHERE (( rid = '".$_SESSION[$who]['link']."' AND sid = '".$_POST['cn']."') OR 
		( sid = '".$_SESSION[$who]['link']."' AND rid = '".$_POST['cn']."')) AND mid > ".$_POST['lmsg']." ORDER BY mid ASC";
		
		$q = $dbh->query($sql);
		$total = $q->rowCount($sql);
		if($total > 0)
		{
			if($_SESSION['utype'] == 'candidate')
				$sender = 'business';
			else
				$sender = 'candidate';
			
		while( $row = $q->fetch(PDO::FETCH_ASSOC) )
		{
			 
			if($row['rid'] == $_SESSION[$who]['link'])
			{
				//$ma = ($row['mtype'] != '' ? "<i class='fa fa-link msg_link'></i>&nbsp;<a target='_blank' href='".PATH."chatuploads/".$sender."/".$row['sid']."/".$row['mlink']."'>".$row['oname']."</a>" : $row['msg']);
				if($row['mtype'] == '')
					$ma = $row['msg'];
				else if($row['mtype'] == 11)		
					$ma = "<i class='fa fa-flag msg_link'></i>&nbsp;".$row['msg'];
				else
					$ma = "<i class='fa fa-link msg_link'></i>&nbsp;<a target='_blank' href='".PATH."chatuploads/".$sender."/".$row['sid']."/".$row['mlink']."'>".$row['oname']."</a>";
					
					
				
?>
			<div class="row msg_container base_receive">
                        <div class="avatar">
                            <img src="<?php echo '../profile/'.$revpath.'/'.$_POST['cn'].'/'.$_SESSION['rpic']; ?>" class="img-responsive">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p><?php echo $ma; ?></p>
                                <time><?php echo postago($row['TimeSpent']);?></time>
                            </div>
                        </div>
			</div>
<?php
			}
			else
			{
				//$ma = ($row['mtype'] != '' ? "<i class='fa fa-link msg_link'></i>&nbsp;<a target='_blank' href='".PATH."chatuploads/".$_SESSION['utype']."/".$row['sid']."/".$row['mlink']."'>".$row['oname']."</a>" : $row['msg']);
				if($row['mtype'] == '')
					$ma = $row['msg'];
				else if($row['mtype'] == '11')		
					$ma = "<i class='fa fa-flag msg_link'></i>&nbsp;".$row['msg'];
				else
					$ma = "<i class='fa fa-link msg_link'></i>&nbsp;<a target='_blank' href='".PATH."chatuploads/".$_SESSION['utype']."/".$row['sid']."/".$row['mlink']."'>".$row['oname']."</a>";
					
				
?>
			<div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                                <p><?php echo $ma; ?></p>
                                <time><?php echo postago($row['TimeSpent']);?></time>
                            </div>
                        </div>
                        <div class="avatar">
                            <img src="<?php echo '../profile/'.$who.'/'.$_SESSION[$who]['link'].'/'.$_SESSION[$who]['profImg']; ?>" class=" img-responsive ">
                        </div>
			</div>
<?php 
			}
			$id = $row['mid'];
		}
		
		echo '**M_S_G_E_X_P**'.$id;
		}
		else echo 0;
		
	}
?>