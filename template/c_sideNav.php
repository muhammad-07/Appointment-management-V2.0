<?php
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
	global $pc;
	$pc = calculateCandidateProfile($_SESSION['candidate']['link'],$dbh);
//$pc = calculateCandidateProfile($_SESSION['candidate']['link'],$dbh); ?>
<div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i style="border: 0;" class="fa fa-paypal"></i> <span style="color:skyblue">pro</span><span>pickd.com</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo PATH . $_SESSION['candidate']['profImg']; ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <a href="<?php echo PATH . 'candidate/profile?l=' . $_SESSION['candidate']['link']; ?>"><h2><?php echo $_SESSION['candidate']['fnm'].' '.$_SESSION['candidate']['lnm']; ?></h2></a>
			    
                        </div>
						
                    </div>
                    <!-- /menu prile quick info -->

                   
					
					

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="clearfix"></div>
					
					
							
                       <!-- <div class="menu_section">
                            <h3>General</h3>
			    
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="index.html">Dashboard</a>
                                        </li>
                                        <li><a href="index2.html">Dashboard2</a>
                                        </li>
                                        <li><a href="index3.html">Dashboard3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="form.html">General Form</a>
                                        </li>
                                        <li><a href="form_advanced.html">Advanced Components</a>
                                        </li>
                                        <li><a href="form_validation.html">Form Validation</a>
                                        </li>
                                        <li><a href="form_wizards.html">Form Wizard</a>
                                        </li>
                                        <li><a href="form_upload.html">Form Upload</a>
                                        </li>
                                        <li><a href="form_buttons.html">Form Buttons</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="general_elements.html">General Elements</a>
                                        </li>
                                        <li><a href="media_gallery.html">Media Gallery</a>
                                        </li>
                                        <li><a href="typography.html">Typography</a>
                                        </li>
                                        <li><a href="icons.html">Icons</a>
                                        </li>
                                        <li><a href="glyphicons.html">Glyphicons</a>
                                        </li>
                                        <li><a href="widgets.html">Widgets</a>
                                        </li>
                                        <li><a href="invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="inbox.html">Inbox</a>
                                        </li>
                                        <li><a href="calender.html">Calender</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="tables.html">Tables</a>
                                        </li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="chartjs.html">Chart JS</a>
                                        </li>
                                        <li><a href="chartjs2.html">Chart JS2</a>
                                        </li>
                                        <li><a href="morisjs.html">Moris JS</a>
                                        </li>
                                        <li><a href="echarts.html">ECharts </a>
                                        </li>
                                        <li><a href="other_charts.html">Other Charts </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Live On</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="e_commerce.html">E-commerce</a>
                                        </li>
                                        <li><a href="projects.html">Projects</a>
                                        </li>
                                        <li><a href="project_detail.html">Project Detail</a>
                                        </li>
                                        <li><a href="contacts.html">Contacts</a>
                                        </li>
                                        <li><a href="profile.html">Profile</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="page_404.html">404 Error</a>
                                        </li>
                                        <li><a href="page_500.html">500 Error</a>
                                        </li>
                                        <li><a href="plain_page.html">Plain Page</a>
                                        </li>
                                        <li><a href="login.html">Login Page</a>
                                        </li>
                                        <li><a href="pricing_tables.html">Pricing Tables</a>
                                        </li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                                </li>
                            </ul>
                        </div> -->
			<div class="menu_section">
                            
                            <ul class="nav side-menu">
								<li>
									<a href="<?php echo PATH . 'candidate/profile?l=' . $_SESSION['candidate']['link']; ?>">
                                    <div class="project_progress">
																<div class="progress progress-striped progress_sm">
																	<div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="<?php echo $pc; ?>"></div>
																</div>
																<small>Profile completed <?php echo $pc;?>%</small>
															</div>
									</a>
									<br/>
									
                                </li>
                                <li><a href="<?php echo PATH . 'candidate/'; ?>"><i class="fa fa-search-plus"></i> Find jobs </a></li>
                                <li><a href="<?php echo PATH . 'candidate/job-invites'; ?>"><i class="fa fa-plane"></i> Jobs Invitations </a></li>
                                <li><a href="<?php echo PATH . 'candidate/test-invites'; ?>"><i class="fa fa-plane"></i> Test Invitations </a></li>
                                <li><a href="<?php echo PATH . 'candidate/resume?l=' . $_SESSION['candidate']['link']; ?>"><i class="fa fa-download"></i> Resume <code>New</code></a></li>
								<li><a><i class="fa fa-globe"></i> Change Language <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="setLanguage?lang=es-DO&r=<?php echo $_SERVER['REQUEST_URI']; ?>"><img src="<?php echo PATH . 'hp/images/flags/es-DO.png'; ?>" />&nbsp;Spanish</a>
                                        </li>
										<li><a href="setLanguage?lang=en-US&r=<?php echo $_SERVER['REQUEST_URI']; ?>"><img src="<?php echo PATH . 'hp/images/flags/en-US.png'; ?>" />&nbsp;English</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                                <!--<li><a><i class="fa fa-desktop"></i> Jobs <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        
                                        <li><a href="projects.html">Active jobs</a></li>
                                        
                                    </ul>
                                </li>-->
                                
                                
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
		    <div class="sidebar-footer hidden-small">
                      <!--  <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>-->
			<div style="line-height:40px; text-align:center; width:100%">&copy; propickd.com</div>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
</div>