<?php
	include('../includes/conn.php');
	
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$city = $_POST['city'];
	$region = $_POST['region'];
	$country = $_POST['country'];
	$phone_number = $_POST['phone_number'];
	$region = $_POST['region'];
	$dob = $_POST['dob'];
	$sex = $_POST['sex'];
	$photo = uniqid()."_".$_FILES['profile_photo']['name'];
	
	if(empty($full_name)){
		echo "<script>alert('Please provide Full Name');</script>";
	}else if(empty($password)){
		echo "<script>alert('Please provide Password');</script>";
	}else if(empty($phone_number)){
		echo "<script>alert('Please provide Phone Number');</script>";
	}else if(empty($dob)){
		echo "<script>alert('Please provide Date of Birth');</script>";
	}else{
		//upload product details
			$file_tmp = $_FILES['profile_photo']['tmp_name'];
			$file_path = "../uploads/profile_photos/" . $photo;
			
			if(move_uploaded_file($file_tmp, $file_path)){
				mysqli_query($conn, "INSERT INTO `users`(`full_name`, `email_address`, `pass_word`, `city`, `region`, `phone_number`, `dob`, `sex`, `photo`, `country`) VALUES ('$full_name','$email','$password','$city','$region','$phone_number','$dob','$sex','$photo','$country')");
				echo "<script> alert('Account created successfully! Login to continue'); </script>";
			}else{
				echo "<script> alert('Failed to create account! Please try again.'); </script>";
			}
	}


?>