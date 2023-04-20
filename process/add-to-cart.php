<?php
	include('../includes/conn.php');
	
	$user_id = $_POST['userID'];
	$item_id = $_POST['itemID'];
	
	if(strlen($user_id) == 0){
		echo "Please login first!";
	}else{
		
		
		$item_sql = "SELECT * FROM `products` WHERE `id` = '$item_id'";
		$item_query = mysqli_query($conn, $item_sql);
		$item_data = mysqli_fetch_assoc($item_query);
		$price = $item_data['unit_price'];
		$product_name = $item_data['product_name'];
		
		if(isset($_POST['quantity'])){
			$quantity = $_POST['quantity'];
			$amount = $quantity * $price;
			$product_cost = round($amount, 2);
			$insert_sql = "INSERT INTO `cart`(`product_id`,`product_name`, `amount`, `user_id`, `quantity`) VALUES ('$item_id', '$product_name','$product_cost','$user_id', '$quantity')";
	
	}else{
			
			$insert_sql = "INSERT INTO `cart`(`product_id`,`product_name`, `amount`, `user_id`) VALUES ('$item_id', '$product_name','$price','$user_id')";
		}
		
		$insert_query = mysqli_query($conn, $insert_sql);
		
		if($insert_query){
			//echo strlen($user_id);
			echo "Item added to cart successfully!";
		}else{
			echo "Sorry an error occured!";
		}
	}

?>