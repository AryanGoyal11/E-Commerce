<html>
<head>
  <title>User Registration </title>
  <link rel="stylesheet" type="text/css" href="css/style3.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="login-box">
    <div class="row">
        <div class="col-md-6 login-right ">
        <h2>Already Have an Account</h2>
            <a href="login.php" class="btn btn-primary btn-block mt-4">Click Here</a>
      </div>    
              <div class="col-md-6 login-left">
        <h2>Register Here</h2>
        <form action="successr.php" method="post">
          <div class="form-group">
            <label> Username</label>
            <input type="text" name="user" class="form-control" required placeholder="Username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
        </form>
      </div>
    </div>
  </div>
  </div>  
  </body>
</html>