<?php include('server.php') ?>
<?php 
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<head>
  <style>
    #exampleFormControlTextarea6 {
    font-family: DauphinPlain;
    background-color: #f4d9d299;
  }
    .alert.alert-success {
        padding: 0.25rem 0.5rem;
    }
    .alert.alert-info {
      padding: 0.25rem 0.5rem;
    }
    body{
      background-image:url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTzfEa9Mhcrey_Ly-PDqrw9KFuKn_hDQVLg_w&usqp=CAU");
      background-size:cover;
    }
    
  h2{
    font-weight: 400;font-family: DauphinPlain;
  }
  p, label{
    font-family: DauphinPlain;
  }
  textarea{
    font-family: DauphinPlain; background-color: antiquewhite;
  }
</style>
<body>

<?php include('header.php') ?>
<br><br><br><br>
	<!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="alert alert-success" role="alert" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
        </h3>
        <br><br>
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
        <br><br>
      </div>
    <?php endif ?>
<div class="container">
  <h2 >Write whatever you want..</h2>
  <p >Note:You can avoid writing date coz I store it automatically ;)</p>
      <br>
<form method="post" action="addpage.php">
<?php include('errors.php'); ?>
<div class="form-group shadow-textarea" >
  <label for="exampleFormControlTextarea6">Enjoy writing!</label>
  <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="15" name="newpage" placeholder="Write something here..." style=""></textarea>
    <br>
    <div class="input-group">
  		<button type="submit" class="btn" name="add_newpage" style=" padding: 10px;
    font-size: 20px;
    color: #ac6d5e;
    background: #f8c5ba44;
    border: none;
    border-radius: 5px;">Save</button>
    </div>
</div>
</form>
</div>
</body>
</html>
