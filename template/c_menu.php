<?php
	if(!isset($pc))
	{
		function calculateCandidateProfile($u,$dbh)
	{
		try{
			$stmt = $dbh->prepare('SELECT *, c.title as ctitle FROM candidate c
									left join c_edu e on c.link = e.cid 
									left join c_workexp w on c.link = w.cid 
									left join c_contact con on c.link = con.link 
									WHERE c.link = :cid limit 1');
			
			$stmt->execute(array(
				':cid' => $u
			));
			
			$p = $stmt->fetch();		
							
		} catch(PDOException $e) {
		$msgs[] = "<div class='alertMsg bgred'>".$e->getMessage()."</div>";
		}
		
		$totalprofile = 15; $userprofile = 1;
		$userprofile += ($p['ctitle'] == '' ? 0 : 1);
		$userprofile += ($p['profImage'] == '' ? 0 : 1);
		$userprofile += ($p['country'] == '' ? 0 : 1);
		$userprofile += ($p['academic'] == '' ? 0 : 1);
		$userprofile += ($p['experience'] == '' ? 0 : 1);
		$userprofile += ($p['industry'] == '' ? 0 : 1);
		$userprofile += ($p['skills'] == '' ? 0 : 1);
		$userprofile += ($p['languages'] == '' ? 0 : 1);
		$userprofile += ($p['jobstatus'] == '' ? 0 : 1);
		$userprofile += ($p['objective'] == '' ? 0 : 1);
		$userprofile += ($p['wmi'] == '' ? 0 : 1);
		$userprofile += ($p['wid'] == '' ? 0 : 1);
		$userprofile += ($p['eid'] == '' ? 0 : 1);
		$userprofile += ($p['contact'] == '' ? 0 : 1);
		
		//return round($userprofile/$totalprofile)*100;
	    return round($userprofile*100/$totalprofile);
	}
		$pc = calculateCandidateProfile($_SESSION['candidate']['link'],$dbh);
	}
?>
<!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
			    
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo PATH . $_SESSION['candidate']['profImg']; ?>" alt="user"> <?php echo $_SESSION['candidate']['fnm']; ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li>
                                        <a href="<?php echo PATH . 'candidate/profile?l='.$_SESSION['candidate']['link']; ?>">
                                            <span class="badge bg-red pull-right"><?php echo $pc;?>%</span>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo PATH . 'candidate/settings?usx=3&udm=true'; ?>">
                                            <!--<span class="badge bg-red pull-right">50%</span>-->
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo PATH;?>contact">Help & Support</a>
                                    </li>
                                    <li><a href="<?php echo PATH; ?>signout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
			    
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span style="display:none" id="msgbadge" class="badge bg-green">0</span>
                                </a>
                                <ul id="msgs" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <!--<li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Hay.. Please provide me pdf
                                    </span>
                                        </a>
                                    </li>-->
                                    
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>No new message</strong>
                                               
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
			    <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell-o"></i>
                                    <span style="display:none" id="nbadge" class="badge bg-green">0</span>
                                </a>
                                <ul id="notis" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <!--<li>
                                        <a>
                                            <span class="image">
                                        <img src="<?php echo PATH; ?>images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        You got an invitation.
                                    </span>
                                        </a>
                                    </li>-->
                                    
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>No new notification</strong>
                                                <!--<i class="fa fa-angle-right"></i>-->
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
			    <!--
			    <li role="button" class="">
                                <a href="search?f=c">
                                    <i class="fa fa-search-plus"></i>
                                    
                                </a>
                               
                            </li>-->
			    
                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->