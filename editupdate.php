<?php
require_once('connect.php'); 
session_start();
$cid=$_SESSION['cusid'];
	if(isset($_POST['editinfo'])) {
		$cusname = $_POST['CUS_NAME'];
		$custel = $_POST['CUS_TEL'];
        $cusaddr = $_POST['CUS_ADDR'];
        
		$q1="UPDATE customer SET CUS_NAME = '$cusname', CUS_TEL = '$custel', CUS_ADDR = '$cusaddr' where CUS_ID = '$cid'";
		$result1=$mysqli->query($q1);
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
			}
		header("Location: myaccountal.php");
	}
?>