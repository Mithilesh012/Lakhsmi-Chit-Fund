<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    
    <title>registeration page</title>

 



<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$showAlert = false;
$showError = false;
  include 'dbconnect.php';
  $username = $_POST["user_id"];
  $password = $_POST["passd"];
  $cpassword = $_POST["cpassd"];
  $fn=$_POST['Fname'];
  $ln=$_POST['Mname'];
  $e=$_POST['Lname'];
  $m=$_POST['phone'];
  $add=$_POST['email'];
  $plc=$_POST['dob'];
  $s=$_POST['marital-status'];
  $MS=$_POST['addr'];
  $am=$_POST['city'];
  $t=$_POST['state'];
  $pur=$_POST['citizenship'];
  $v=$_POST['Occupation'];
  $z=$_POST['AccountType'];
  // $exists=false;
  //checking username if it exist or not in db/
  $existSql = "SELECT * FROM `login` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows > 0){
    // $exists = true;
    $showError = "Username already Exists";

  }
  else{
    // $exists = false;
    if($password == $cpassword){
      $sql = "INSERT INTO `login` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
      $query="insert into register values('$fn','$ln','$e','$m','$add','$plc','$s','$MS','$am','$t','$pur','$v','$z')";
      $m=mysqli_query($conn,$query);
      if($m)
      {
          echo '<script>alert("Your registeration form is Submited ")</script>';
      }
      $result = mysqli_query($conn, $sql);
      if ($result){
       $showAlert = true;
       header("location:http://localhost/FINAL/login_page.php");
      }
   }
   else{
     $showError = "Password do not match";
   }
  }


 

  
}


?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $conn=mysqli_connect("localhost","root","","bank");
  if($conn)
  {
      if(isset($_POST['sub']))
      {
          $fn=$_POST['Fname'];
          $ln=$_POST['Mname'];
          $e=$_POST['Lname'];
          $m=$_POST['phone'];
          $add=$_POST['email'];
          $plc=$_POST['dob'];
          $s=$_POST['marital-status'];
          $MS=$_POST['addr'];
          $am=$_POST['city'];
          $t=$_POST['state'];
          $pur=$_POST['citizenship'];
          $v=$_POST['Occupation'];
          $z=$_POST['Account Type'];
          $ifs="";
          $acc="";
          $uid=$_POST['UserId'];
          $pass=$_POST['Password'];
          $avbal="500";
          
          $query="insert into register values('$fn','$ln','$e','$m','$add','$plc','$s','$MS','$am','$t','$pur','$v','$z','$ifs','$acc','$uid','$pass')";
          $m=mysqli_query($conn1,$query);
          $qwert="insert into client_account values('$acc','$e','$fn','$ifs','$avbal','$uid','$pass')";
          $def=mysqli_query($conn1,$qwert);
          if($m)
          {
              echo '<script>alert("Your registeration form is Submited ")</script>';
          }
      }
  }
  else
  {
      echo "not connected";
  }
}
else{
  $showError = "Password do not match";
}



 

?>

<!DOCTYPE html>
<html>
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    <!-- Bootstrap CSS -->
   
    <title>Registeration page</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  /* background-color: black; */
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  /* background-image: url("bg\ reg.jpg"); */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  padding: 20px;
  border-radius: 20px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 1px solid black;

  background-image: url("reg bg");
}

img{
    border-radius: 50%;                 
    float:right;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.cancelbtn {
  background-color: #f44336;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

 
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .registerbtn {
  float: left;
  width: 50%;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #000000;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}
.back-vid{

position: fixed;
  top: 0;
  left: 0;
  z-index: -1;
  width: 110%; /* Set the width to 100% to make the video cover the entire viewport width */
  height: auto; 

}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  /* background-color: #f1f1f1; */
  text-align: center;
}
</style>
</head>
<body>
<video autoplay muted loop play-inline class="back-vid"><source src="coll.mp4" type="video/mp4"></video>
 
   
<form action="" method="post">
  <div class="container">
    <a href="header.html"> <img src="logo.png" alt="logo"height="110px"></a>
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>

    <hr>
    <table>
        <tr>
            <td>
                <label for="Fname">First Name</label>
                <input type="text"placeholder="Enter First Name"name="Fname"id="Fname"required>            
            </td>
            <td>
                <label for="Mname">Middle Name</label>
                <input type="text"placeholder="Enter Middle Name"name="Mname"id="Mname"required>
            </td>
            <td>
                <label for="Lname">Last Name</label>
                <input type="text"placeholder="Enter Last Name"name="Lname"id="Lname"required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="phone">Phone Number</label>
                <input type="text"placeholder="Enter Phone Number"name="phone"id="phone"required>
            </td>
            <td>
                <label for="email">Email</label>
                <input type="text"placeholder="Enter Email"name="email"id="email"required>
            </td>
            <td>
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob"id="dob"required>
            </td>
            <td>
              <label for="marital-status">Marital Status</label>
              <select name="marital-status" id="marital-status">
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Widowed">Widowed</option>
              </select>
          </td>
        </tr>
        <tr>
            <td>
                <label for="addr">Residential Address</label>
                <input type="text"placeholder="Enter your Address"name="addr"id="addr"required>
            </td>
            <td>
                <label for="city">City</label>
                <input type="text"placeholder="Enter City"name="city"id="city"required>
            </td>
            <td>
                <label for="state">Select Your State</label>
                <select id="state" name="state">
                    <option selected disabled>Select the State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chattisgarh">Chattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujrat">Gujrat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himanchal Pradesh">Himanchal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh	</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu	">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh	">Uttar Pradesh	</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
              </select> 
            </td>
            </tr>
            <tr>
                <td>
                    <label for="citizenship">Citizenship</label>
                    <input type="text"placeholder="Enter your Citizenship"name="citizenship"id="citizenship"required>
                </td>
                <td>
                    <label for="occupation">Occupation</label>
                    <input type="text"placeholder="Enter Occupation"name="Occupation"id="Occupation"required>
                </td>
               
                <td>
                  <label for="AccountType">Select Your Account Type</label>
                  <select name="AccountType" id="AccountType">
                    <option value="disabled" selected disabled>Select Your A/c Type</option>
                    <option value="savings account">Savings Account</option>
                    <option value="current account">Current Account</option>
                    <option value="salary account">Salary Account</option>
                  </select>
                </td>
            </tr>
            <tr>
              <td>
                <label for="UserID">UserID</label>
                <input type="text" name="user_id"id="UserID"placeholder="Enter Your UserID"required>
              </td>
            <td>
                <label for="psw">Password</label>
                <input type="password" placeholder="Enter Password" name="passd" id="psw" required>
            </td>
            <td>
                <label for="psw-repeat">Confirm Password</label>
                <input type="password" placeholder="Confirm Password" name="cpassd" id="psw-repeat" required>
            </td>
        </tr>
        <tr>
          <td>
            <button type="submit" class="registerbtn">Register</button>
    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
  
          </td>
        </tr>
    </table>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    
    </div>
    
  <div class="container signin">
    <p>Already have an account? <a href="login_page.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
