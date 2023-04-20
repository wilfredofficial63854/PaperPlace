<?php
	include('../includes/conn.php');
	
	if(!empty($_POST['searchTerm'])){
		$search_term = $_POST['searchTerm'];
		$search_category = $_POST['category'];
		
		$search_sql = "SELECT * FROM `products` WHERE `product_name` LIKE '%$search_term%' OR `product_description` LIKE '%$search_term%'";
		
		
		if(empty($search_category)){
			$search_sql = "SELECT * FROM `products` WHERE `product_name` LIKE '%$search_term%'";
		}else{
			$search_sql = "SELECT * FROM `products` WHERE `product_name` LIKE '%$search_term%' AND `product_category` = '$search_category'";
		}
		
		$search_query = mysqli_query($conn, $search_sql);
		if(mysqli_num_rows($search_query) >= 1){
			while($search_data = mysqli_fetch_assoc($search_query)){
				
				
				echo "
					<a href='product-details.php?product_id=".$search_data['id']."' target='_blank'><div style='border: 2px solid var(--shade); padding: 1rem;margin: 0.3rem 0; border-radius:4px; display: flex; align-items: center;'>
						<div style='width: 80px;'><a href='product-details.php?product_id=".$search_data['id']."' target='_blank'><img src='uploads/products/".$search_data['product_image']."' style='max-width: 100%;' /></a></div>
						<div style='margin-left: 1rem; min-width: 200px;'>
							<a href='product-details.php?product_id=".$search_data['id']."' target='_blank'><header>".$search_data['product_name']."</header></a>
							<header style='color: var(--primary);'>".$search_data['product_category']."</header>
							<header style='color: #2b2b2b; font-weight: bold;'>&#8373;".$search_data['unit_price']."</header>
						</div></a>
					</div>
				";
			}
		}else{
			
			if(strlen($search_term) >= 5 ){
				echo "<p style='color: red;'><em> No products found. </em></p>";
			}else{
				echo "<p style='color: #2b2b2b;'><em> Searching... </em></p>";
			}
		}
	}
?>