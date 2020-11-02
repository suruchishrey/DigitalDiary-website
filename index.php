<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><span class="glyphicon glyphicon-book"></span>Digital Diary</h1>
    <p class="lead">Be your own friend! Spill your thoughts here.</p><br><br>
  </div>
</div>

  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="alert alert-success" role="alert" >
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
<div class="row">
    <div class="col-sm-4">
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR8AxgrDFcNDaHVKAqU3emC-Do4sQa0KIHuLA&usqp=CAU" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">Can't find a notebook? Jot down your ideas here.</p>
		</div>
	</div>
	</div>
	<br>
	<div class="col-sm-4">
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQS484Ca_i-O1zsBO-06yQXWv7Yod42i5QxjQ&usqp=CAU" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">Exhausted from your day to day problems and have noone to talk to? Be your own friend, write here.</p>
		</div>
	</div>
	</div>
	<br>
	<div class="col-sm-4">
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="https://sc02.alicdn.com/kf/HTB1d4YdmhHI8KJjy1zbq6yxdpXa6/225415824/HTB1d4YdmhHI8KJjy1zbq6yxdpXa6.jpg_.webp" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">Boost your confidence! Write down your aim,future plans,travel plans and achievements here.</p>
		</div>
	</div>
	</div>
</div>
	<br>
<div class="row">
	<div class="col-sm-4">
	<div class="card" style="width: 20rem;">
		<img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTf5R3gQ9yVwYKkan-uDGbDKx0TDF61NJMpWw&usqp=CAU" alt="Card image cap">
		<div class="card-body">
			<p class="card-text">Keep a record of your lovely memories, secret crushes, fun experiences and many more!</p>
		</div>
	</div>
	</div>
	<br>
	
    <!-- user who has not logged in -->
    <?php  if (!isset($_SESSION['username'])) : ?>
		<div class="col-sm-6">
		<div class="card" style="width: 40rem;">
			<img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRNlzpRYMnCcTgvDD-Dam01GJSmtrsXfvks6A&usqp=CAU" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title">Its time :)</h5>
				<p class="card-text">To have all of these inculcated in your life you are dearly welcomed here but to continue this journey, you must login first!</p>
			</div>
		</div>
		</div>
	<br>
    <?php endif ?>

</div>
<br><br>		
</body>
</html>
<?php
include("footer.php");
?>