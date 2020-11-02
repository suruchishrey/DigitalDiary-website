<?php

session_start(); 
// initializing variables
$username = "";
$name = "";
$address = "";
$page = "";
$errors = array(); 
$pagedates=array();
$pages=array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'Suruchi@2001', 'Diary');
if ($bd->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//LOGOUT
if (isset($_GET['logout']) and isset($_SESSION['username'])) {
  unset($_SESSION['username']);
  unset($_SESSION['success']);
  unset($_SESSION['error']);
  session_destroy();
  
  header("location: index.php");
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($name)) { array_push($errors, "Your name is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO Users (username, password, name, address) 
  			  VALUES('$username', '$password', '$name', '$address' )";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
    header('location: creatediary.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: creatediary.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }

// ADD NEW PAGE
if(isset($_POST['add_newpage']) and isset($_SESSION['username']))
{

    $username = $_SESSION['username'];
    $newpage = mysqli_real_escape_string($db, $_POST['newpage']);
    // first check the d
    // a user does not already exist with the same username and date
    $user_check_query = "SELECT * FROM Diarypages WHERE username='$username' AND date=CURDATE() LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
        if ($user['date'] === date("Y-m-d")) {
          array_push($errors, "Page already exists redirected to all pages, update it.");
          $_SESSION['error'] = "Page already exists redirected to all pages, update it.";
          header('location: showallpages.php');
        }
        
    }
    if(!isset($_SESSION['error'])){
        $query = "INSERT INTO Diarypages (username, page, date) 
                VALUES('$username', '$newpage', curdate() )";
        mysqli_query($db, $query);
        $_SESSION['success'] = "Your page has been added";
        header('location: creatediary.php');
    }
    
}

//SHOW ALL PAGES
function bringAllPages()
{
  global $pagedates, $pages;
  $username = $_SESSION['username'];
  $conn = mysqli_connect('localhost', 'root', 'Suruchi@2001', 'Diary');
  $allpages_query = "SELECT * FROM Diarypages WHERE username='$username'";

  $result = $conn->query($allpages_query);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          $pagedates[]=$row["date"];
          $pages[]=$row["page"];
      }
    } else {
      echo "0 results";
    }
}

//GET ONE PAGE
function bringOnePage($date)
{
  global $page;
  $username = $_SESSION['username'];
  $conn = mysqli_connect('localhost', 'root', 'Suruchi@2001', 'Diary');
  $onepage_query = "SELECT * FROM Diarypages WHERE username='$username' AND date=$date LIMIT 1";
  $result = $conn->query($onepage_query);
  if ($result->num_rows > 0){
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $page=$row["page"];
    }
  } else {
    echo "0 results";
  }
}

//UPDATE PAGE
if(isset($_POST['update_page']) and isset($_SESSION['username']))
{
  $username = $_SESSION['username'];
  $date=$_GET["date"];
  $newpage = mysqli_real_escape_string($db, $_POST['newpage_update']);
  $updatepage_query = "UPDATE Diarypages SET page='$newpage' WHERE username='$username' AND date=$date";

  if ($db->query($updatepage_query) === TRUE) {
    $_SESSION['success'] = "Record updated successfully";
  } else {
    array_push($errors,"Error updating record: " . $db->error);
    $_SESSION['error']="Error updating record: " . $db->error;
  }
}

//DELETE PAGE
if($_POST['deletepage'] and isset($_SESSION['username']))
{
  echo "In delete page";
  $username = $_SESSION['username'];
  $date=$_GET["date"];
  echo "date is ". $date;
  $deletepage_query = "DELETE FROM Diarypages WHERE username='$username' AND date=$date";

  if ($db->query($deletepage_query) === TRUE) {
    $_SESSION['success'] = "Record deleted successfully";
  } else {
    array_push($errors,"Error deleting record: " . $db->error);
    $_SESSION['error']="Error deleting record: " . $db->error;
  }
  header('location: showallpages.php');
}

$db->close();
?>


