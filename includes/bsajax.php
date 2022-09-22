<?php
	define('PATH','../');
	require_once(PATH . 'template/sesschk_b.php');
	require_once 'condata.php';
	require_once 'funcs.php';
	if( isset( $_POST['sc'] ) && !empty( $_POST['sc'] ) )
	{
		if($_POST['sc'][0] == 'save')
		{
			$sql = "INSERT INTO `saved_candidates`
			(cid,bid) VALUES('".$_POST['sc'][1]."', '".$_SESSION['business']['link']."') ";
			if($dbh->query($sql))
			echo 1;
		}
		else
		{
			$sql = "DELETE from `saved_candidates`
			WHERE cid = '".$_POST['sc'][1]."'
			AND bid = '".$_SESSION['business']['link']."'";
			if($dbh->query($sql))
			echo 1;
		}
		
	}
	
	if( isset( $_POST['hr'] ) && !empty( $_POST['hr'] ) )
	{
		$pro_job = explode('~', $_POST['p']);
		$job = $pro_job[1];
		$pro = $pro_job[0];
		if($_POST['hr'][0] == 'hire')
		{
			$sql = "UPDATE `proposals`
			SET status = 1
			WHERE pid = ".$pro."
			AND pby = '".$_POST['hr'][1]."'";
			if($dbh->query($sql))
			{
				$sql = "INSERT INTO noti (ntype, nfrom, nto, nfor) VALUES('2', '".$_SESSION['business']['link']."', '".$_POST['hr'][1]."', '".$job."')";
				$q = $dbh->query($sql);
				echo 1;
			}
		}		
	}
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'lj' )
	{
		loadjobs('',$dbh);
	}
	function loadjobs($l,$dbh)
	{
		echo '<select class="form-control input-lg"  name="jobs" id="jobs" requ>';				
				$sql = 'SELECT jid, jtitle FROM jobs WHERE pby = "'.$_SESSION['business']['link'].'" AND jstatus IS NULL ORDER BY jid DESC';
				$q = $dbh->query($sql);
				while($row = $q->fetch(PDO::FETCH_ASSOC))
				{
					echo '<option value="' . $row['jid'] . '">' . $row['jtitle'] . '</option>';
				}
		echo '</select>';
	}
	
	
	if( isset( $_POST['t'] ) && $_POST['t'] == 'invjob' )
	{
		$invids = ltrim($_POST['inv'], 'u_');
		$invids = rtrim($invids, '_');
		
		$invids = explode('_', $invids);
		
		foreach ($invids as $inv)
		{
			try{
						$stmt = $dbh->prepare('INSERT INTO `job_inv` (invby, invto, invfor) VALUES (:invby, :invto, :invfor) ');
						
						$suc = $stmt->execute(array(
							':invby' => $_SESSION['business']['link'],
							':invto' => $inv,
							':invfor' => $_POST['j']
							
						));
						
														
			} catch(PDOException $e) {
				echo "<div class='alertMsg bgred'>".$e->getMessage()."</div>";
			}
			$sql = "INSERT INTO noti (ntype, nfrom, nto, nfor) VALUES('7', '".$_SESSION['business']['link']."', '".$inv."', '".$_POST['j']."')";
			$q = $dbh->query($sql);
			
			
			
$emailsend = '';	
$email_header = '';	
$email_footer = '';	
$email_regards = '';	
$email_msg = '';	
$email_body= '';	

$clink= 'http://propickd.com/viewJob?j=';

$subject = 'Job invitation';
		
		//$headers = "From: info@veloahi.com \r\n";
		$headers = "From:info@propickd.com \r\n";
		//$headers .= "No-Reply: info@needsxchange.com \r\n";
		$headers .= "Reply-To: info@propickd.com \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$email_header .= '		<body bgcolor="#fff">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#fff">
  <tr>
    <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="61">
			<a href= "http://propickd.com" target="_blank">
				<div style="width:50px; height:50px; margin-left:7px; margin-top:7px; background:green; border-radius:100%; text-align:center; line-height:51px;color:#fff">P</div>
			</a>
		</td>
                <td width="144">
			<a href= "http://propickd.com" style="text-decoration:none" target="_blank">
				<div style="width:144px; height:56px; line-height:76px; font-family: Verdana; color:#010101; font-size:20px; text-decoration:none">ProPickd.com</div>
			</a>
		</td>
                <td width="393"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="46" align="right" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="67%" align="right"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px; text-transform:uppercase"><a href= "http://propickd.com" style="color:#68696a; text-decoration:none"><strong></strong></a></font></td>
                            <td width="29%" align="right"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#68696a; font-size:8px"><a href= "http://propickd.com" style="color:#68696a; text-decoration:none; text-transform:uppercase"><strong>CONTACT US</strong></a></font></td>
                            <td width="4%">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="30"><img src="http://propickd.com/images/email/PROMO-GREEN2_01_04.jpg" width="393" height="30" border="0" alt=""/></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
	';
	

$email_body = '	
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%">&nbsp;</td>
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, \'Times New Roman\', Times, serif; color:#010101; font-size:24px"><strong><em>
		Hello Sparky</em></strong></font><br /><br />
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px">
		  ';
		  
$email_msg = '		 Congrats!! You have been invited to apply for a job


<br/><br/>Please take action for this job invitation to make sure that you don\'t miss the chance to get hired by one of the worlds best picked company.
<br /><br />
<font style="font-family: Georgia, \'Times New Roman\', Times, serif; color:#ffffff; font-size:14px">
<em><a href="'.$clink.$_POST['j'].'" target="_blank" style="color:#6ebe44; text-decoration: underline">click here</a></em></font>
to apply or ignore.
';

$email_regards = '<br /><br />
Warm Regards<br />
Propickd.com team</font></td>
                <td width="10%">&nbsp;</td>
              </tr>';
              /*<tr>
                <td>&nbsp;</td>
                <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="http://propickd.com/images/email/PROMO-GREEN2_04_01.jpg" width="108" height="9" style="display:block" border="0" alt=""/></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle" bgcolor="#6ebe44"><font style="font-family: Georgia, 'Times New Roman', Times, serif; color:#ffffff; font-size:14px"><em><a href="http://propickd.com" target="_blank" style="color:#ffffff; text-decoration: underline">click here</a></em></font></td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle" bgcolor="#6ebe44"><font style="font-family: Georgia, 'Times New Roman', Times, serif; color:#ffffff; font-size:15px"><strong><a href="http://propickd.com" target="_blank" style="color:#ffffff; text-decoration:none"><em>LOREM</em></a></strong></font></td>
                  </tr>
                  <tr>
                    <td height="10" align="center" valign="middle" bgcolor="#6ebe44"> </td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>*/
$email_footer = '            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><img src="http://propickd.com/images/email/PROMO-GREEN2_07.jpg" width="598" height="7" style="display:block" border="0" alt=""/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="13%" align="center">&nbsp;</td>
                <td width="14%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://propickd.com" style="color:#010203; text-decoration:none"><strong>UNSUBSCRIBE </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="9%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://propickd.com" style="color:#010203; text-decoration:none"><strong>ABOUT </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="10%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://propickd.com" style="color:#010203; text-decoration:none"><strong>PRESS </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="11%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://propickd.com" style="color:#010203; text-decoration:none"><strong>CONTACT </strong></a></font></td>
                <td width="2%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><strong>|</strong></font></td>
                <td width="17%" align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#010203; font-size:9px; text-transform:uppercase"><a href= "http://propickd.com" style="color:#010203; text-decoration:none"><strong>STAY CONNECTED</strong></a></font></td>
                <td width="4%" align="right"><a href="https://www.facebook.com/" target="_blank"><img src="http://propickd.com/images/email/PROMO-GREEN2_09_01.jpg" alt="facebook" width="23" height="19" border="0" /></a></td>
                <td width="5%" align="right"><a href="https://twitter.com/" target="_blank"><img src="http://propickd.com/images/email/PROMO-GREEN2_09_02.jpg" alt="twitter" width="27" height="19" border="0" /></a></td>
                <td width="4%" align="right"><a href="http://www.linkedin.com/" target="_blank"><img src="http://propickd.com/images/email/PROMO-GREEN2_09_03.jpg" alt="linkedin" width="25" height="19" border="0" /></a></td>
                <td width="5%">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><font style="font-family:\'Myriad Pro\', Helvetica, Arial, sans-serif; color:#231f20; font-size:8px"><strong>Head Office &amp; Registered Office | Propickd.com, Adress added soon, Company Street, City, State, Zip Code | Tel: 123 555 555 | <a href= "http://propickd.com" style="color:#010203; text-decoration:none">care@propickd.com</a></strong></font></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>	';

		$email = getEmlbyLnk($inv, 'candidate', $dbh);
		$emailsend = $email_header.$email_body.$email_msg.$email_regards.$email_footer;

		mail($email, $subject, $emailsend, $headers);	
			
		}
		if($suc > 0)			
			echo 1;
			
	}
?>