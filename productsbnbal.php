<?php require_once('connect.php'); 
session_start();
$cid= $_SESSION['cusid']; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bath and Body - SB</title>
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
			<section class="header_text sub">
				<h4><strong>Bath & Body PRODUCTS</strong></h4>
			</section>
			<section class="main-content">
				
				<div class="row">						
					<div class="span9">								
						<ul class="thumbnails listing-products">
                        <?php $count=0;
				 	$q="select * from product Where PROD_ID LIKE '40%'";
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
                    }
                    while ($row=$result->fetch_array()) { ?>
							<li class="span3">
								<div class="product-box">
									<span class="sale_tag"></span>												
									<p><a href="product_detailal.php?id=<?=$row['PROD_ID']?>"><img src="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg" alt="" /></a></p>
									<a href="product_detailal.php?id=<?=$row['PROD_ID']?>" class="title"><?=$row['PROD_NAME']?></a><br/>
									<a href="productsbrandal.php?brand=<?=$row['PROD_BRAND']?>" class="category"><?=$row['PROD_BRAND']?></a>
									<p class="price">฿<?=$row['PROD_PRICE']?></p>
								</div>
							</li>       
                            <?php $count++;} ?>	
						</ul>								
					</div>
					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">SUB CATEGORIES</li>
								<li><a href="./productscosal.php">Cosmetic</a></li>			
								<li><a href="./productsskinal.php">Skin Care</a></li>							
								<li><a href="./productsfragal.php">Fragrance</a></li>
								<li><a href="./productsbnbal.php">Bath & Body</a></li>
								<li><a href="./productsbtal.php">Beauty Tool</a></li>
							</ul>
							<br/>
						</div>
							<div class="block">								
							<h4 class="title"><strong>Best</strong> Seller</h4>								
							<ul class="small-product">
							<?php $count=0;
				 			$q="select * from product Where PROD_DIS ='Popular'";
							$result=$mysqli->query($q);
							if(!$result){
								echo "Select failed. Error: ".$mysqli->error ;
								return false;
                    		}
                    		while ($count<3) {
								$row=$result->fetch_array() ?>
								<li>
									<a href="product_detailal.php?id=<?=$row['PROD_ID']?>" title="<?=$row['PROD_NAME']?>">
										<img src="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg" alt="#">
									</a>
									<a href="product_detailal.php?id=<?=$row['PROD_ID']?>"><?=$row['PROD_NAME']?></a>
								</li>
								<?php $count++;} ?>	
							</ul>
						</div>
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
    </body>
</html>