<?php
	function postago($diff)
	{
		$years   = floor($diff / (365*60*60*24)); 
		$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		$minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
		$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 

		if($years > 0)
			return $years.' '.($years>1?'years ago':'year ago');
		elseif($months)
			return $months.' '.($months>1?'months ago':'month ago');
		elseif($days)
			return $days.' '.($days>1?'days ago':'day ago');
		elseif($hours)
			return $hours.' '.($hours>1?'Hrs ago':'Hr ago');
		elseif($minuts)
			return $minuts.' '.($minuts>1?'mins ago':'min ago');
		else
			return "just now";
		
	}
	
	function clickable_link($text = '')
	{	
		$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
		$ret = ' ' . $text;
		$ret = preg_replace("#(^|[\n ])((http|https)+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\" rel=\"no_follow\">\\2</a>", $ret);

		$ret = preg_replace("#(^|[\n ])((www|ftp|ftps)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
		$ret = substr($ret, 1);
		//$ret = preg_replace("/(\\s#\w+)/u", " <a href='./hash.php?hash=$1'><span class='hash'>$1 &nbsp;</span></a>", $ret);

		$ret = preg_replace("/(#\w+)/u", "<a href='./hash.php?hash=$1'><span class='hash'>$1</span></a>", $ret);
		$ret = preg_replace("/([\\s]#\w+)/u", "<a href='./hash.php?hash=$1'><span class='hash'>$1</span></a>", $ret);
		$ret = str_ireplace("hash=#","hash=",$ret);
		return $ret;
	}
	function randomPassword($l='', $t='', $clm='', $dbh='') {
		//$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$return = '';
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		if($l == '')
			$l = 7;
		for ($i = 0; $i < $l; $i++) {
			$return .= $alphabet[mt_rand(0, $alphaLength)];
		}
		if($t != '')
		{
			try{
		
			$stmt = $dbh->prepare('SELECT '.$clm.' FROM '.$t.' WHERE '.$clm.' =:unique limit 1');
				
			$stmt->execute(array(
				':unique' => $return
			));
			$lnk = $stmt->fetch();
		
			if($lnk[$clm] != '')
				$return = randomPassword($l+1, $t, $clm, $dbh);
		
			}catch(PDOException $e) {
				$msgs[] =   "<div class='alertMsg bgred'>".$e->getMessage()."</div>";
			}
		
		}
		//return implode($pass); //turn the array into a string
		return $return; //turn the array into a string
	}
	function isAppointmentTaken($d, $t, $dbh)
	{
		/*$gi = "SELECT atime
				FROM `appointment`
				WHERE DATE_FORMAT( adate, '%Y-%m-%d' ) = '" . $_POST['adt'] . "' AND atype = '" . $t . "'
				";*/
				
		$gi = "SELECT *
				FROM `appointment`
				WHERE adate = '" . date('Y-m-d',strtotime($d)) . "' AND atime = '" . $t . "' limit 2
				";
										
		$gic = $dbh->query($gi);
		return $gic->rowCount();
	}
	function getEmlbyLnk($u, $t, $dbh)
	{
		$sql = "SELECT email from `".$t."`
			WHERE link = '$u'
			limit 1";
								
		$q = $dbh->query($sql);
		$row = $q->fetch(PDO::FETCH_ASSOC);
		return $row['email'];
	}
	function getLnkbyEml($e, $t, $dbh)
	{
		$sql = "SELECT link from `".$t."`
			WHERE eml = '$e'
			limit 1";
								
		$q = $dbh->query($sql);
		$row = $q->fetch(PDO::FETCH_ASSOC);
		return $row['link'];
	}
	function getUserName($u, $t, $dbh)
	{
		$sql = "SELECT lname,fname from `".$t."`
			WHERE link = '$u'
			limit 1";
								
		$q = $dbh->query($sql);
		$row = $q->fetch(PDO::FETCH_ASSOC);
		return $row['lname'].' '.$row['fname'];
	}	
	
	function checkRetake($l, $i, $c, $dbh)
	{
		try{
		//$stmt = $dbh->prepare('SELECT * FROM `testscore` WHERE cid = :link AND isco = :isco AND classification = :classification AND (scored = "" OR  (scored != "" AND completedon < DATE_FORMAT( NOW( ) , "%Y-%m-%d " )))limit 1');
		
		// ### CHANGED AND completedon < DATE_FORMAT( DATE_ADD( NOW() to AND completedon < DATE_FORMAT( DATE_ADD( completedon @9/19/16
		
		$stmt = $dbh->prepare('SELECT tlink, DATE_FORMAT( DATE_ADD( completedon, INTERVAL 6 MONTH ), "%Y-%m-%d %h:%i:%s" ) AS retake FROM `testscore`
		WHERE cid = :link
		AND isco = :isco
		AND classification = :classification
		AND completedon < DATE_FORMAT( DATE_ADD( completedon, INTERVAL 6 MONTH ), "%Y-%m-%d %h:%i:%s" )
		ORDER BY tid DESC
		limit 1');
		
		$stmt->execute(array(
			':link' => $l,
			':isco'  => $i,
			':classification'  => $c
			
		));
		$tst = $stmt->fetch(PDO::FETCH_ASSOC);
		 
		if($stmt->rowCount() > 0)
		{
				return array('tlink'=>$tst['tlink'], 'retake' => $tst['retake']);
		}
		else
			return 0;
		}catch(PDOException $e) {
		echo  "<div class='alertMsg bgred'>".$e->getMessage()."</div>";
		}
		
	}
?>