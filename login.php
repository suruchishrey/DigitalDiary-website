<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  	<style>
	  body {
			background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRGdoDwjeEX2SKtUYkOdnqUVqzyBVXHCfHDkg&usqp=CAU");
			background-size: cover;
	  }
    #alertbox1{
      padding: 0.25rem 0.5rem;
    }
	</style>
</head>
<body>
<!-- notification message -->
<?php if (isset($_SESSION['msg'])) : ?>
      <div class="alert alert-info" role="alert" id="alertbox1" >
      	<h3>
          <?php 
          	echo $_SESSION['msg']; 
          	unset($_SESSION['msg']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>