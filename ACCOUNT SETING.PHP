<?php 
	session_start();

	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
	{
		header("location: login page.php");
		exit;
	}

	$userId = $_SESSION['username'];

// Establish a database connection
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'bank';
	$conn = mysqli_connect($host, $username, $password, $dbname);

	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}

// Fetch user account details
$accountDetails = null;

// Replace 'your_query_here' with the appropriate SQL query to retrieve the user's account details
/*$query = "SELECT * FROM register WHERE UserID = '$userId'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
   // $accountDetails = mysqli_fetch_assoc($result);
   if ($result && mysqli_num_rows($result) > 0) {
    //$accountDetail = mysqli_fetch_assoc($r);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $fname =$row["fname"];
            $lname =$row["lname"];
            $email=$row["email"];
            $phone=$row["phone"];
            $AccountType=$row["AccountType"];
            $city=$row["city"];
            $occupation=$row["occupation"];
        }
           

        
    }
}
}
$accountDetail = null;
$q = "SELECT * FROM client_account WHERE UserID = '$userId'";
$r = mysqli_query($conn, $q);
if ($r && mysqli_num_rows($r) > 0) {
    //$accountDetail = mysqli_fetch_assoc($r);
    if(mysqli_num_rows($r)>0){
        while($row = mysqli_fetch_assoc($r)) {
            $accountNumber=$row["accountNumber"];
            $IFSC_CODE=$row["IFSC_CODE"];
             $Available_Balance=$row["Available_Balance"];
        }
    }
}*/

mysqli_close($conn);
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
            background-image: url('acc1.jpg');
            background-size: cover; 
            background-repeat: no-repeat;
            background-attachment: fixed; 
            background-position: center center;
        }

        .container {
            left: 200px;
			max-width: 600px;
            margin-left: 30%;
			//margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.3); /* Slightly transparent white background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            border-radius: 40px;
            padding: 40px;
            //padding-bottom: 50px;
            //padding-right: 40px;
			//opacity: 0.9;
        }
        .space{
            padding-top:100px;
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
            background-color: red;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 7px;
        }
        .space1{
            padding-top:250px;
        }

        button:hover {
            background-color: #009999;
        }
		
		table {
			border-collapse: collapse;
			border: 2px solid black;
			background-color: #f0f0f0;
			width: 600px;
			height: 600px;
			opacity: 0.8;
		}
		th{
			border: 1px solid black;
			height: 40px;
			text-align: center;
			padding: 5px;
			background-color: red;
		}
		
		td{
			border: 1px solid black;
			padding: 5px;
			height: 40px;
			text-align: center;
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
    <div class="space"><!-- don't delete this div --></div>
    
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
	
	<div class="container">
        <h2>Account Details</h2>
        <form  method="POST">
			<?php
				$conn=mysqli_connect("localhost","root","","bank");
				if($conn)
				{
					$que="select * from register ";//	where UserID = '$userId'";
					$res=mysqli_query($conn,$que);
						if(mysqli_num_rows($res)>0)
						{
							while($m=mysqli_fetch_assoc($res))
							{	echo"<center><table>			
							<tr>
								<th colspan='4'>Name</th>
							</tr>
							<tr>
								<td>Ms/Mr : </td>
								<td>".$m['fname']."</td>
								<td>".$m['mname']."</td>
								<td>".$m['lname']."</td>
							</tr>
							<tr>
								<th>UserId</th>
								<th>Password</th>
								<th>Account No</th>
								<th>IFSC Code</th>
							</tr>
							<tr>
								<td>".$m['UserId']."</td>
								<td>".$m['Password']."</td>
								<td>".$m['AccountNo']."</td>
								<td>".$m['IFSCcode']."</td>
							</tr>
							<tr>
								<th>Phone Number</th>
								<th>Email</th>
								<th>Date of Birth</th>
								<th>Marital Status</th>
							</tr>
							<tr>
								<td>".$m['phone']."</td>
								<td>".$m['email']."</td>
								<td>".$m['DOB']."</td>
								<td>".$m['marriage']."</td>
							</tr>
							<tr>
								<th colspan='2'>Residential Address</th>
								<th colspan='2'>City & State</th>
							</tr>
							<tr>
								<td colspan='2'>".$m['address']."</td>
								<td>".$m['city']."</td>
								<td>".$m['state']."</td>
							</tr>
							<tr>
								<th>CitizenShip</th>
								<th>Occupation</th>
								<th>Account Type</th>
								<td rowspan='2'><button>Edit Profile</button></td>
							</tr>
							<tr>
								<td>".$m['citizen']."</td>
								<td>".$m['occupation']."</td>
								<td>".$m['AccountType']."</td>
							</tr>
							
							</table></center>";
							}
						}
						else
						{
							echo "not found";
						}
					/*}
					else
					{
						echo "not work";
					}*/
				}
				else
				{
					echo "not conn";
				}
		?>
        </form>
        <!--button type="submit">Delete Account</button-->
    </div>
</body>
</html>
