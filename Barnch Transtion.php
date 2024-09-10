<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php"); // Redirect to the login page if not logged in
    exit;
}

// Retrieve the user's ID from the session
$userID = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Transfer Form</title>
    <style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            
        }
        .container {
        background: transparent;
        }
        h1 {
            text-align: center;
            color: #ffff;
            margin-top: 20px;
        }

        form {
            
			position: absolute;
			right: 0;
            top: 10px;
			left: 150px;
			bottom: 10px;
			max-width: 600px;
            height: 600px;
            margin: 0 auto;
            padding: 20px;
            //background: #fff;
            background-color: rgba(0, 0, 0, 0.3);
            //background: transparent ;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
            color: #fff;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;

        }

        .txt_field {
            position: relative;
            margin-bottom: 15px;
            padding-right: 35px;
        }

        .txt_field input {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
            opacity: 0.5;
            //background: transparent;
            
        }

        .txt_field label {
            position: absolute;
            top: 0;
            left: 0;
            padding-left: 5px;
            padding-top: 3px;
            color: #fff;
            transition: 0.2s ease-out;
            pointer-events: none;
        }

        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label {
            top: -20px;
            font-size: 12px;
            color: #fff;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        /* Two columns layout */
        .columns {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .column {
            flex-basis: calc(50% - 5px);
            margin-bottom: 15px;
        }

        /* Improved labels for clarity */
        .txt_field label {
            font-weight: normal;
            font-size: 14px;
            transition: 0.2s ease-out;
        }

        /* Style for the "Your Account Number" and "Your IFSC CODE" fields */
        #accountNumber ~ label,
        #IFSC_CODE ~ label {
            top: -20px;
            font-size: 12px;
            color: #fff;
            transition: 0.2s ease-out;
        }
  
        .back-vid1{
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
        width: 100%; /* Set the width to 100% to make the video cover the entire viewport width */
        height: auto;
}

        /* Media queries for responsiveness */
        @media screen and (max-width: 768px) {
            form {
                padding: 10px;
            }

            .column {
                flex-basis: 100%;
            }
        }
		
		/* Style for the side navigation bar */
		.sidenav {
			height: 100%;
			width: 250px;
			position: fixed;
			top: 0;
			left: 0;
			background-color: #e74c3c;
			overflow-x: hidden;
			transition: 0.3s;
		}
		.sidenav p{
			color: #fff;
			text-align: center;
			//padding-top: 500px;
		}

		/*.sidenav-header {
			padding: 10px;
			border: 1px solid;
			text-align: center;
			background-color: #e74c3c;
		}*/
		.sidenav-header {
			border: 1px solid #ffffff;
			padding: 10px;
			text-align: center;
			background-color: #e74c3c;
			//padding-top: 50px;
		}

		.sidenav h1 {
			color: #fff;
			margin: 0;
			font-size: 30px;
		}

		.sidenav a {
			color: #fff;
			text-decoration: none;
			display: block;
			transition: 0.2s;
		}

		.sidenav a:hover {
			background-color: #ffffff;
			color: #e74c3c;
		}

		/* Style for the main content */
		.content {
			margin-left: 250px;
			padding: 20px;
		}
		
		.li a{
			padding: 20px;
			display: flex;
			border: 1px solid;
		}
		
		.logout-section {
			/*position: absolute;
			top: 100%;
			bottom: 0;
			width: 100%;*/
			text-align: center;
		}
		
		
		
    </style>
    
</head>

<body>
<div class="valtut1">
<video autoplay muted loop play-inline class="back-vid1"><source src="b.mp4" type="video/mp4"></video>
</div>
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
   
    if(isset($_POST['Submit_Transfer'])){
            $destinationBranch = $_POST["destinationBranch"];
            $S_accountNumber = $_POST["S_accountNumber"];
            $S_IFSC_CODE = $_POST["S_IFSC_CODE"];
            $Narration = $_POST["Narration"];
            $Transfer_Amount = $_POST["Transfer_Amount"];
           
            if($Transfer_Amount > $Available_Balance ){
                echo "<script>alert('Transaction amount is more than available balance');</script>";
            }
            elseif ($Transfer_Amount <= $Available_Balance) {
                $Available_Balance = $Available_Balance - $Transfer_Amount;
                $updateQuery = "UPDATE client_account SET Available_Balance = '$Available_Balance' WHERE UserID = '$userID'";
                $op = mysqli_query($conn, $updateQuery);
                $in = "INSERT INTO tranction (accountNumber, S_accountNumber, S_IFSC, Narration, Debit, Credit) 
                VALUES ('$h_accountNumber', '$S_accountNumber', '$S_IFSC_CODE', 'branch transaction into $destinationBranch || $Narration', '$Transfer_Amount', '0')";
                $o = mysqli_query($conn, $in);
                if ($op && $o) {
                    echo "<script>alert('Transaction successful!');</script>";
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }
            }            
    }
}
?>

	<div class="sidenav">
			<div class="sidenav-header">
				<h1>My Account</h1>
			</div>
			<div class="li">
				<a href="dassboard.PHP" >Dashboard</a>
				<a href="ACCOUNT SETING.php" >Account details</a>
			</div>
			<div class="sidenav-header">
				<h1>Fund Transfer</h1>
			</div>
			<div class="li">
				<a href="Bank Transtion.php">Inter-Bank</a>
				<a href="Barnch Transtion.php">Other Banks</a>
				<a href="user transtion history.php">Transfer History </a>
			</div>
			<div class="sidenav-header">
				<h1>Loan</h1>
			</div>
			<div class="li">
				<a href="loanvalid.php">Loan Application</a>
			</div>
			<div class="logout-section">
					<div class="li">
					<h2><a href="logout.php">Log-out</a></h2>
					</div>
				<p>&copy; 2023 YourWebsite. All rights reserved.</p>
			</div>
    </div>

    
    <form method="post">

    <h1>Branch Transfer Form</h1>
    <hr><br>

        <div class="columns">
            <div class="column">
                <div class="txt_field">
                    <input type="text" name="accountNumber" id="accountNumber" value="<?php echo $h_accountNumber; ?>"readonly>
                    <label for="accountNumber">Your Account Number</label>
                </div>
            </div>
            <div class="column">
                <div class="txt_field">
                    <input type="text" name="IFSC_CODE" id="IFSC_CODE"  value="<?php echo $h_IFSC_CODE; ?>" readonly>
                    <label for="IFSC_CODE">Your IFSC CODE</label>
                </div>
            </div>
        </div>
            <div class="column">
                <label for="destinationBranch">Select Destination Branch</label>
                <select id="destinationBranch" name="destinationBranch">
                    <option value="select branch" selected disabled>Select Brach</option>
                    <option value="virar">Virar</option>
                    <option value="dombivali">Dombivali</option>
                    <option value="badlapuer">Badlapur</option>
                </select>
            </div>
        </div>

        <div class="txt_field">
            <input type="text" name="S_accountNumber" id="S_accountNumber" required>
            <label for="S_accountNumber">Sender's Account Number</label>
        </div>

        <div class="txt_field">
            <input type="text" name="S_IFSC_CODE" id="S_IFSC_CODE" required>
            <label for="S_IFSC_CODE">Sender's IFSC Code</label>
        </div>
        <div class="txt_field">
            <input type="text" name="Narration" id="Narration" required>
            <label for="Narration">Narration</label>
        </div>

        <div class="txt_field">
            <input type="text" name="Transfer_Amount" id="Transfer_Amount" required>
            <label for="Transfer_Amount">Transfer Amount</label>
        </div>
        <hr>
        <div class="center-button">
            <input type="submit" value="Transfer" name="Submit_Transfer">
        </div>
    </form>
</body>
</html>
