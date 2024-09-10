<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
       header("location: login page.php");
       exit;
}
$userId = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <title>Welcome</title>
</head>
<body>
 
    <div class="sidenav">
        <div class="sidenav-header">
            <h1>My Account</h1>
        </div>
        <hr>
        <ul style="margin-top: -12px;margin-bottom: -15px;">
            <li><a href="dassboard.PHP" >Dashboard</a></li>
            <li><a href="ACCOUNT SETING.php" >Account details</a></li>
          
        </ul>
        <hr>
        <div class="sidenav-header2">
            <h1>Fund Transfer</h1>
        </div>
        <hr>
        <ul style="margin-top: -12px;margin-bottom: -15px;">
            <li><a href="Bank Transtion.php">Inter-Bank</a></li>
            <li><a href="Barnch Transtion.php">Other Banks</a></li>
            <li><a href="user transtiont history.php">Transfer History </a></li>
            
        </ul>
        <hr>
        <div class="sidenav-header2">
            <h1>Loan</h1>
        </div>
        <hr>
        <ul style="margin-top: -12px;margin-bottom: -15px;">
            <li><a href="loan1.php">Loan Application</a></li>
   
            
        </ul>
        <hr>
        <hr>
        <div class="sidenav-header2">
        <li><a href="logout.php">Log-out</a></li>
        </div>
        <hr>
        <p>&copy; 2023 YourWebsite. All rights reserved.</p>
    </div>
    <div class="content">
        <!-- Your main content goes here -->
    </div>
</body>
</html>
