<?php
	session_start();

	if(isset($_POST['email']) && $_POST['email'] != '' && isset($_POST['password']) && $_POST['password'] != '')
	{
		/*$msgs[] = '<div class="alertMsg bgred">Please enter a valid email and password</div>';
		$_SESSION['MSGS'] 	 = $msgs;
		header('location: ../signin');
		exit(0);*/
		require('../includes/condata.php');
		try{
				$stmtl = $dbh->prepare('SELECT fname, lname, link,utype,isActive FROM zz_admin WHERE admin_mail = :email AND admin_pass = :pass limit 1');
				$stmtl->execute(array(
					':email' => $_POST['email'],
					':pass' => $_POST['password']
				));
				$l = $stmtl->fetch();
				
				if($l['link'] != '')
				{
					if($l['isActive'] == '1')
					{
						$_SESSION['a']['fnm']     = $l['fname'];
						$_SESSION['a']['lnm']     = $l['lname'];
						$_SESSION['a']['link']    = $l['link'];
						$_SESSION['a']['utype']   = $l['utype'];
						
						header('location: appointments');
						exit(0);
					}
					else
					{
						$msgs[] = '<div class="alertMsg bgred">Please confirm your email first.</div>';
						$_SESSION['MSGS'] = $msgs;
						
					}
				}
				else
				{
					$msgs[] = '<div class="alertMsg bgred">Invalid email or password</div>';
					$_SESSION['MSGS'] = $msgs;
					
				}

		}catch(PDOException $e) {
			$msgs[] ='<p class="bg-danger">'.$e->getMessage().'</p>';
			$_SESSION['MSGS'] = $msgs;
				header('location: index');
				exit(0);
		}
	}
	$siteKey = '6LfFFCgTAAAAAOC7pFx14_-o3g4m51G1wak3pU_X';
	$secret = '6LfFFCgTAAAAAEIl2XmbjLh3DGK8GOF-woNtIqfX';
?>
<!doctype html>
<html lang="en">
    <head>
        <title>APPOINTMENT ADMIN</title>
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
    <body class=" sidebar_hidden">
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

        <div id="wrapper_all" style="background-image: url(img/laptop_apple_canon_table_73452_1920x1200.jpg); background-attachment: fixed; color:#fff;">
            

			<!-- mobile navigation -->
<style type="text/css">
textarea, input[type="text"], input[type="submit"] {
    text-transform: none;
}
</style>


                            
<nav id="mobile_navigation"></nav>


<section class="container clearfix" style="padding-top:96px;">
    <div id="main_content_outer" class="clearfix">
        <div id="main_content">

            <!-- main content -->
            <div class="row">
				<?php require('../includes/chkmsgs.php'); ?>
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">APPOINTMENT ADMIN</h4>
                        </div>
                        <div class="panel_controls">
                            <div class="row">
							 <form method="post" name="cv_filter_form" id="country" method="post">
										
										<div class="col-md-12">
											<label for="table_search">Email</label>
											<input type="text" class="form-control" name="email" id="email" placeholder="Email"  value="" required >
											<p class="error text-danger" id="err_country" required></p>
                                        </div>
										<div class="col-md-12">
											<label for="table_search">Password</label>
											<input type="password" class="form-control" name="password" id="password" placeholder="Password"  value="" required >
											<p class="error text-danger" id="err_country" required></p>
                                        </div>
										<div class="col-sm-4">
										
										<!-- <div class="center-block">
							<center><div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div></center>
							<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script>
                        </div>-->
									    <label for="un_member">&nbsp;</label>
										 
										 <button type="submit" name="Add" class="btn btn-success add_btn"> Login  </button>  
										
											
											
										</div>
                                  </form>     
							</div>
						</div>
						 
                    </div>
					
               </div>
							
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<div id="footer_space"></div>
		</div>
				<?php
		
include("includes/footer.php");
//include("includes/sidebar.php");

 ?>
<!--[[ page specific plugins ]]-->
<!-- responsive table -->
<script src="js/lib/FooTable/js/footable.js"></script>
<script src="js/lib/FooTable/js/footable.sort.js"></script>
<script src="js/lib/FooTable/js/footable.filter.js"></script>
<script src="js/lib/FooTable/js/footable.paginate.js"></script>
<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="js/pages/ebro_responsive_table.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	

});
</script>			

</body>
</html>