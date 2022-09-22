<!doctype html>
<?php
include('includes/sess.php');include('includes/config.php');
include('includes/header.php');
?>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<title>Admin Panel</title>
		
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		
	<!-- bootstrap framework-->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- font awesome -->        
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<!-- bootstrap switch -->
	
	
	<!-- ebro styles -->
		<link rel="stylesheet" href="css/style.css">

			
	</head>
			<!-- mobile navigation -->
			<nav id="mobile_navigation"></nav>
			
			<section id="breadcrumbs">
				<div class="container">
					<ul>
						<li><a href="index">Company Name</a></li>
						<li><span>Dashboard</span></li>						
					</ul>
				</div>
			</section>
			<section class="container clearfix main_section">
				<div id="main_content_outer" class="clearfix">
					<div id="main_content">
						
						<!-- main content -->
						<div class="row">
						<ul style="list-style:none;" >
				<li><a href="index.php"><span class="icon-dashboard"></span> &nbsp;&nbsp;&nbsp;Dashboard</a></li>
				<li><a href="country.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add Country</a></li>
				<li><a href="state.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add State</a></li>
				<li><a href="city.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add City </a></li>
				<li><a href="isco.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add isco </a></li>
				<li><a href="classification.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add Classification </a></li>
				<li><a href="competence.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add Competence </a></li>
				<li><a href="industry.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add Industry </a></li>
				<li><a href="company.php"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;Add Company </a></li>
				
				
							
				</ul>
						
					</div>
					</div>
				</div>
			</section>
			<div id="footer_space"></div>
		</div>

	
		<?php
		
include("includes/footer.php");
include("includes/sidebar.php");

 ?>
	
	<!--[[ page specific plugins ]]-->
<!-- carousel -->
		<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
	
	</body>

</html>
