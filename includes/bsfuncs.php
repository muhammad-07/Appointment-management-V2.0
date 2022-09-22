<?php
	function isSavedCandidate($c,$dbh)
	{
		$sql = "SELECT sid from saved_candidates
			WHERE cid = '$c'
			AND bid = '".$_SESSION['business']['link']."'
			limit 1";
								
		$q = $dbh->query($sql);
		$row = $q->fetch(PDO::FETCH_ASSOC);
		if($row['sid'] == '')
			return NULL;
		else 
			return 1;
	}
	function b_getMatchProfile($usr, $prefcountry, $prefstate, $prefcity, $prefisco, $prefclassification, $prefindustry, $prefskills, $preflanguages, $SkillsMatch, $LanguagesMatch)
	{
		
			
		$totalMatch = 0;
		$profileMatch = 0;
		if( $prefcountry != '' )
		{
			$totalMatch++;
			if( trim($prefcountry) == trim($usr['country']) )
			{
				$profileMatch++;
			}
		}
		if( $prefstate != '' )
		{
			$totalMatch++;
			if( trim($prefstate) == trim($usr['state']) )
			{
				$profileMatch++;
			}
		}
		if( $prefcity != '' )
		{
			$totalMatch++;
			if( trim($prefcity) == trim($usr['city']) )
			{
				$profileMatch++;
			}
		}
		
		if( $prefisco != '' )
		{
			$totalMatch++;
			if( trim($prefisco) == trim($usr['isco']) )
			{
				$profileMatch++;
			}
		}
		if( $prefclassification != '' )
		{
			$totalMatch++;
			if( trim($prefclassification) == trim($usr['classification']) )
			{
				$profileMatch++;
			}
		}
		if( $prefindustry != '' )
		{
			$totalMatch++;
			if( trim($prefindustry) == trim($usr['industry']) )
			{
				$profileMatch++;
			}
		}
		if( $prefskills != '' )
		{
			$totalMatch++;									
			$profileMatch += $SkillsMatch;
			
		}
		if( $preflanguages != '' )
		{
			$totalMatch++;									
			$profileMatch += $LanguagesMatch;
			
		}
		
		if($totalMatch > 0)
		{
			$profileMatch = sprintf('%.2f',($profileMatch / $totalMatch) * 100);
		}
		else
		{
			$profileMatch = mt_rand(50,100);
		}
		return $profileMatch;
	}
	
	function getRemainingJobPosts($u = '', $dbh)
	{
		$sql = "SELECT jobposts,pid FROM b_sellings WHERE uid = '".$u."' ORDER BY sid DESC limit 1";
									
		$q = $dbh->query($sql);
		
		$rempost = $q->fetch(PDO::FETCH_ASSOC);
		
		return $rempost;
	}
?>