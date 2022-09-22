<div style="position:absolute;top: -5500px">
			<a href="https://plus.google.com/109782197870894866104" rel="me">Muhammad Begawala</a>
			<a href="https://plus.google.com/109782197870894866104" rel="author">Muhammad Begawala</a>
			<div itemscope itemtype="http://schema.org/Product">
				<meta itemprop="name" content="Freelance Web Development"/>
				<blockquote itemprop="review" itemscope itemtype="http://schema.org/Review">
					<meta itemprop="datePublished" content="2016-10-11">
					<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
						<meta itemprop="worstRating" content = "1"/>
						<meta itemprop="ratingValue" content="5"/>
						<meta itemprop="bestRating" content="5"/>
					</span>
					<p itemprop="description">Excellent service, clear communication and was able to isolate the problem areas of our website and fix them in good time. I would highly recommend him.</p>
					<small><span itemprop="author">Muhammad Begawala</span>  - <a href="https://plus.google.com/109782197870894866104" rel="me">Contact Author</a> &#9733;&#9733;&#9733;&#9733;&#9733;</small>
				</blockquote>
			</div>
</div>
<?php
	
	if(isset($_SESSION['utype']))
	{
		if($_SESSION['utype'] == 'candidate')
			include_once('c_sideNav.php');
		else
			include_once('b_sideNav.php');
	}
	else
		include_once('_sideNav.php');
	
		
?>