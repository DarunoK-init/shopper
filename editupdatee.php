<?php
require_once('connect.php'); 
	if(isset($_POST['editinfoo'])) {
        $orderid=$_POST['pid'];
		$status = $_POST['Status'];
        
		$q1="UPDATE orderr SET ORD_STATUS = '$status' where ORD_SUBID = '$orderid'";
		$result1=$mysqli->query($q1);
		if(!$result1){
			echo "UPDATE failed. Error: ".$mysqli->error ;
			return false;
			}
		header("Location: cusord.php");
	}
?>