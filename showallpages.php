<?php include('server.php'); ?>
<?php 
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<head>
  <style>
    body{
      background-image:url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR2qLdqRxrXtrQHmmbXHAbkYNK-1-VZ8ua78w&usqp=CAU");
      background-size:cover;
    }
    .card-link {
      color: #712f84;
    }
    .alert.alert-success {
        padding: 0.25rem 0.5rem;
    }
    .alert.alert-info {
      padding: 0.25rem 0.5rem;
    }
</style>
<body>
<?php include('header.php') ?>
<div>
<p><br><br></p>
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
    <?php include("errors.php"); ?>
<div class="container">
<?php 
    global $pagedates, $pages;
    bringAllPages(); 
    if (count($pages) > 0){ ?>
    <div class="row">
    <?php 
        $arrlength = count($pages);
        for($i=0;$i<$arrlength;$i++){ ?>
        <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
        <div class="card-body" style="background-color: #bb55c445;">
            <h5 class="card-title" style="font-weight: 400;font-family: DauphinPlain;"><?php echo date('F j, Y',strtotime($pagedates[$i])) ?></h5>
            <h6 class="card-subtitle mb-2 " style="font-family: DauphinPlain;">Hi there!</h6>
            <p class="card-text" style="font-family: DauphinPlain;">
            <?php
            $lines = explode(PHP_EOL, strval($pages[$i]));    //for showing only frist 5 lines in the card
            echo implode(PHP_EOL, array_slice($lines,0,4)) . PHP_EOL; 
            ?>
            </p>
            <a href="editpage.php?date='<?php echo $pagedates[$i] ?>'" class="card-link">Open Me :)</a>
            <a href="deletepage.php?date='<?php echo $pagedates[$i] ?>'" name="deletepage" class="card-link" onclick="return confirm('Are you sure you want to delete this page?');">Delete Me :)</a>
        </div>
        </div>
        </div>
    <?php }?>
    </div>
    <?php }?>
</div>
</body>
</html>
