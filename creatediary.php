<?php include("server.php"); ?>
<?php 
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
  }
?>

<head>
  <style>
    .alert.alert-success {
        padding: 0.25rem 0.5rem;
    }
    .alert.alert-info {
      padding: 0.25rem 0.5rem;
    }
    body{
      background-image:url("https://wallpapercave.com/wp/wp5352396.jpg");
      background-size:cover;
    }
    </style>
</head>
<body>
    <!-- notification message -->
    <?php
      include("header.php");
    ?>
    <br><br><br><br>
  <div class="container">
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="alert alert-success" role="alert">
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <?php if (isset($_SESSION['error'])) : ?>
      <div class="alert alert-info" role="alert" >
      	<h3>
          <?php 
          	echo $_SESSION['error']; 
          	unset($_SESSION['error']);
          ?>
      	</h3>
      </div>
    <?php endif ?>
    
    <br><br>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
      <div class="card w-75">
      <div class="card-body" style="background-color: antiquewhite;" >
        <h5 class="card-title" style="font-weight: 400;font-family: DauphinPlain;">Hi <strong><?php echo $_SESSION['username']; ?></strong> !</h5>
        <p class="card-text" style="font-family: DauphinPlain;">Welcome! I am your diary. Now you can write whatever you want to.
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?

	 </p>
      </div>
    </div>
    	<p></p>
    <?php endif ?>
</div>
</body>
</html>
