<?php if (!isset($_SESSION)) {  session_start();} ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Admin Panel</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="js/lib/bootstrap-switch/stylesheets/bootstrap-switch.css">
        <link rel="stylesheet" href="js/lib/bootstrap-switch/stylesheets/ebro_bootstrapSwitch.css">	
        <link rel="stylesheet" href="css/style.css">

        <style type="text/css" rel="stylesheet">

            .hint {
                display: none;
                position: absolute;
                right: -100%;
                width:100%;
                margin-top: -4px;
                border: 1px solid #c93;
                padding: 10px 12px;
                margin-top:-20px;
                background: #ffc url(pointer.gif) no-repeat -10px 5px;
            }
        </style>
        <!-- multiple select -->
        <script src="js/jquery.min.js"></script>
       

        <style type="text/css">
            img.ri
            {
                position: absolute;
                max-width: 100%;
                top: 10%;
                left: 10%;
            }
            img.ri:empty
            {
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                -o-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
            @media screen and (orientation: portrait) {
                img.ri { max-width: 90%; }
            }

            @media screen and (orientation: landscape) {
                img.ri { max-height: 90%; }
            }
        </style>

    </head>
    <body class=" sidebar_hidden side_fixed">
        <header id="top_header"  style="background:#F04B51;color:#fff;">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 col-sm-2">
							<a href="index.php" class="logo_main" title=""  style="color:#fff;">APPOINTMENT ADMIN</a>
						</div>
						<div class="col-sm-push-4 col-sm-3 text-right hidden-xs">
							
						</div>
			         
                </div>
            </div>
        </header>						

        <div id="wrapper_all">
            <!--<nav id="top_navigation">
                <div class="container">
                    <ul id="icon_nav_h" class="top_ico_nav clearfix">
                        <li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 1) {
                            echo "class='active'";
                        }
                        ?>>
                            <a href="index.php">
                                <i class="icon-home icon-2x"></i>
                                <span class="menu_label">Home</span>
                            </a>
                        </li>
                     <li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 2) {
                            echo "class='active'";
                        }
                        ?>>             
                            <a href="country.php">
                                <i class="icon-book icon-2x"></i>
                                <span class="menu_label">Add Country</span>
                            </a>
                        </li>
						 <li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 2) {
                            echo "class='active'";
                        }
                        ?>>             
                            <a href="state.php">
                                <i class="icon-book icon-2x"></i>
                                <span class="menu_label">Add State</span>
                            </a>
                        </li>
                       <li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 4) {
                            echo "class='active'";
                        }
                        ?>>             
                            <a href="city.php">
                               <i class="icon-book icon-2x"></i>
                                <span class="menu_label">Add City</span>
                            </a>
                        </li>
						
						<li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 4) {
                            echo "class='active'";
                        }
                        ?>>             
                            <a href="isco.php">
                               <i class="icon-book icon-2x"></i>
                                <span class="menu_label">Add Isco</span>
                            </a>
                        </li>
						<li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 4) {
                            echo "class='active'";
                        }
                        ?>>             
                            <a href="classification.php">
                               <i class="icon-book icon-2x"></i>
                                <span class="menu_label">Add Classification</span>
                            </a>
                        </li>
                        <li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 4) {
                            echo "class='active'";
                        }
                        ?>>             
                            <a href="competence.php">
                               <i class="icon-book icon-2x"></i>
                                <span class="menu_label">Add Competence</span>
                            </a>
                        </li>
			 <li <?php
                        if (isset($_SESSION['no']) && $_SESSION['no'] == 4) {
                            echo "class='active'";
                        }
                        ?>>             
                            <a href="question.php">
                               <i class="icon-book icon-2x"></i>
                                <span class="menu_label">Add Question</span>
                            </a>
                        </li>
                        
                        
						 
                       
                    </ul>
                </div>
            </nav>-->
           
            
            
