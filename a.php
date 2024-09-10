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
    <title>Account Details</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .column {
            flex-basis: calc(33.33% - 10px); /* Three columns with margin between */
        }

        .half-column {
            flex-basis: calc(50% - 10px); /* Two columns with margin between */
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bank';
$conn = mysqli_connect($host, $username, $password, $dbname);
if($conn){
    $h_accountNumber;
    $h_IFSC_CODE;
    $Available_Balance=0;
    $s= "select * from client_account where UserID = '$userID' ";
        $q=mysqli_query($conn,$s);
        if(mysqli_num_rows($q)>0){
            while($row = mysqli_fetch_assoc($q)) {
                $h_accountNumber=$row["accountNumber"];
                 $h_IFSC_CODE=$row["IFSC_CODE"];
                 $Available_Balance=$row["Available_Balance"];
            }
        }
    $se= "select * from client_account where UserID = '$userID' ";
    $q=mysqli_query($conn,$se);
 }
?>        
<body>
    <div class="container">
        <h2>Account Details</h2>
        <form action="process_account_details.php" method="POST">
            <div class="row">
                <div class="column">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" required>
                </div>
                <div class="column">
                    <label for="mname">Middle Name:</label>
                    <input type="text" id="mname" name="mname">
                </div>
                <div class="column">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" required>
                </div>
            </div>
            <div class="row">
                <div class="half-column">
                    <label for="accountNumber">accountNumber:</label>
                    <input type="text" id="accountNumber" name="accountNumber" required>
                </div>
                <div class="half-column">
                    <label for="IFSC_CODE">IFSC_CODE:</label>
                    <input type="text" id="IFSC_CODE" name="IFSC_CODE" required>
                </div>
            </div>
            <div class="row">
            <div class="half-column">
                    <label for="Available_Balance">Available_Balance:</label>
                    <input type="text" id="Available_Balance" name="Available_Balance" required>
                </div>
                <div class="half-column">
                    <label for="accountType">Account Type:</label>
                    <select id="accountType" name="accountType">
                        <option value="savings">Savings</option>
                        <option value="current">Current</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="half-column">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="half-column">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="row">
                <div class="half-column">
                    <label for="DOB">Date of Birth:</label>
                    <input type="date" id="DOB" name="DOB" required>
                </div>
                <div class="half-column">
                    <label for="marriage">Marital Status:</label>
                    <select id="marriage" name="marriage">
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select>
                </div>
            </div>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <div class="row">
                <div class="half-column">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>
                </div>
                <div class="half-column">
                    <label for="state">State:</label>
                    <input type="text" id="state" name="state" required>
                </div>
            </div>

            <div class="row">
                <div class="half-column">
                    <label for="citizen">Citizenship:</label>
                    <input type="text" id="citizen" name="citizen" required>
                </div>
                <div class="half-column">
                    <label for="occupation">Occupation:</label>
                    <input type="text" id="occupation" name="occupation" required>
                </div>
            </div>
           

            <button type="submit">delect account</button>
        </form>
    </div>
</body>
</html>
