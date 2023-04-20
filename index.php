<?php
	include('includes/conn.php');
	session_start();
	
	if(isset($_SESSION['user_id'])){
		$user_id = $_SESSION['user_id'];
		
		//user_details
		$user_sql = "SELECT * FROM `users` WHERE `phone_number` = '$user_id' OR `email_address` = '$user_id'";
		$user_query = mysqli_query($conn, $user_sql);
		$user_data = mysqli_fetch_assoc($user_query);
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PaperPlace</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Semantic UI CSS CDN -->
	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/homepage.css">
    <style>
       
    </style>
</head>

<body>
		<div class="mask"></div>
		<div class="wrapper">
			<div class="callout">
				<div class="hamburger">
					<span class="navbar-links-open"><i class="bars icon"></i></span>
					<span class="navbar-links-close"><i class="close icon"></i></span>
				</div>
				<div class="contact-info">
					<span> <i class="envelope icon"></i> info@paperplace.com </span>
					<span style="color: gray;"> | </span>
					<span> <i class="phone icon" class="dash-line"></i> +233 20 114 4293</span>
				</div>
				
				<div class="extras">
					<span> 
						<a href="#"> <i class="facebook f icon"></i> </a>
						<a href="#"> <i class="twitter icon"></i> </a>
						<a href="#"> <i class="linkedin icon"></i> </a>
						<a href="admin/index.php" target="_blank">Staff Login </a>
					</span>
					
					<span style="color: gray;" class="dash-line"> | </span>
					<?php 
						if(isset($_SESSION['user_id'])){
							echo "<span> ".$user_data['full_name']." </span>";
						}else{
							echo "<span>
								<a href='login.php' target='_blank'><i class='user icon'></i>
								User Login</a>
							</span>";
						}
					?>
					
				</div>
			</div>
			
			
			<!-- End of Navbar -->
			
			<main>
				<aside class="sidebar">
					<div class="brand"> <span style="color: var(--primary);">Paper</span><span style="color: red;">Place</span> </div>
					<div class="menu">
						<header> <i class="list icon"></i> All Categories </header>
						<ul>
							<li><a href="under-construction.html"> Writing Instruments </a></li>
							<li><a href="under-construction.html"> Paper Products </a></li>
							<li><a href="under-construction.html"> Filing and Storage </a></li>
							<li><a href="under-construction.html"> Desc Accessories </a></li>
						</ul>
					</div>
				</aside>
				
				<section>
					<!-- Navbar -->
					<nav class="navbar">
						<div class="navbar-links">
							<ul>
								<li> <a href="#" class="active"> Home </a></li>
								<li> <a href="about-us.php"> About </a></li>
								<li> <a href="under-construction.html"> Contact Us </a></li>
								<li> <a href="under-construction.html"> Shop </a></li>
								<li> <a href="under-construction.html"> Blog </a></li>
							</ul>
						</div>
						
						<?php 
						if(isset($_SESSION['user_id'])){
							//get cart total
							$cart_sql = "SELECT * FROM `cart` WHERE `user_id` = '$user_id'";
							$cart_query = mysqli_query($conn, $cart_sql);
							$cart_total = 0;
							
							echo "<div class='cart-details'>
								<header style='text-align: center; font-size: 1.4rem; margin: 1rem 0;font-weight: bold;'> Cart Summary </header>
								<div> 
									<table style='width: 100%; text-align: center;' border='1'>
										<tr>
											<th> Product </th>
											<th> Quantity </th>
											<th> Amount </th>
										</tr>";
										
							while($cart_data = mysqli_fetch_assoc($cart_query)){
								$cart_total += $cart_data['amount'];
								
								echo "
										
										<tr>
											<td> ".$cart_data['product_name']." </td>
											<td> ".$cart_data['quantity']." </td>
											<td> ".$cart_data['amount']." </td>
										</tr>";
									
							}
							
							echo "</table>
							<p><b>Total amount: &#8373;".$cart_total."</b></p>
							<p><button class='checkout-btn'> Checkout </button></p>
								</div>
								</div>";
				
							echo "<div class='cart-and-favourites' style='cursor: pointer;'>
							<span class='favourites'>
								<i class='heart icon'></i>
							</span>
							
							<span class='cart'>
								<i class='shopping cart icon'></i>
							</span>
							
							<span class='cart-amount'>
								&#8373;".$cart_total."
							</span>
						</div>";
						
						
						}
						?>
						
						
						
						
						
						
					</nav>
					
					
					<!-- Search -->
					<div class="search-container">
						<form class="search-form">
							<div class="ui form">
								<div class="field">
									<div class="ui selection dropdown">
										<input type="hidden" name="category" class="search-category">
										<i class="dropdown icon"></i>
										<div class="default text">Select Category</div>
										<div class="menu">
											<div class="divider"></div>
											<div class="item" data-value="0">Everything</div>
											<div class="item" data-value="Writing Instruments">Writing Instruments</div>
											<div class="item" data-value="Paper Products">Paper Products</div>
											<div class="item" data-value="Filing and Storage">Filing and Storage</div>
											<div class="item" data-value="Desc Accessories">Desc Accessories</div>
											<!-- Add more categories as needed -->
										</div>
									</div>
								</div>
							</div>
							<input type="search" placeholder="What do you need?" class="search-field"/>
							<input type="submit" value="Search" class="search-btn"/>
						</form>
						
						
					</div>
					<div class="search-results">  </div>
					<div class="banner"style="text-align: center; padding: 2rem;">
						<h1 align="center"> Welcome To PaperPlace </h1>
						<p style="color: gray; line-height: 2.0; margin: 2rem 0; font-size: 1.3rem;">"Your one-stop destination for high-quality stationary products. Whether you're a student, artist, or professional, we have everything you need to stay organized, inspired, and creative. From writing instruments and paper products to desk accessories and art supplies, we offer a wide range of products that are both functional and 
						stylish. Browse our collection today and discover the perfect tools to help you bring your ideas to life."</p>
						<a href="#" class="btn"> SHOP NOW </a>
					</div>
				</section>
			</main>
					<div class="slideshow">
						<h2 align="center">Latest Products</h2>
					  <ul class="slides">
					  <?php
						$products_sql = "SELECT * FROM `products`";
						$products_query = mysqli_query($conn, $products_sql);
						
						if(mysqli_num_rows($products_query) >= 1){
							while($product = mysqli_fetch_assoc($products_query)){
								echo "
									<li class='slide-item'>
										<a href='product-details.php?product_id=".$product['id']."' target='_blank'><img src='uploads/products/".$product['product_image']."'/></a>
										<h3 style='color: gray;'> ".$product['product_name']." </h3>
										<span>&#8373;".$product['unit_price']."</span>
										
										<div class='item-buttons'>
											<button class='add-to-cart' value='".$product['id']."'> <i class='shopping cart icon'></i> </button>
											<button class='add-to-favourites' value='".$product['id']."'> <i class='heart icon'></i></button>
										</div>
									</li>
								
								";
							}
						}else{
							echo "No product has been uploaded yet.";
						}
					?>
						
						<!-- Add more items as needed -->
					  </ul>
					  <div class="navigation">
						<button class="prev"><i class="angle left icon"></i></button>
						<button class="next"><i class="angle right icon"></i></button>
					  </div>
					</div>
					
					<div class="from-the-blog">
						<h2 align="center">From The Blog</h2>
						<div class="line"></div>
						
						<div class="blog-posts">
							<div class="post-card">
								<a href="#"><img src="img/img (1).jpg" /></a>
								<p style="color:gray;"><i class="calendar outline icon"></i> Jan 1, 2023</p>
								<h3> 5 Creative Uses for Sticky Notes: Tips and Trick </h3>
								<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
							</div>
							
							<div class="post-card">
								<a href="#"><img src="img/img (2).jpg" /></a>
								<p style="color:gray;"><i class="calendar outline icon"></i> Jan 1, 2023</p>
								<h3> How to Choose the Perfect Notebook for Your Needs </h3>
								<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
							</div>
							
							<div class="post-card">
								<a href="#"><img src="img/img (3).jpg" /></a>
								<p style="color:gray;"><i class="calendar outline icon"></i> Jan 1, 2023</p>
								<h3> The Benefits of Using Fountain Pens: A Comprehensive Guide </h3>
								<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
							</div>
						</div>
					</div>
					
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
								
								<p class="social-media-handles">
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
				// Dropdown functionality
				$('.ui.dropdown').dropdown();
				 $('.ui.selection.dropdown').dropdown({
					onChange: function(value, text, $selectedItem) {
					  $('.search-category').val(value);
					}
				  });
				
				//slideshow
				var slideIndex = 0;
				  var slides = $('.slide-item');
				  var numSlides = slides.length;
				  var slideWidth = slides.first().outerWidth();
				  var numVisibleSlides = 5; // Number of slides visible at a time

				  // Set initial position of slides
				  $('.slides').css('transform', 'translateX(0)');

				  // Move to next slide
				  function nextSlide() {
					slideIndex++;
					if (slideIndex >= numSlides - numVisibleSlides + 1) {
					  slideIndex = 0;
					}
					updateSlidePosition();
				  }

				  // Move to previous slide
				  function prevSlide() {
					slideIndex--;
					if (slideIndex < 0) {
					  slideIndex = numSlides - numVisibleSlides;
					}
					updateSlidePosition();
				  }

				  // Update slide position
				  function updateSlidePosition() {
					var translateX = -slideIndex * slideWidth;
					$('.slides').css('transform', 'translateX(' + translateX + 'px)');
				  }

				  // Attach click event handlers to prev and next buttons
				  $('.prev').click(prevSlide);
				  $('.next').click(nextSlide);

				  // Automatically move to next slide every 3 seconds
				  setInterval(nextSlide, 5000);

				  
				 //navbar links toggle
				 $(".navbar-links-open").click(function(){
					$(".navbar-links").css("top", "13vh");
					$(".navbar-links").css("transition", "0.3s ease-out");
					$(this).hide();
					$(".navbar-links-close").show();
				 });
				 
				 //navbar links toggle
				 $(".navbar-links-close").click(function(){
					$(".navbar-links").css("top", "-100%");
					$(".navbar-links").css("transition", "0.3s ease-out");
					$(this).hide();
					$(".navbar-links-open").show();
				 });
				 
				 
				 //add to cart
				 $(".add-to-cart").click(function(){
					 var itemID = $(this).val();
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
							userID: userID
						  },
						success: function(response) {
							alert(response);
						}
					});
				 });
				 
				 //search
				  $(".search-form").submit(function(e) {
					e.preventDefault();
				  });
				  
				 $(".search-field").keyup(function(){
					 var searchTerm = $(this).val();
					 var category = $(".search-category").val();
					 $(".search-results").show();
					$(".search-results").css("position", "absolute");
					$(".search-results").css("z-index", "120");
					$(".mask").show();
					
					
					$.ajax({  
						type: 'POST',  
						url: 'process/search.php', 
						 data: { 
							searchTerm: searchTerm,
							category: category
						  },
						success: function(response) {
							$(".search-results").html(response);
						}
					});
				 });
				 
				 $(".mask").click(function(){
					 $(".search-results").hide();
					 $(this).hide();
					 $(".cart-details").hide();
				 });
				 
				 $(".cart-and-favourites").click(function(){
					 $(".mask").show();
					 $(".cart-details").show();
				 });
			});

		</script>
</body>

