<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PaperPlace Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Semantic UI CSS CDN -->
	
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/main.css">
    <style>
        /* Custom CSS for styling */
        /* Add your own custom styles here */
    </style>
</head>

<body>
		<main class="wrapper flex">
			<section class="login-form">
				<form class="login-form" action="process/login-auth.php" method="POST" class="flex" enctype="multipart/form-data">
					<div class="form-items-wrapper">
						<div class="brand"> <span style="color: var(--primary);">Paper</span><span style="color: red;">Place</span> </div>
						<h3 align="center"> Welcome Back!</h3>
						<div class="form-field"> 
							<label> Email of Phone Number </label>
							<p><input type="text" id="email" name="email"> </p>
						</div>
						<div class="form-field"> 
							<label> Password </label>
							<p><input type="password" name="password" id="password"> </p>
						</div>
						<div class="form-field"> 
							<input type="checkbox" name="remember_me"> Remember Me
							<a href="#" style="float: right;"> Forgot Password? </a>
						</div>
						
						<div class="form-field"> <input type="submit" value="Sign In"/></div>
						
						<div class="form-field extras">
							<p> Don't have an account? <a href="register.php">Sign Up here</a></p>
						</div>
						
						<div id="#response"></div>
					</div>
				</form>
				
				
				<aside>
					<div class="inner"><!-- Covered by a background image --></div>
				</aside>
			</section>
		</main>
		
		<script src="jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
		
		<script>
		
			

		</script>
</body>

