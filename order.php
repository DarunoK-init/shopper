<?php require_once('connect.php'); 
session_start();
$cid= $_SESSION['cusid'];
$subidset=0; ?>
<?php
					 $qaa="select * from orderr,product Where ORD_CUSID = '$cid' and PROD_ID = ORD_PRODID";
					$resulta=$mysqli->query($qaa);
					if(!$resulta){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					} ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cart - SB</title>
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
			<script src="themes/js/respond.min.js"></script>
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
				<h4><span>Your ORDER</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">
					<div class="span9">					
						<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Order ID</th>
									<th></th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Total</th>
									<th>Date - Time</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							while($rowa=$resulta->fetch_array()) {
								?> <tr> <?php
								if($subidset==0){?>
                                    <td><a><?=$rowa['ORD_SUBID']?></a></td>
									<td><a href="product_detailal.php?id=<?=$rowa['PROD_ID']?>"><img width="40px" src="themes/images/cosmetic/<?=$rowa['PROD_PICID']?>.jpg"></a></td>
									<td><a><?=$rowa['PROD_NAME']?></a></td>
									<td><a><?=$rowa['ORD_ITEMNUM']?></a></td>
									<td><a>฿ <?=$rowa['ORD_AMOUNT']?></a></td>
									<td><a><?=$rowa['ORD_DATE']?> <?=$rowa['ORD_TIME']?></a></td>
									<td><a><?=$rowa['ORD_STATUS']?></a></td>
									
								<?php }
								elseif($subidset==$rowa['ORD_SUBID']){ 
									?>
									<td></td>
									<td><a href="product_detailal.php?id=<?=$rowa['PROD_ID']?>"><img width="40px" src="themes/images/cosmetic/<?=$rowa['PROD_PICID']?>.jpg"></a></td>
									<td><a><?=$rowa['PROD_NAME']?></a></td>
									<td><a><?=$rowa['ORD_ITEMNUM']?></a></td>
									<td></td>
									<td></td>
									<td></td>
								<?php }
								else{ 
									?>
									<td><a><?=$rowa['ORD_SUBID']?></a></td>
									<td><a href="product_detailal.php?id=<?=$rowa['PROD_ID']?>"><img width="40px" src="themes/images/cosmetic/<?=$rowa['PROD_PICID']?>.jpg"></a></td>
									<td><a><?=$rowa['PROD_NAME']?></a></td>
									<td><a><?=$rowa['ORD_ITEMNUM']?></a></td>
									<td><a>฿ <?=$rowa['ORD_AMOUNT']?></a></td>
									<td><a><?=$rowa['ORD_DATE']?> <?=$rowa['ORD_TIME']?></a></td>
									<td><a><?=$rowa['ORD_STATUS']?></a></td>
								<?php 
								}
								
								$subidset=$rowa['ORD_SUBID'];
								}
								 ?>
								</tr>			  
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>		  
							</tbody>
						</table>					
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
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>