<?php
	include('../includes/conn.php');
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if(empty($email)){
		echo "<script>alert('Please provide email or phone number');</script>";
		echo "<a href='../login.php'> Back </a>";
	}else if(empty($password)){
		echo "<script>alert('Please provid password');</script>";
		echo "<a href='../login.php'> Back </a>";
	}else{
		
		//verify user
		$user_sql = "SELECT * FROM `users` WHERE `email_address` = '$email' OR `phone_number` = '$email'";
		$user_query = mysqli_query($conn, $user_sql);
		$user_details = mysqli_fetch_assoc($user_query);
		
		if (mysqli_num_rows($user_query) >= 1) {
			if (password_verify($password, $user_details['pass_word'])) {
				session_start();
				$_SESSION['user_id'] = $user_details['phone_number'];
				header('location: ../index.php');
			} else {
				echo "<script> alert('Incorrect Password!') </script>";
				echo "<a href='../login.php'> Back </a>";
			}
			
		}else{
			echo "<script> alert('Unauthorized User!') </script>";
			echo "<a href='../login.php'> Back </a>";
		}
	}
	
?>