<?php
    require_once('connect.php');
    session_start();
	$cartid = $_SESSION['cartid'];
	$q="DELETE FROM cart where CART_ID=$cartid";
		if(!$mysqli->query($q)){
			echo "DELETE failed. Error: ".$mysqli->error ;
		}
		$mysqli->close();
		//redirect
		header("Location: cart.php");
?>