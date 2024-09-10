
<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bank';
$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn){
  if($_SERVER["REQUEST_METHOD"] == "POST" )
  {
    //include 'dbconnect.php';
  
    $username = mysqli_real_escape_string($conn, $_POST["user_id"]);
      $password = mysqli_real_escape_string($conn, $_POST["passd"]);
      
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "Select * from login where username='$username' AND password='$password'";
       $result = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($result);
       if ($num==1)
       {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: http://localhost/FINAL/dassboard.php");
        exit;
       }
      //  else{
      //   echo "<script>
      //   alert('Invalid Credentials');
      //   </script>";
      //  }
  
    }
   /////////////////////////////////////////////////////////////////////////////////////////-->



?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bank';
$conn = mysqli_connect($host, $username, $password, $dbname);
  //include 'dbconnect.php';
  $username = mysqli_real_escape_string($conn, $_POST["user_id"]);
    $password = mysqli_real_escape_string($conn, $_POST["passd"]);
    
  
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $sql = "Select * from admin where uid='$username' AND cred='$password'";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     if ($num==1)
     {
      $login = true;
     /* session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;*/
      header("location: http://localhost/FINAL/ad1.php");
      exit;
     }
    //  else{
    //   echo "<script>
    //   alert('Invalid Credentials');
    //   </script>";
    //  }

  }
}
?>





<!DOCTYPE html>
<html>
<head>
  
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login page page</title>
<style>
body {
  
  
  background-size: cover;
  font-family: Arial, Helvetica, sans-serif;


}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #e74c3c;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 70%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.logo{
  width: 20%;
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.container {
  padding: 16px;
}

span.register {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-image:url("form back.jpg");
  background-repeat: no-repeat;
  background-position:center;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
.butt {
  
  margin-left: 800px;
  width: 150px;
  border-radius: 20px;

}
.space{
  padding-top: 2px;
}
.butt1 {
  
  margin-left: 300px;
  width: 150px;
  border-radius: 20px;

}


.valtut{
  margin-bottom:-70px ;

}
.valtut h3{
  margin-top: 400px;
  margin-right: 20px;
  text-align: center;
  color: orangered;
  

}
.back-vid{
position: fixed;
top: 0;
left: 0;
z-index: -1;
width: 100%; /* Set the width to 100% to make the video cover the entire viewport width */
  height: auto;
}


@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
  

<div class="valtut">
<video autoplay muted loop play-inline class="back-vid"><source src="login.mp4" type="video/mp4"></video>
  <h3>Click Below to login</h3>
<button onclick="document.getElementById('id01').style.display='block'" name="Client_Login" class="butt">Client Login</button>
</div>
<div class="space">

</div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="logo.png" alt="logo" class="logo">
    </div>

    <div class="container">
      
      <label for="Account Number"><b>User Id</b></label><br>
      <input type="text" placeholder="Enter Your user id Number" name="user_id" required><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="passd" required><br>
        
      <button type="submit">Login</button><br>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="register">Don't Have a Account? <a href="og regpage.php"> REGISTER</a></span><br>
      <!-- <span class="register1"><a href="og regpage.php">Admin Login</a></span><br> -->
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<button onclick="document.getElementById('id02').style.display='block'" name="Admin_Login" class="butt1">Admin Login</button>
<div id="id02" class="modal">
  
  <form class="modal-content animate" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="logo.png" alt="logo" class="logo">
    </div>

    <div class="container">
      
      <label for="Account Number"><b>User Id</b></label><br>
      <input type="text" placeholder="Enter Your user id Number" name="user_id" required><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="passd" required><br>
        
      <button type="submit">Admin Login</button><br>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="register">Don't Have a Account? <a href="og regpage.php"> REGISTER</a></span><br>
      <!-- <span class="register1"><a href="og regpage.php">Admin Login</a></span><br> -->
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
