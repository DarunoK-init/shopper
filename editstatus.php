<?php require_once('connect.php'); ?>
<?php session_start(); ?>
<?php $orderid=$_GET['pid'] ?>
<?php $subidset=0; ?>
<?php $qaa="select * from orderr,product,customer where ORD_CUSID = CUS_ID AND PROD_ID = ORD_PRODID AND ORD_SUBID = '$orderid'";
					$resulta=$mysqli->query($qaa);
					if(!$resulta){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					} ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Edit Order - SB</title>
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
						<ul class="user-menu" method="post">			
							<li><a href="./staffaccount.php">Profile</a></li>
							<li><a href="./cusprof.php">Customer Profile</a></li>							
							<li><a href="./cusord.php">Customer Order</a></li>
							<li><a href="./loginadmin.php">log Out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="staffaccount.php" class="logo pull-left"><img src="themes/images/logonew.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
					</nav>
				</div>
			</section>		
			<section class="header_text sub">
				<h4><span>ORDERS Editing</span></h4>
			</section>			
			<section class="main-content">
            <table class="table table-striped">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Order Item</th>
									<th>Order Quantity</th>
                                    <th>Order Owner</th>
									<th>Order Address</th>
									<th>Order Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php 
							while($rowas=$resulta->fetch_array()) {
								?> <tr>  <?php
								if($subidset==0){?>
                                    <td><a><?=$rowas['ORD_SUBID']?></a></td>
									<td><a><?=$rowas['PROD_NAME']?></a></td>
									<td><a><?=$rowas['ORD_ITEMNUM']?></a></td>
									<td><a><?=$rowas['CUS_NAME']?></a></td>
									<td><a><?=$rowas['CUS_ADDR']?></a></td>
									<td><a>
                                    <form action="editupdatee.php" method="post" class="form-stacked">
                                    <select name="Status">
										<option value="Preparing">Preparing</option>
										<option value="Shipping">Shipping</option>
										<option value="Out of Order">Out of Order</option>
										<option value="Returned">Returned</option>
									</select></a></td>
									<td><a><input type="hidden" name="pid" value="<?php echo $orderid ?>"><div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="editinfoo" value="Edit"></div></a></td>
                                    </form>
                                    <?php }
								elseif($subidset==$rowas['ORD_SUBID']){ 
									?>
                                    <td><a></a></td>
									<td><a><?=$rowas['PROD_NAME']?></a></td>
									<td><a><?=$rowas['ORD_ITEMNUM']?></a></td>
									<td><a></a></td>
									<td><a></a></td>
									<td><a></a></td>
									<td><a></a></td>
                                    <?php }
								else{ 
									?>
									<td><a><?=$rowas['ORD_SUBID']?></a></td>
									<td><a><?=$rowas['PROD_NAME']?></a></td>
									<td><a><?=$rowas['ORD_ITEMNUM']?></a></td>
									<td><a><?=$rowas['CUS_NAME']?></a></td>
									<td><a><?=$rowas['CUS_ADDR']?></a></td>
									<td><a><?=$rowas['ORD_STATUS']?></a></td>
									<td><a href="editstatus.php?pid=<?=$rowas['ORD_SUBID']?>"><img src="themes/images/edit.png" width="24" height="24"></a></td>
								<?php 
                                }
                                $subidset=$rowas['ORD_SUBID'];
								} ?>
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
            </section>			
			<section id="footer-bar">
				<div class="row">
					<div class="span3">				
					</div>
					<div class="span4">
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