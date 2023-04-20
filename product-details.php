<?php
	include('includes/conn.php');
	session_start();
	
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		
		//user_details
		$user_sql = "SELECT * FROM `users` WHERE `phone_number` = '$user_id' OR `email_address` = '$user_id'";
		$user_query = mysqli_query($conn, $user_sql);
		$user_data = mysqli_fetch_assoc($user_query);
		
		//get cart total
							$cart_sql = "SELECT * FROM `cart` WHERE `user_id` = '$user_id'";
							$cart_query = mysqli_query($conn, $cart_sql);
							$cart_total = 0;
							
		while($cart_data = mysqli_fetch_assoc($cart_query)){
			$cart_total += $cart_data['amount'];										
		}
	}
	
	if(isset($_GET['product_id'])){
		$product_id = $_GET['product_id'];
		$product_sql = "SELECT * FROM `products` WHERE `id` = '$product_id'";
		$product_query = mysqli_query($conn, $product_sql);
		$product_data = mysqli_fetch_assoc($product_query);
	}else{
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <title>PaperPlace | <? echo $product_data['product_name'];?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Semantic UI CSS CDN -->
	
	<link rel="stylesheet" href="css/product-details.css">
	<link rel="stylesheet" href="css/main.css">
    <style>
        /* Custom CSS for styling */
        /* Add your own custom styles here */
    </style>
</head>

<body>
		<div class="wrapper">
			<div class="callout">
				<div class="hamburger">
					<span class="navbar-links-open"><i class="bars icon"></i></span>
					<span class="navbar-links-close"><i class="close icon"></i></span>
					<div class="brand"> <span style="color: var(--primary);">Paper</span><span style="color: red;">Place</span> </div>
				</div>
				
				<nav class="links">
					<a href="index.php" target="_blank"> Home </a>
					<a href="about-us.php"> About </a>
					<a href="under-construction.html"> Blog </a>
					<a href="under-construction.html"> Shop </a>
				</nav>
				
				<div class='cart-details flex'>
				<?php	
					if(isset($user_id)){
							echo "<span id='cart'><i class='shopping cart icon'></i> &#8373;".$cart_total."</span>";
					}else{
						echo "<a href='login.php'>Login</a>";
					}
					?>
					<a href=''" class='contact-btn btn'> Contact Us <i class='arrow right icon'></i></a>
				</div>
			</div>
			
			<!-- Product Details -->
			<main>
				<?php
						echo "<section>
							<img src='uploads/products/".$product_data['product_image']."' class='product-image'/>
						</section>
						
							<section>
								<p class='category'> ".$product_data['product_category']." </p>
								<h1 class='title'> ".$product_data['product_name']." </h1>
								<p class='description'> ".$product_data['product_description']." </p>
							
							
							<h2 class='price'> <span class='currency-symbol'>&#8373;</span>".$product_data['unit_price']." </h2>
							<div class='flex'>
						<div class='quantity-dropdown'>
						  <select id='quantity' name='quantity'>
							";
							
							for($i=1; $i<=100; $i++){
								echo "<option>".$i."</option>";
							}
							echo "
						  </select>
						</div>
						<button class='btn add-to-cart-btn' value='".$product_id."'> Add To Cart</button>
					</div>
					</section>
				";
					?>
				
			</main>
			
			<footer>
						<div class="footer-links">
							<div class="address">
								<div class="brand"> <span style="color: var(--primary);">Paper</span><span style="color: red;">Place</span> </div>
								<p>
									Address: F65A-Stadium Residential Area, Tumu,Upper West-Ghana
								</p>
								<p> Phone: +233 20 114 4293</p>
								<p> Email: info@paperplace.com </p>
							</div>
							
							<div class="useful-links">
								<header><h3> Useful Links </h3></header>
								<div style="display: flex;align-items: center;">
									<ul> 
										<li><a href="about-us.php"> About </a></li>
										<li><a href="under-construction.html"> Contact </a></li>
										<li><a href="under-construction.html"> Shop </a></li>
										<li><a href="under-construction.html"> Blog </a></li>
									</ul>
									
									<ul style="margin-left: 2rem;"> 
										<li><a href="under-construction.html"> Privacy Policy </a></li>
										<li><a href="under-construction.html"> Our Services </a></li>
										<li><a href="under-construction.html"> Testimonials </a></li>
									</ul>
								</div>
							</div>
							
							<div class="newsletter">
								<header><h3> Newsletter </h3></header>
								<p> Get E-mail updates about our latest shop and special offers. </p>
								
								<div class="newsletter-form">
									<form>
										<input type="email" placeholder="ENTER YOUR EMAIL" />
										<input type="submit" value="SUBSCRIBE" />
									</form>
								</div>
								
								<p class="social-media-handles flex">
									<span> <a href="#"> <i class="facebook f icon"></i> </a></span>
									<span><a href="#"> <i class="twitter icon"></i> </a></span>
									<span><a href="#"> <i class="linkedin icon"></i> </a></span>
								</p>
							</div>
						</div>
						
						<div class="copyright-info">	
							Copyright ©  <?php echo date("Y");?> All rights reserved
						</div>
					</footer>
		</div>
		
		<script src="jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
		
		<script>
			$(document).ready(function() {
	
				 //navbar links toggle
				 $(".navbar-links-open").click(function(){
					$(".links").css("top", "12vh");
					$(".links").css("transition", "0.3s ease-out");
					$(this).hide();
					$(".navbar-links-close").show();
				 });
				 
				 //navbar links toggle
				 $(".navbar-links-close").click(function(){
					$(".links").css("top", "-100%");
					$(".links").css("transition", "0.3s ease-out");
					$(this).hide();
					$(".navbar-links-open").show();
				 });
				 
				 
				 //trigger css on window scroll
				
				$(window).scroll(function() {
					var trigger = $(".callout");
					var scrollTop = $(this).scrollTop();
					var triggerLimit = 230;
					
					if (scrollTop > triggerLimit) {
						trigger.addClass("fixed");
					  } else {
						trigger.removeClass("fixed");
					}
				});

				 
				  //add to cart
				 $(".add-to-cart-btn").click(function(){
					 var itemID = $(this).val();
					 var quantity = $("#quantity").val();
					 var userID = <?php if(isset($user_id)){
						 echo "'".$user_id."'";
					 }else{
						 echo "null";
					 }?>;
					$.ajax({  
						type: 'POST',  
						url: 'process/add-to-cart.php', 
						 data: { 
							itemID: itemID,
							quantity: quantity,
							userID: userID
						  },
						success: function(response) {
							alert(response);
						}
					});
					
				 });
				 
				 
			});
			//end of jquery

		</script>
</body>

