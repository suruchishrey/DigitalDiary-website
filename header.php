
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Digital Diary</title>
  <!-- add icon link--> 
  <link rel = "icon" href =  
"https://www.logodesign.net/logo/letter-d-inside-polygon-4839ld.png?size=2&industry=alphabets&bg=0" 
        type = "image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #f8c5ba99;">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <?php  if (!isset($_SESSION['username'])) : ?>
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
            <?php endif ?>
            <?php  if (isset($_SESSION['username'])) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="creatediary.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="addpage.php">Add New Page</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="showallpages.php">All pages</a>
                </li>
            <?php endif ?>
          
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="#">Digital Personal Diary</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <?php  if (isset($_SESSION['username'])) : ?>
            <li class="nav-item">
                <a class="nav-link" href="server.php?logout='1'">Logout</a>
            </li>
          <?php endif ?>
          <?php  if (!(isset($_SESSION['username']))) : ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Signup</a>
            </li>
          <?php endif ?>
        </ul>
    </div>
</nav>
</body>
</html>


