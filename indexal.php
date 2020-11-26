<?php $mysqli = mysqli_connect("localhost","root","","sleepingbeauty");
if($mysqli->connect_error){
	die("Connecttion Failed");} ?>
<?php 
session_start();
$cid=$_SESSION['cusid'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sleeping Beauty</title>
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
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">								
                            <li><a href="myaccountal.php">My Account</a></li>
							<li><a href="cart.php">Cart</a></li>
							<li><a href="order.php">Order</a></li>
							<li><a href="index.php">Log Out</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
		<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="indexal.php" class="logo pull-left"><img src="themes/images/logonew.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a>Hot!</a>					
								<ul>
									<li><a href="./productsnewal.php">New</a></li>									
									<li><a href="./productspopal.php">Popular</a></li>
									<li><a href="./productssaleal.php">Sale</a></li>									
								</ul>
							</li>															
							<li><a href="./productscosal.php">Cosmetic</a></li>			
							<li><a href="./productsskinal.php">Skin Care</a></li>							
							<li><a href="./productsfragal.php">Fragrance</a></li>
							<li><a href="./productsbnbal.php">Bath & Body</a></li>
							<li><a href="./productsbtal.php">Beauty Tool</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/S__3391588.jpg" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
						<li>
						<a href="productsfragal.php"><img src="themes/images/carousel/messageImage_1604655140801.jpg"/></a>
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
				Explore our unrivaled selection of makeup, skincare, fragrance and more from classic and emerging brands.
				<br/>Shopping 24 hours a day here at Sleeping Beauty!
			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails" name="PROD_ID">	
											<?php $q="select * from product where PROD_DIS = 'Normal'" ;
												$count=0;
														$result=$mysqli->query($q);
														if(!$result){
															echo "Select failed. Error: ".$mysqli->error ;
															return false;
														}
														while ($count < 4) {
															$row=$result->fetch_array() ?>							
												<li class="span3">
													<div class="product-box">
													
														<span class="sale_tag"></span>
														<p><a href="product_detailal.php?id=<?=$row['PROD_ID']?>"><img src="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg" alt="" /></a></p>
														<a href="product_detailal.php?id=<?=$row['PROD_ID']?>" class="title"><?=$row['PROD_NAME']?></a><br/>
														<a href="productsbrandal.php?brand=<?=$row['PROD_BRAND']?>" class="category"><?=$row['PROD_BRAND']?></a>
														<p class="price">฿<?=$row['PROD_PRICE']?></p>
													</div>
												</li>
												<?php 
												$count++;} ?>
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
											<?php 
												$count=0;
														if(!$result){
															echo "Select failed. Error: ".$mysqli->error ;
															return false;
														}
														while ($count < 4) {
															$row=$result->fetch_array() ?>							
												<li class="span3">
													<div class="product-box">
													
														<span class="sale_tag"></span>
														<p><a href="product_detailal.php?id=<?=$row['PROD_ID']?>"><img src="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg" alt="" /></a></p>
														<a href="product_detailal.php?id=<?=$row['PROD_ID']?>" class="title"><?=$row['PROD_NAME']?></a><br/>
														<a href="productsbrandal.php?brand=<?=$row['PROD_BRAND']?>"><?=$row['PROD_BRAND']?></a>
														<p class="price">฿<?=$row['PROD_PRICE']?></p>
													</div>
												</li>
												<?php $count++;} ?>																																
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-2" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails" name="PROD_ID">	
											<?php $q1="select * from product where PROD_DIS = 'New'" ;
												$count=0;
														$result=$mysqli->query($q1);
														if(!$result){
															echo "Select failed. Error: ".$mysqli->error ;
															return false;
														}
														while ($count < 4) {
															$row=$result->fetch_array() ?>							
												<li class="span3">
													<div class="product-box">
													
														<span class="sale_tag"></span>
														<p><a href="product_detailal.php?id=<?=$row['PROD_ID']?>"><img src="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg" alt="" /></a></p>
														<a href="product_detailal.php?id=<?=$row['PROD_ID']?>" class="title"><?=$row['PROD_NAME']?></a><br/>
														<a href="productsbrandal.php?brand=<?=$row['PROD_BRAND']?>" class="category"><?=$row['PROD_BRAND']?></a>
														<p class="price">฿<?=$row['PROD_PRICE']?></p>
													</div>
												</li>
												<?php 
												$count++;} ?>
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
												<?php 
												$count=0;
														if(!$result){
															echo "Select failed. Error: ".$mysqli->error ;
															return false;
														}
														while ($count < 4) {
															$row=$result->fetch_array() ?>							
												<li class="span3">
													<div class="product-box">
													
														<span class="sale_tag"></span>
														<p><a href="product_detailal.php?id=<?=$row['PROD_ID']?>"><img src="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg" alt="" /></a></p>
														<a href="product_detailal.php?id=<?=$row['PROD_ID']?>" class="title"><?=$row['PROD_NAME']?></a><br/>
														<a href="productsbrandal.php?brand=<?=$row['PROD_BRAND']?>" class="category"><?=$row['PROD_BRAND']?></a>
														<p class="price">฿<?=$row['PROD_PRICE']?></p>
													</div>
												</li>
												<?php 
												$count++;} ?>																																				
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<div class="row feature_box">						
							<div class="span4">
								<div class="service">
									<div class="responsive">	
										<img src="themes/images/feature_img_2.png" alt="" />
										<h4>QUICK <strong>ACCESS</strong></h4>
										<p>Select your items easy as 1 2 3!</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="themes/images/feature_img_1.png" alt="" />
										<h4>FREE <strong>SHIPPING</strong></h4>
										<p>Free shipping when purchase over 500 Bath.</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="themes/images/feature_img_3.png" alt="" />
										<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
										<p>If you are in problem, contact us! We are here for you.</p>
									</div>
								</div>
							</div>	
						</div>		
					</div>				
				</div>
			</section>
			<section class="our_client">
				<h4 class="title"><span class="text">Manufactures</span></h4>
				<div class="row">					
					<div class="span2">
						<a><img alt="" src="themes/images/clients/6-sb.png"></a>
					</div>
					<div class="span2">
						<a><img alt="" src="themes/images/clients/5-sb.png"></a>
					</div>
					<div class="span2">
						<a><img alt="" src="themes/images/clients/1-sb.png"></a>
					</div>
					<div class="span2">
						<a><img alt="" src="themes/images/clients/2-sb.png"></a>
					</div>
					<div class="span2">
						<a><img alt="" src="themes/images/clients/3-sb.png"></a>
					</div>
					<div class="span2">
						<a><img alt="" src="themes/images/clients/4-sb.png"></a>
					</div>
				</div>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./indexal.php">Homepage</a></li>  							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="./myaccount.php">My Account</a></li>	
							<li><a href="./cart.php">Cart</a></li>
							<li><a href="./order.php">Order</a></li>
							<li><a href="./index.php">Log Out</a></li>	
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logonew.png" class="site_logo" alt=""></p>
						<p>Explore our unrivaled selection of makeup, skincare, fragrance and more from classic and emerging brands.</p>
						<br/>
						<span cvlass="social_icons">
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
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>