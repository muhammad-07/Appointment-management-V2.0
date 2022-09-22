<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk_c.php');
	require_once 'condata.php';
	if( isset( $_POST['exp_pos'] ) && !empty( trim($_POST['exp_pos']) ) )
	{
		$exppos = trim($_POST['exp_pos']);
		$cnm = trim($_POST['exp_name']);
		$frm = trim($_POST['exp_from']);
		$to  = trim($_POST['exp_to']);
		$tasks  = trim($_POST['exp_tasks']);
		
		$desc = ( isset( $_POST['exp_desc'] ) && !empty($_POST['exp_desc'] ) ) ? trim($_POST['exp_desc']) : NULL;
		
		if($cnm != '' || $frm != '' || $tasks != '' || $frm != '' || $to != '')
		{
			try{
				$statement = $dbh->prepare("INSERT INTO c_workexp
				(cid, position,name,duration,tasks,description)
				VALUES(:cid,:position,:name,:duration,:tasks,:description)");
				
				$inssuccess = $statement->execute(array(
										':cid' => $_SESSION['candidate']['link'], 
										':position' => $exppos,
										':name' => $cnm,
										':duration' => $frm .' to '.$to,
										':tasks' => $tasks,
										':description' => $desc
								));
				if($inssuccess > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		}
		else
		{
			echo 'Blank';
		}
		
	}
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'el' ) 
	{
			try{
				$statement = $dbh->prepare("select * from c_workexp WHERE cid = :cid order by wid DESC");
				
				
				$statement->execute(array(
										':cid' => $_SESSION['candidate']['link']
				));
				if($statement->rowCount() > 0)	
				{
					while($row = $statement->fetch(PDO::FETCH_ASSOC))
					{
						
						?>
						<div id="we_<?php echo $row['wid']; ?>" class="row experience">    
																		
								<span class="pull-right"><i id="wed_<?php echo $row['wid']; ?>" class="expClose fa fa-times" data-toggle="tooltip" data-original-title="Delete" onClick="$(this).d(this.id,'we')"></i></span>
								  
							<strong style="font-size:18px"><?php echo $row['position']; ?></strong>
							<p><?php echo $row['name']; ?></p>
							<div class="divider"></div>
					
					
							<p><strong>Tasks:</strong> <?php echo $row['tasks']; ?></p>
							
							<?php echo $row['description']; ?>
					   
							<div class="clearfix"></div>
							<div class="bottom text-right">
								<hr><i class="fa fa-clock-o"></i>&nbsp;<?php echo $row['duration']; ?>
							</div>
							
						</div>
						<?php
						
						
						
					}
				}
				
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		
		
	}
	
	if( isset( $_POST['edu_name'] ) && !empty( trim($_POST['edu_name']) ) )
	{
		$eduttl = trim($_POST['edu_title']);
		$enm = trim($_POST['edu_name']);
		$efrm = trim($_POST['edu_from']);
		$eto  = trim($_POST['edu_to']);
		
		
		$desc = ( isset( $_POST['edu_desc'] ) && !empty($_POST['edu_desc'] ) ) ? trim($_POST['edu_desc']) : NULL;
		
		if($enm != '' || $eduttl != '' || $efrm != '' || $eto != '')
		{
			try{
				$statement = $dbh->prepare("INSERT INTO c_edu
				(cid, title,institution,duration,description)
				VALUES(:cid,:title,:institution,:duration,:description)");
				
				$inssuccess = $statement->execute(array(
										':cid' => $_SESSION['candidate']['link'], 
										':title' => $eduttl,
										':institution' => $enm,
										':duration' => $efrm .' to '.$eto,
										
										':description' => $desc
								));
				if($inssuccess > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		}
		else
		{
			echo 'Blank';
		}
		
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'edul' ) 
	{
			try{
				$statement = $dbh->prepare("select * from c_edu WHERE cid = :cid order by eid DESC");
				
				
				$statement->execute(array(
					':cid' => $_SESSION['candidate']['link']
				));
				if($statement->rowCount() > 0)	
				{
					while($row = $statement->fetch(PDO::FETCH_ASSOC))
					{
						
						?>
						<div id="wedu_<?php echo $row['eid']; ?>" class="row experience" style="background:#f3fff8">  
																		
								<span class="pull-right"><i id="wedud_<?php echo $row['eid']; ?>" class="expClose fa fa-times" data-toggle="tooltip" data-original-title="Delete" onClick="$(this).d(this.id,'wedu')"></i></span>
								  
							<center>	  
														<strong style="font-size:18px"><?php echo $row['title']; ?></strong>
														<p><?php echo $row['institution']; ?></p>
														</center>
							<div class="divider"></div>
					
					
							
							
							<?php echo $row['description']; ?>
					   
							<div class="clearfix"></div>
							<div class="bottom text-right">
								<hr><i class="fa fa-clock-o"></i>&nbsp;<?php echo $row['duration']; ?>
							</div>
							
						</div>
						<?php
						
						
						
					}
				}
				
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		
		
	}
	
	if( isset( $_POST['dl'] ) ) 
	{
		
		$sql = "DELETE FROM `c_workexp`
		WHERE wid = ".$_POST['hr']."
		AND cid = '".$_SESSION['candidate']['link']."'";
		if($dbh->query($sql))
			echo 1;
		
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'ul' ) 
	{
			try{
				$statement = $dbh->prepare("UPDATE candidate set country =:country, state =:state, city =:city WHERE link =:cid limit 1");
				
				
				$suc = $statement->execute(array(
					
					':country' => $_POST['c'],
					':state' => $_POST['s'],
					':city' => $_POST['ct'],
					':cid' => $_SESSION['candidate']['link']
				));
				
				if($suc > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		
		
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'uo' ) 
	{
			try{
				$statement = $dbh->prepare("UPDATE candidate set objective =:objective WHERE link =:cid limit 1");
				
				
				$suc = $statement->execute(array(
					
					':objective' => $_POST['o'],
					
					':cid' => $_SESSION['candidate']['link']
				));
				
				if($suc > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		
		
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'uw' ) 
	{
			try{
				$statement = $dbh->prepare("UPDATE candidate set wmi =:wmi WHERE link =:cid limit 1");
				
				
				$suc = $statement->execute(array(
					
					':wmi' => $_POST['w'],
					
					':cid' => $_SESSION['candidate']['link']
				));
				
				if($suc > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		
		
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'uic' ) 
	{
		try{
			$statement = $dbh->prepare("UPDATE candidate set isco =:isco, classification =:classification WHERE link =:link limit 1");
			
			
			$suc = $statement->execute(array(
				
				':isco' => $_POST['i'],
				':classification' => $_POST['c'],
				
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc){
								
				$_SESSION['test']['classification'] = $_POST['c'];
				$_SESSION['test']['isco'] = $_POST['i'];
				$_SESSION['test']['link'] = $_SESSION['candidate']['link'];

				echo 1;
			}
				
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'uac' ) 
	{
		try{
			$statement = $dbh->prepare("UPDATE candidate set academic =:academic WHERE link =:link limit 1");
			
			
			$suc = $statement->execute(array(
				
				':academic' => $_POST['a'],			
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'uin' ) 
	{
		try{
			$statement = $dbh->prepare("UPDATE candidate set industry =:industry WHERE link =:link limit 1");
			
			
			$suc = $statement->execute(array(
				
				':industry' => $_POST['a'],			
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'ujs' ) 
	{
		try{
			$statement = $dbh->prepare("UPDATE candidate set jobstatus =:jobstatus WHERE link =:link limit 1");
			
			
			$suc = $statement->execute(array(
				
				':jobstatus' => $_POST['a'],			
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'uexp' ) 
	{
		try{
			$statement = $dbh->prepare("UPDATE candidate set experience =:experience WHERE link =:link limit 1");
			
			$suc = $statement->execute(array(
				
				':experience' => $_POST['a'],			
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'cv' ) 
	{
		$tbl = 'c_contact'; $fld = 'cid'; $candidate = 'link';
		
		if($_POST['cvt'] == 'eml')
		{
			$tbl = 'c_email';
			$fld = 'eid';
		}
		if($_POST['cvt'] == 'conO')
		{
			$tbl = 'c_other_contact';
			$fld = 'coid';
			$candidate = 'cid';
		}
		$pp = 1;
		if($_POST['pp'] == 'Set as public')
		{
			$pp = 'NULL';
			
		}
		try{
			
			$statement = $dbh->prepare("UPDATE ".$tbl." set isPublic = ".$pp." WHERE ".$candidate." =:link AND ".$fld." =:fld limit 1");
			
			$suc = $statement->execute(array(						
				':link' => $_SESSION['candidate']['link'],
				':fld' => $_POST['cvi']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'updtit' ) 
	{
		$tbl = 'candidate'; $fld = '';
		$stc = $_POST['hr'];

		if($stc == 's')
		{
			
			$fld = 'skills';
		}
		if($stc == 'l')
		{
			
			$fld = 'languages';
		}
		if($stc == 't')
		{
			
			$fld = 'title';
		}
		
		try{
			
			$statement = $dbh->prepare("UPDATE ".$tbl." set ".$fld." =:fld WHERE link =:link limit 1");
			
			$suc = $statement->execute(array(						
				':link' => $_SESSION['candidate']['link'],
				':fld' => $_POST['v']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'icon' ) 
	{
		
		try{
			
			$statement = $dbh->prepare("insert into c_contact (link,contact) VALUES(:link, :contact) ");
			
			$suc = $statement->execute(array(						
				':link' => $_SESSION['candidate']['link'],
				':contact' => $_POST['c']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'conlod' ) 
	{
		$sql = "SELECT * 
				FROM `c_contact`
				WHERE link = '".$_SESSION['candidate']['link']."'
				";
		
		$q = $dbh->query($sql);
		
			while($crow = $q->fetch(PDO::FETCH_ASSOC))
			{
				
			
				echo '
				<div id="con_'.$crow['cid'].'">
					<span>'.$crow['contact'].'</span>
					
					<span class="right disponhvr">
					
							<a href="#" id="emails" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
							<ul class="dropdown-menu pull-right" role="menu">
								<li id="con_'.$_SESSION['candidate']['link'].'_'.$crow['cid'].'" onClick="$(this).changeVisiblity(this.id,\''.$crow['isPublic'].'\');"><a href="javascript:" id="cv_c'.$crow['cid'].'">'.($crow['isPublic'] != '' ? "<i class='fa fa-globe'></i>&nbsp;Set as public" : "<i class='fa fa-eye-slash'></i>&nbsp;Set as only me").'</a></li>
								<li id="condl_'.$crow['cid'].'" onClick="$(this).del(this.id,0)"><a href="javascript:"><i class="fa fa-times"></i>&nbsp;Delete</a></li>
							</ul>
						
					</span>					
				
				</div>';

			}
	}
	
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'del' ) 
	{
		
		$sql = "DELETE FROM `c_contact`
		WHERE cid = ".$_POST['d']."
		AND link = '".$_SESSION['candidate']['link']."'";
		
		if($_POST['w'] == '1')
		{
			$sql = "DELETE FROM `c_other_contact`
			WHERE coid = ".$_POST['d']."
			AND cid = '".$_SESSION['candidate']['link']."'";
		}
		if($_POST['w'] == '2')
		{
			$sql = "DELETE FROM `c_resume`
			WHERE rid = ".$_POST['d']."
			AND clink = '".$_SESSION['candidate']['link']."'";
		}
		
		
		if($dbh->query($sql))
			echo 1;
		
	}
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'mma' ) 
	{
		try{
			$statement = $dbh->prepare("UPDATE candidate set isAnonymous = :s WHERE link =:link limit 1");
			
			
			$suc = $statement->execute(array(
				
				':s' => $_POST['s'],			
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
		
		$isPub = ($_POST['s'] == '1' ? '1' : 'NULL');
		
		try{
			
			$statement = $dbh->prepare("UPDATE c_contact set isPublic = ".$isPub." WHERE link =:link ");
			
			$suc = $statement->execute(array(						
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
		
		
		try{
			
			$statement = $dbh->prepare("UPDATE c_email set isPublic = ".$isPub." WHERE link =:link ");
			
			$suc = $statement->execute(array(						
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0)
				echo 1;
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'ppic' ) 
	{
		try{
			$statement = $dbh->prepare("UPDATE candidate set profImage = 'user.png' WHERE link =:link limit 1");
			
			
			$suc = $statement->execute(array(
						
				':link' => $_SESSION['candidate']['link']
			));
			
			if($suc > 0){
				$_SESSION['candidate']['profImg'] =  'profile/candidate/' . $_SESSION['candidate']['link'] . '/user.png';
				echo 1;
			}
				
		}catch(PDOException $e) {
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'sort' ) 
	{
		$o=1;
		$whr = ($_POST['oid'] == 'c_workexp' ? 'wid' : 'eid');
		foreach($_POST['order'] as $order)
		{
			try{
				$statement = $dbh->prepare("UPDATE `".$_POST['oid']."` set o = '".$o."' WHERE cid =:link AND ".$whr." = :order limit 1");
				
				
				$suc = $statement->execute(array(
							
					':link' => $_SESSION['candidate']['link'],
					':order' => $order
				));
				
				/*if($suc > 0){
					echo 1;
				}*/
					
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
			$o++;
		}
	}
	if( isset( $_POST['t'] ) && $_POST['t'] == 'ocon' ) 
	{
		if($_POST['lnk'] != '' && $_POST['lbl'] != '')
		{
			$lbl = strtolower($_POST['lbl']);
			if($lbl == 'facebook')
				$icon = '<i class="fa fa-facebook-square"></i>&nbsp;';
			else if($lbl == 'google+' || $lbl == 'g+')
				$icon = '<i class="fa fa-google-plus-square"></i>&nbsp;';
			else if($lbl == 'github')
				$icon = '<i class="fa fa-github-square"></i>&nbsp;';
			else if($lbl == 'twitter')
				$icon = '<i class="fa fa-twitter-square"></i>&nbsp;';
			else if($lbl == 'linkedin')
				$icon = '<i class="fa fa-linkedin-square"></i>&nbsp;';
			else if($lbl == 'youtube')
				$icon = '<i class="fa fa-youtube-play"></i>&nbsp;';
			else if($lbl == 'skype')
				$icon = '<i class="fa fa-skype"></i>&nbsp;';
			else
				$icon = '<i class="fa fa-globe"></i>&nbsp;';
			
			$lbl = $icon.$_POST['lbl'];
			$textlnk = $_POST['lnk'];
			$textlnk = preg_replace("#(^|[\n ])((http|https)+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\" rel=\"no_follow\">\\2</a>", $textlnk);
			$textlnk = preg_replace("#(^|[\n ])((www|ftp|ftps)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $textlnk);
			
			try{
				
				$statement = $dbh->prepare("insert into c_other_contact (cid, label, linktext) VALUES(:cid, :label, :linktext) ");
				
				$suc = $statement->execute(array(						
					':cid' => $_SESSION['candidate']['link'],
					':label' => $lbl,
					':linktext' => $textlnk
				));
				
				if($suc > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		}
	}
	
	
	
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'uedu' ) 
	{
				
		
					
		if($_POST['edu_title'] != '' && $_POST['edu_nm'] != '' && $_POST['edu_from'] != '' && $_POST['edu_to'] != '' && $_POST['e'] != '')
		{
			$eduttl = trim($_POST['edu_title']);
			$enm = trim($_POST['edu_nm']);
			$efrm = trim($_POST['edu_from']);
			$eto  = trim($_POST['edu_to']);
			///$eid  = explode('_', $_POST['e']);
			$eid = $_POST['e'];
			$desc = ( isset( $_POST['edu_desc'] ) && !empty($_POST['edu_desc'] ) ) ? trim($_POST['edu_desc']) : NULL;
			
			try{
				$statement = $dbh->prepare("UPDATE c_edu SET title = :title, institution =:institution, duration =:duration, description=:description WHERE eid = :e AND cid = :cid limit 1");
				
				$inssuccess = $statement->execute(array(
										
										':title' => $eduttl,
										':institution' => $enm,
										':duration' => $efrm .' to '.$eto,										
										':description' => $desc,
										':e' => $eid,
										':cid' => $_SESSION['candidate']['link']
								));
				if($inssuccess > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		}
		else
		{
			echo 'Some required fields are missing.';
		}
		
	}
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'updtexp' ) 
	{
				
		
					
		if($_POST['exp_position'] != '' && $_POST['exp_name'] != '' && $_POST['exp_from'] != '' && $_POST['exp_to'] != ''  && $_POST['exp_tasks'] != '' && $_POST['e'] != '')
		{
			$position = trim($_POST['exp_position']);
			$name = trim($_POST['exp_name']);
			$frm = trim($_POST['exp_from']);
			$to  = trim($_POST['exp_to']);
			$tasks  = trim($_POST['exp_tasks']);
		
			$desc = ( isset( $_POST['exp_desc'] ) && !empty($_POST['exp_desc'] ) ) ? trim($_POST['exp_desc']) : NULL;
			$eid = $_POST['e'];
			
			
			try{ 
				$statement = $dbh->prepare("UPDATE c_workexp SET position = :position, name =:name, duration =:duration, tasks = :tasks, description=:description WHERE wid = :e AND cid = :cid limit 1");
				
				$inssuccess = $statement->execute(array(
										
										':position' => $position,
										':name' => $name,
										':duration' => $frm .' to '.$to,										
										
										':tasks' => $tasks,
										':description' => $desc,
										':e' => $eid,
										':cid' => $_SESSION['candidate']['link']
								));
				if($inssuccess > 0)
					echo 1;
			}catch(PDOException $e) {
				echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			}
		}
		else
		{
			echo 'Some required fields are missing.';
		}
		
	}
?>