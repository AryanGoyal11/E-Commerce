<html>
<head>
	<title>User Login </title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="login-box">
		<div class="row">
			<div class="col-md-6 login-left">
				<h2>Login Here</h2>
				<form action="successl.php" method="post">
					<div class="form-group">
						<label> Username</label>
						<input type="text" name="user" class="form-control" required placeholder="Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
				</form>
			</div>
		<div class="col-md-6 login-right" >
				<h2 >Or Click Here</h2>
				<h2> To Register</h2>
      			<a href="registration.php" class="btn btn-primary btn-block mt-4">Click Here</a>
			</div>
		</div>
	</div>
	</div>	
	</body>
</html>