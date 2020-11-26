<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin - SB</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="loginadmin.php" class="logo pull-left"><img src="themes/images/logonew.png" class="site_logo" alt=""></a>
					
				</div>
			</section>		
			<section class="header_text sub">
				<h4><span>WELCOME</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span10">					
						<h4 class="title"><span class="text"><strong>Login</strong> For staff</span></h4>
						<form action="adminlogproc.php" method="post">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your name" name="STA_USERNAME" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label"> Password</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" name="STA_PASSWD" class="input-xlarge">
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" name="adlog" value="Login">
									<hr>
								</div>
							</fieldset>
						</form>				
					</div>
								
				</div>
			</section>			
			<section id="footer-bar">
				<div class="row">
					
					
					<div class="span5">
						<p class="logo"><img src="themes/images/logonew.png" class="site_logo" alt=""></p>
						<p>Explore our unrivaled selection of makeup, skincare, fragrance and more from classic and emerging brands.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2020 Sleeping Beauty Team  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>