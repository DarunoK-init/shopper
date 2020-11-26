<?php require_once('connect.php');
session_start(); 
if(isset($_POST['adlog'])) {
	$username = $_POST["STA_USERNAME"];
	$passwd = $_POST["STA_PASSWD"]; 
        
		$q1="SELECT * FROM staff WHERE STA_USERNAME = '$username' AND STA_PASSWD = '$passwd'";
		$result1=$mysqli->query($q1);
		if(!$result1){
			echo "INSERT failed. Error: ".$mysqli->error ;
			return false;
            }
        else
        {
            $row1=$result1->fetch_array();
            $_SESSION['staid']=$row1['STA_ID'];
        }
		header("Location: staffaccount.php");
	}
?>