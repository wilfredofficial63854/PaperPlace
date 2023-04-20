<?php	
	$host = "localhost";
	$user = "root";
	$pswd = "";
	$db = "paper_place";

	if($conn = mysqli_connect($host, $user, $pswd, $db)){
		//echo "connected";
	}else{
		echo "Connection Error!";
		mysqli_close($conn);
		die;
	}

?>