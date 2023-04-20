<?php
	include('../../includes/conn.php');
	
	if(isset($_POST['itemID'])){
		$item_id = $_POST['itemID'];
		$item_sql = "SELECT * FROM `products` WHERE `id` = '$item_id'";
			$item_query = mysqli_query($conn, $item_sql);
			$item_data = mysqli_fetch_assoc($item_query);
			$file = "../../uploads/products/".$item_data['product_image'];
			
		if(mysqli_query($conn, "DELETE FROM `products` WHERE `id` = '$item_id'")){
			unlink($file);
			echo "Product removed successfully!";

		}else{
			echo "Sorry! An error occured.";
		}
	}
	

?>