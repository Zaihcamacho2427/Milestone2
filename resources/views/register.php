
<!DOCTYPE html>
<html>
<head>
<style>
<?php include 'public/css/styles.css'; ?>
</style>
	<title>Register Page</title>   
	<!-- Form takes in register properties of type User and uses the register method within the AccountController -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<!-- Stores user entered information for controller to use using POST method -->
			<div class="card-body" style="padding: 1.00rem;">
				<form action = "registeruser" method = "post">
				<input type = "hidden" name = "_token" value = "<?php echo csrf_token()?>"/>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="firstname" placeholder="First Name">
						
					</div>
						<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="lastname" placeholder="Last Name">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="Email Address">						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="text" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<select name="gender" class="form-control">
                          <option value="">Select Gender...</option>
                          <option value=0>Male</option>
                          <option value=1>Female</option>
                        </select>
					</div>
					<div class="form-group center">
						<input type="submit" value="Register" class="btn float-right login_btn">
					</div>	
				
				</form>
			</div>
			<!-- Link to sign in if user has account already -->
			<div class="card-footer" style="background-color: rgba(0,0,0,0.5)">
				<div class="d-flex justify-content-center links">
					Already have an account?<a href="login">Sign In</a>
				</div>
			</div>
			
			
		</div>
	</div>
</div>
</body>
</html>