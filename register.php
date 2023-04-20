<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PaperPlace Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Semantic UI CSS CDN -->
	
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
		<main class="wrapper flex">
			<form class="register-form" enctype="multipart/form-data">
				<div class="brand"> <span style="color: var(--primary);">Paper</span><span style="color: red;">Place</span> </div>
				<header><h3> Create An Account </h3></header>
				<section class="grid register-form-inner">
					<section> 
						<div class="form-field"> 
							<label> Full Name </label>
							<p><input type="text" placeholder="John Doe" name="full_name"/> </p>
						</div>
						
						<div class="form-field"> 
							<label> Email Address </label>
							<p><input type="email" placeholder="johndoe@gmail.com" name="email"/> </p>
						</div>
						
						<div class="form-field"> 
							<label> Password </label>
							<p><input type="password" placeholder="********" name="password"/> </p>
						</div>
						<div class="form-field"> 
							<label> Profile Photo </label>
							<p><input type="file" id="profilePhoto" name="profile_photo"/> </p>
						</div>
					</section>
					<section> 
						<div class="form-field"> 
							<label> City/Town </label>
							<p><input type="text" placeholder="Accra" name="city"/> </p>
						</div>
						
						<div class="form-field"> 
							<label>Region </label>
							<p><input type="text" placeholder="Greater Accra" name="region"/> </p>
						</div>
						
						<div class="form-field"> 
							<label> Country </label>
							<p><input type="text" value="Ghana" name="country"/> </p>
						</div>
					</section>
					<section>
						<div class="form-field"> 
							<label> Phone Number </label>
							<p><input type="text" placeholder="(+233) XX XXX XXXX" name="phone_number"/> </p>
						</div>
						
						<div class="form-field"> 
							<label> Date of Birth </label>
							<p><input type="date" name="dob"/> </p>
						</div>
						
						<div class="form-field"> 
							<label> Sex </label>
							<p>
								<select name="sex"> 
									<option> Male </option>
									<option> Female </option>
								</select> 
							</p>
						</div>
					</section>
				</section>
				<div class="form-field extras"> 
					<span><input type="checkbox" name="acceptance" id="acceptance"> I have read and accepted the <a href="under-construction.html">Terms and Conditions. </a></span>
					<span>Already have an account? <a href="login.php">Login here</a></span>
				</div>
				
				<div class="form-field" style="text-align: center; margin-top: 3rem;"> <input type="submit" value="Register"/></div>
				<div id="response"></div>
			</form>
		</main>
		
		<script src="jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
		
		<script>
			$(document).ready(function() {
    //upload data
    $(".register-form").submit(function(e) {
        e.preventDefault(); // prevent page refresh
        
        var formData = new FormData($(this)[0]);
        
        formData.append("profile_photo", $("#profilePhoto")[0].files[0]);
        
        if ($('#acceptance').is(':checked')) {
            // Checkbox is checked
           $.ajax({
			  url: "process/add-user.php",
			  type: "POST",
			  data: formData,
			  contentType: false,
			  cache: false,
			  processData: false,
			  success: function(data) {
				$('#response').html(data);
			  },
			  error: function(data) {
				alert("An error occurred while submitting the form.");
			  }
			});
        } else {
            // Checkbox is not checked
            alert('Please check the acceptance checkbox.');
        }
        
    
     
    });
    //end of jquery
});


		</script>
</body>

