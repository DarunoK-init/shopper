<?php
    require_once('connect.php');
	session_start();
	$cid = $_SESSION['cusid'];
	$totalpayment=$_SESSION['totalamount'];
	$cre="INSERT INTO processs (PROC_CUSID, PROC_DATE, PROC_TIME) VALUES ('$cid',CURRENT_DATE(),CURRENT_TIME())";
	$resultcre=$mysqli->query($cre);
	if(!$resultcre){
		echo "Insert failed. Error: ".$mysqli->error ;
		return false;
	}
	$resf="select * from processs Where PROC_CUSID ='$cid' ORDER BY PROC_ID DESC LIMIT 1";
					$resultresf=$mysqli->query($resf);
					if(!$resultresf){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
					else
					{
						$row1=$resultresf->fetch_array();
						$subodid=$row1['PROC_ID'];
						$orderdate=$row1['PROC_DATE'];
						$ordertime=$row1['PROC_TIME'];
					}
		
	$cartprodinfo="select cart.*, product.*,customer.* from cart,product,customer where cart.CART_CUSID = customer.CUS_ID AND product.PROD_ID = cart.CART_PRODID";
	$resultcartprod=$mysqli->query($cartprodinfo);
					if(!$resultcartprod){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
					else
					{
						$resultcartprod1=$mysqli->query($cartprodinfo);
						while($row2=$resultcartprod1->fetch_array())
						{
						$prodid=$row2['PROD_ID'];
						$cusaddr=$row2['CUS_ADDR'];
						$prodnum=$row2['CART_PRODNUM'];
						$ins="INSERT INTO orderr (ORD_SUBID, ORD_CUSID, ORD_PRODID, ORD_ITEMNUM, ORD_AMOUNT,ORD_DATE,ORD_TIME,ORD_STATUS,ORD_ADDR) VALUES ('$subodid','$cid','$prodid','$prodnum','$totalpayment','$orderdate','$ordertime','Preparing','$cusaddr')";
						$ins2=$mysqli->query($ins);
						if(!$ins2)
						{
							echo "INSERT failed. Error: ".$mysqli->error ;
							return false;
						}
						}
					}
		/*$clearcart="DELETE FROM cart where CART_CUSID='$cid'";
		if(!$mysqli->query($clearcart)){
			echo "DELETE failed. Error: ".$mysqli->error ;
			return false;
		}
		else
		{
			while()
		}
		$mysqli->close();*/
		//redirect
		header("Location: order.php");
?>