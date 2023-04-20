<?php
	include('../includes/conn.php');
	session_start();
	
	if(isset($_POST['admin_login'])){
		$id = $_POST['admin_email'];
		$password = $_POST['admin_password'];
		
		
		$user_sql = "SELECT * FROM `admin` WHERE `email_address` = '$id'";
		$user_query = mysqli_query($conn, $user_sql);
		$user_details = mysqli_fetch_assoc($user_query);
		
		if(mysqli_num_rows($user_query) >= 1){
			if (password_verify($password, $user_details['pass_word'])) {
				$_SESSION['id'] = $id;
			}
		}else{
			echo "<script> alert('Unaithorized User!') </script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Semantic UI CSS CDN -->
	
	<link rel="stylesheet" href="../css/admin-dashboard.css">
	<link rel="stylesheet" href="../css/main.css">
	
	<style>
		.mask{
			background-color: rgba(0,0,0,0.4);
		}
		

	</style>
</head>

<body>

<form action="index.php" method="POST" style="width: 40%;margin: 10vh auto;display: <?php if(isset($_SESSION['id'])){
			echo "none";
			}else{
				echo "block";
			}
		?>;">
		<header> <h2> PLEASE LOGIN TO CONTINUE </h2></header>
<p><input style="padding: 1rem; width: 100%;" type="email" placeholder="Admin ID" name="admin_email" required/> </p>
<p><input style="padding: 1rem; width: 100%;" type="password" placeholder="Password" name="admin_password" required/> </p>
<p><input style="padding: 1rem; width: 100%;" type="submit" value="login" name="admin_login"/> </p>
</form>
		<div class="mask"></div>
		<div main class="wrapper" style="display: <?php if(isset($_SESSION['id'])){
			echo "grid";
			}else{
				echo "none";
			}
		?>;">
			<aside>
				Welcome Admin
				
				<ul>
					<li><button class="add-product-btn btn"> Add a Product </button></li>
					<li><button class="product-list-btn"> Product List </button></li>
					<li><button class="logout-btn btn"> Logout </button></li>
				</ul>
			</aside>
			
			<main>
				<div> 
					<header> Total Number of Products </header>
					<ul>
						<li> Fruits: <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `products` WHERE `product_category` = 'Fruits'"));?></li>
						<li> Vegetables: <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `products` WHERE `product_category` = 'Vegetables'"));?></li>
						<li> Grains: <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `products` WHERE `product_category` = 'Grains'"));?></li>
					</ul>
				</div>
				<div> 
					<p>Total Number of Users: <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `users`"));?></p>
				</div>
				
			</main>
			
			<!-- Popup menus -->
			<div id="addProduct" class="pop-up-menu">
				<form id="productForm" enctype="multipart/form-data">
					<header> <h3> Add a Product </h3> </header>
					<div>
						<label> Product Name </label>
						<div><input type="text" name="product_name"/></div>
					</div>
					
					<div>
						<label> Product Price </label>
						<div><input type="text" name="product_price"/></div>
					</div>
					
					<div>
						<label> Product Description </label>
						<div><textarea name="product_description"></textarea></div>
					</div>
					
					<div>
						<label> Upload Image </label>
						<div><input type="file" name="product_image" id="productImage"/></div>
					</div>
					
					<div>
						<label> Product Category </label>
						<div><select name="product_category">
							<option>Writing Instruments</option>
							<option>Paper Products</option>
							<option>Filing and Storage</option>
							<option>Desc Accessories</option>
						</select></div>
					</div>
					
					<div>
						<input type="submit" value="SUBMIT" name="upload_product_btn"/>
					</div>
					<div id="#uploadResponse"></div>
				</form>
			</div>
			
			<!-- Popup menus -->
			<div id="productList" class="pop-up-menu">
				<header> <h3> Product List</h3> </header>
				
				<section class="list-of-products">
					<?php
						$products_sql = "SELECT * FROM `products`";
						$products_query = mysqli_query($conn, $products_sql);
						
						if(mysqli_num_rows($products_query) >= 1){
							while($product = mysqli_fetch_assoc($products_query)){
								echo "<div class='image-of-product'> <img src='../uploads/products/".$product['product_image']."'/></div>
								<div class='details-of-product'> 
									<h2>".$product['product_name']." </h2>
									<p>".$product['product_category']." </p>
									<h3>₵".$product['unit_price']."</h3>
									<P>".$product['product_description']." </P>
									<button class='remove-btn' value='".$product['id']."'> Remove Product </button>
								</div>";
							}
						}else{
							echo "No product has been uploaded yet.";
						}
					?>
				</section>
			</div>
			
		</div >
		
		<script src="../jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
		
		<script>
			$(document).ready(function() {
				
				$(".add-product-btn").click(function(){
					$("#addProduct").show();
					$(".mask").show();
					
				});
				
				$(".product-list-btn").click(function(){
					$("#productList").show();
					$(".mask").show();
					
				});
				
				$(".mask").click(function(){
					$(".pop-up-menu").hide()
					$(this).hide();
				});

				//upload data
				  $("#productForm").submit(function(e) {
					e.preventDefault();
					
					var formData = new FormData($(this)[0]);
					
					formData.append("product_image", $("#productImage")[0].files[0]);
					
					$.ajax({
					  url: "process/add-product.php",
					  type: "POST",
					  data: formData,
					  contentType: false,
					  cache: false,
					  processData: false,
					  success: function(data) {
						alert(data);
						 location.reload();
					  },
					  error: function(data) {
						alert("An error occurred while submitting the form.");
					  }
					});
				  });
				 
				 
				 //remove Product
				 $(".remove-btn").click(function(){
					 var itemID = $(this).val();
					 $.ajax({  
						type: 'POST',  
						url: 'process/remove-product.php', 
						 data: { 
							itemID: itemID
						  },
						success: function(response) {
							alert(response);
							 location.reload();
						}
					});
				 });
				 
			});
			//end of jquery

		</script>
</body>

