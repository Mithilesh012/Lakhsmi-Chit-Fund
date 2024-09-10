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
    <title>Transaction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            //background-color: #f4f4f4;
			background-image: url("dash1.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
            //margin: 0;
            //padding: 0;
        }
		
        .container {
			background: transparent;
			position: fixed;
			top: 40px;
			right: 0;
			left: 150px;
			bottom: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        form {
            display: fixed;
			max-width: 500px;
			height: 480px;
            margin: 0 auto;
            padding: 20px;
            background-color: #9999;
			//opacity: 0.2;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
			padding-top: 5px;
			padding-left: 8px;
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
			opacity: 0.5;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 3px;
            background-color: #fff;
        }

        .txt_field label {
            position: absolute;
            top: 0;
            left: 0;
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
            background-color: #;
            padding: 10px 20px;
            border: 2px solid;
            border-radius: 8px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #ff6355;
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
            color: #333;
            transition: 0.2s ease-out;
        }
  
        .back-vid1 {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
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
		
		
		/* Reset some default styles */

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

		.sidenav-header {
			padding: 10px;
			border: 1px solid;
			text-align: center;
			background-color: #e74c3c;
		}
		.sidenav-header2 {
			border: 1px solid #ffffff;
			padding: 9px;
			text-align: center;
			background-color: #e74c3c;
			//padding-top: 50px;
		}

		.sidenav h1 {
			color: #fff;
			margin: 0;
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
			position: absolute;
			top: 100%;
			bottom: 0;
			width: 100%;
			text-align: center;
		}
		
    </style>
</head>
<body>
<div class="valtut1">
<video autoplay muted loop play-inline class="back-vid1"><source src="a.mp4" type="video/mp4"></video>
</div>
<div class="li">   
	<div class="sidenav">
			<div class="sidenav-header">
				<h1>My Account</h1>
			</div>
			<div class="li">
				<a href="dassboard.PHP" >Dashboard</a>
				<a href="ACCOUNT SETING.php" >Account details</a>
			</div>
			<div class="sidenav-header2">
				<h1>Fund Transfer</h1>
			</div>
			<div class="li">
				<a href="Bank Transtion.php">Inter-Bank</a>
				<a href="Barnch Transtion.php">Other Banks</a>
				<a href="user transtion history.php">Transfer History </a>
			</div>
			<div class="sidenav-header2">
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

	
	
	<div class="container">
        
        <form method="POST">
		
			<h1>MONEY TRANSFER</h1><hr><br>
            <div class="txt_field">
                <input type="text" name="S_accountNumber" required>
                <label>Account Number</label>
            </div>
            <div class="txt_field">
                <input type="text" name="c_accountNumber" required>
                <label>Confirm Acc. Num.</label>
            </div>
            <div class="txt_field">
                <input type="text" name="S_IFSC_CODE" required>
                <label>IFSC CODE</label>
            </div>
            <div class="txt_field">
                <input type="text" name="Narration" required>
                <label>Narration</label>
            </div>
            <div class="txt_field">
                <input type="text" name="Transfer_Amount" required>
                <label>Transaction Amount</label>
            </div>
            <hr><input type="submit" name="Pay_Amount" value="Pay Amount">
        </form>
    </div>
</div>      
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bank';
$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn) {
    if (isset($_POST['Pay_Amount'])) {
        $S_accountNumber = $_POST["S_accountNumber"];
        $c_accountNumber = $_POST["c_accountNumber"];
        $S_IFSC_CODE = $_POST["S_IFSC_CODE"];
        $Narration = $_POST["Narration"];
        $Transaction_Amount = $_POST["Transfer_Amount"];
        $H_accountNumber;
        $h_accountNumber;
        $H_IFSC_CODE;
        $h_IFSC_CODE;
        $Available_Balance;

        $s = "select * from client_account where UserID = '$userID' ";
        $q = mysqli_query($conn, $s);
        if (mysqli_num_rows($q) > 0) {
            while ($row = mysqli_fetch_assoc($q)) {
                $Available_Balance = $row["Available_Balance"];
                $H_accountNumber = $row["accountNumber"];
                $H_IFSC_CODE = $row["IFSC_CODE"];
            }
            if ($Transaction_Amount > $Available_Balance) {
                echo "<script>alert('Transaction amount is more than available balance: $Available_Balance');</script>";
            } elseif ($Transaction_Amount <= $Available_Balance) {
                $debit = $Transaction_Amount;
                $credit = 0;
                $Available_Balance = $Available_Balance - $Transaction_Amount;
                $updateQuery = "UPDATE client_account SET Available_Balance = '$Available_Balance' WHERE UserID = '$userID' ";
                $op = mysqli_query($conn, $updateQuery);
                $in = "INSERT INTO tranction (accountNumber, S_accountNumber, S_IFSC, Narration, Debit, Credit) 
                    VALUES ('$H_accountNumber', '$S_accountNumber', '$S_IFSC_CODE', 'bank transaction $Narration','$debit','$credit')";
                $o = mysqli_query($conn, $in);
                if ($op && $o) {
                    // Success, you can handle this as needed
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }

                ////////////////////////////////////////////////////////////////////////////////////////////////
                $s = "select * from client_account where accountNumber = '" .$S_accountNumber. "' ";
                $q = mysqli_query($conn, $s);
                if (mysqli_num_rows($q) > 0) {
                    while ($row = mysqli_fetch_assoc($q)) {
                        $Available_Balance = $row["Available_Balance"];
                        $h_accountNumber = $row["accountNumber"];
                        $h_IFSC_CODE = $row["IFSC_CODE"];
                    }
                }

                $debit = 0;
                $credit = $Transaction_Amount;
                $Available_Balance = $Transaction_Amount + $Available_Balance;
                $updateQuery = "UPDATE client_account SET Available_Balance = '$Available_Balance' WHERE accountNumber = '" . $S_accountNumber . "' ";
                $op = mysqli_query($conn, $updateQuery);
                $in = "INSERT INTO tranction (accountNumber, S_accountNumber, S_IFSC, Narration, Debit, Credit) 
                    VALUES ('$h_accountNumber', '$H_accountNumber', '$H_IFSC_CODE', 'bank transaction $Narration','$debit','$credit')";
                $o = mysqli_query($conn, $in);

                if ($op && $o) {
                    echo "<script>alert('your tration is succesful');</script>";
                } else {
                    echo "<script>alert('Something went wrong');</script>";
                }
            } else {
                echo "<script>alert('Transaction amount is more than available balance: $Available_Balance');</script>";
            }
        } else {
            echo "Error: Unable to find your available balance";
        }
    } else {
        echo " ";
    }
} else {
    echo "Connection error, please try again later";
}
?>

</body>
</html>
