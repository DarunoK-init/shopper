<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Register Success - SB</title>
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
	<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">								
                            <li><a href="register.php">Login</a></li>	
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
		<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images/logonew.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a>Hot!</a>					
								<ul>
									<li><a href="./productsnew.php">New</a></li>									
									<li><a href="./productspop.php">Popular</a></li>
									<li><a href="./productssale.php">Sale</a></li>									
								</ul>
							</li>															
							<li><a href="./productscos.php">Cosmetic</a></li>			
							<li><a href="./productsskin.php">Skin Care</a></li>							
							<li><a href="./productsfrag.php">Fragrance</a></li>
							<li><a href="./productsbnb.php">Bath & Body</a></li>
							<li><a href="./productsbt.php">Beauty Tool</a></li>
						</ul>
					</nav>
				</div>
			</section>	
			<section class="header_text sub">
				<h4><span>REGISTER</span></h4>
			</section>			
			<section class="main-content">
            <?php
				if(isset($_POST['subreg'])) {
					$username = $_POST["CUS_USERNAME"];
					$passwd = $_POST["CUS_PASSWD"];
					$name = $_POST["CUS_NAME"];	
					$tel = $_POST["CUS_TEL"];
					$addr = $_POST["CUS_ADDR"];
					if($username==null or $passwd==null or $name==null or $tel==null or $addar=null)
                    {
						echo "ERROR! PLEASE TRY AGAIN!"
						?>
						<form action="register.php">
                    		<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Register"></div>
                		</form>
						<?php
                    }
                    else
                    {
					$q="INSERT INTO customer (CUS_USERNAME,CUS_PASSWD,CUS_NAME,CUS_TEL,CUS_ADDR) VALUES ('$username','$passwd','$name','$tel','$addr')";
					$result=$mysqli->query($q);
					if(!$result){
						echo "INSERT failed. Error: ".$mysqli->error ;
						return false;
                    }
					else
					{
						echo "REGISTER SUCCESS";
						?>
						<form action="register.php">
                    		<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Login"></div>
                		</form>	
						<?php
					}}} ?>
            </section>			
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.php">Homepage</a></li>  
							<li><a href="./register.php">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
						<li><a href="./register.php">Login</a></li>	
						<li><a href="./register.php">Register</a></li>	
						</ul>
					</div>
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