<style>
	.navbar .container-fluid{background:#000}
	.navbar-nav > li{background:#000}
	.navbar-nav > li > a{background:#000; color:#fff}
	.navbar-nav > li > a:hover{background:#000; color:#c1c1c1}
	.navbar-default .navbar-nav > li > a{background:#000; color:#fff}
	.navbar-default .navbar-nav > li > a:hover{background:#000; color:#c1c1c1}
	.navbar-default .navbar-brand {color: #FFBABA;}
</style>
<nav class="navbar navbar-default" style="background:#000">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
	
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
        <a class="navbar-brand" href="#">propickd.com</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-right" id="bs-example-navbar-collapse-1">
      
<ul class="nav navbar-nav">
        <li><a href="http://www.terrificincsgrandmashouse.org/"><span class="glyphicon glyphicon-home"></span>&nbsp; HOME<span class="sr-only">(current)</span></a></li>
        <li><a href="http://www.terrificincsgrandmashouse.org/about/"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; ABOUT</a></li>
		<li><a href="http://www.terrificincsgrandmashouse.org/category/news-events/"><span class="glyphicon glyphicon-time"></span>&nbsp; STATUS</a></li>
		<li><a href="http://www.terrificincsgrandmashouse.org/programs/"><span class="glyphicon glyphicon-star"></span>&nbsp; DASHBOARD</a></li>
		<li><a href="http://www.terrificincsgrandmashouse.org/contact-us/"><span class="glyphicon glyphicon-envelope"></span>&nbsp; CONTACT</a></li>
		<li class="dropdown" >
		  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Preferences<b class="caret"></b></a>
		  <ul class="dropdown-menu">
				
		<li><a href="editProfile.php">Edit Profile</a></li> 
		<li><a href="settings.php">Settings</a></li> 
		<li><a href="changePasswordSecured.php">Change Password</a></li> 
		<li><a href="<?php echo PATH;?>">Logout</a></li> 
		  </ul>
		</li>
       
      </ul>
	  <!--
	   <form class="navbar-form navbar-right" action="signup/signinMe.php" name="signin" id="signin" method="post" role="login">
         <button type="submit" class="btn btn-primary">LOGOUT</button>
      </form>-->
	  
	  
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		
<!-- end navbar -->