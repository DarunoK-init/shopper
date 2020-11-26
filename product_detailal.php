<?php require_once('connect.php'); ?>
<?php $pid = $_GET['id'];?>
<?php 
session_start();
$cid= $_SESSION['cusid'];
?>
<?php
					 $q="select * from product Where PROD_ID ='$pid'";
					$result=$mysqli->query($q);
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
					$row=$result->fetch_array() ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?=$row['PROD_NAME']?> - SB</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
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
				<h4><span>Product Detail</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<a href="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg" class="thumbnail" data-fancybox-group="group1"><img alt="" src="themes/images/cosmetic/<?=$row['PROD_PICID']?>.jpg"></a>												
							</div>
							<div class="span5">
								<address>
									<strong>Brand:</strong> <span><?=$row['PROD_BRAND']?></span><br>
									<strong>Name:</strong> <span><?=$row['PROD_NAME']?></span><br>
									<strong>Product Code:</strong> <span><?=$row['PROD_ID']?></span><br>
									<strong>Product type:</strong> <span><?=$row['PROD_TYPE']?></span><br>				
								</address>									
                                <h4><strong>Price: <?=$row['PROD_PRICE']?> Bath.-</strong></h4>	
							</div>
							<div class="span5">
								<form class="form-inline" method="post" action="./addsucc.php">
									<label>Qty:</label>
									<select name="quan">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
									<input type="hidden" name="cid" value="<?php echo $cid ?>">
									<input type="hidden" name="pid" value="<?php echo $pid ?>">
									<button class="btn btn-inverse" type="submit" name="addtocart">Add to cart</button>
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Description</a></li>
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home"><?=$row['PROD_INFO']?></div>
									<div class="tab-pane" id="profile">	
									</div>
								</div>							
							</div>						
							<div class="span9">	
								
							</div>
						</div>
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
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>