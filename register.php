<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  	<title>Registration</title>
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<style>
	  body {
			background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRGdoDwjeEX2SKtUYkOdnqUVqzyBVXHCfHDkg&usqp=CAU");
			background-size: cover;
	  }
	</style>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
    <div class="input-group">
  	  <label>Full name</label>
  	  <input type="text" name="name" value="<?php echo $address; ?>">
  	</div>
    <div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>