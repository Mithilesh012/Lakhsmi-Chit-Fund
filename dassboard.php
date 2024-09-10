<!--?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
       header("location: login page.php");
       exit;
}
$userId = $_SESSION['username'];

?-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Loan Services</title>
	<style>
	
	body{
		margin: 0;
		padding: 0;
		border: none;
		outline: none;
		font-family: Arial, sans-serif;
	}

	body {
		background-color: #f0f0f0;
		
	}
	
	main {
		background-image: url("dashboard.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
		text-align: center;
		width: 950px;
		height: 500px;
		margin: 20px auto;
		padding-top: 40px;
		padding-bottom: 20px;
		padding-left: 250px; /* Adjust this value to shift it right */
		padding-right: 20px;
		background-color: #fff;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	.card {
		display: fixed;
		height: 200px;
		width: 280px;
		padding: 10px;
		opacity: 0.75;
		//background-color: rgba(0,0,0,.5);
		//background: transparent;
		border: 1px solid #ccc;
		border-radius: 20px;
		margin: 5px;
		text-align: center;
		/* background-color: ; */
	}

	.card h2, h3 {
		font-size: 24px;
		margin-bottom: 10px;
	}

	.card:hover {
		background-color: #ff6355;
	}
	
	img{
		height: 70px;
		width: 70px;
	}
	.space {
		margin-top: 20px; /* Adjust this value as needed to control the spacing */
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
	<script>
		function myFunction1() {
			location.href = "ACCOUNT SETING.php";
		}
		function myFunction2() {
			location.href = "user transtion history.php";
		}
		function myFunction3() {
			location.href = "loanvalid.php";
		}
		function myFunction4() {
			location.href = "Bank Transtion.php";
		}
		function myFunction5() {
			location.href = "";
		}
		function myFunction6() {
			location.href = "";
		}
</script>
</head>
<body>
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


    <main>
		<section class="options">
			<div>
				<button class="card" onclick="myFunction1()">
					<img src="Account.jpg" alt="Account">
					<h2>Account</h2>
				</button>
				<button class="card" onclick="myFunction2()">
					<img src="Transaction_History.png" alt="Transaction">
					<h2>Transfer History</h2>
				</button>
				<button class="card" onclick="myFunction3()">
					<img src="LoanApp.png" alt="LoanApp">
					<h2>Loan Application</h2>
				</button>
			</div>
			<div>
				<button class="card" onclick="myFunction4()">
					<img src="Money_Transfer.png" alt="Transfer">
					<h2>Money Transfer</h2>
				</button>
				<button class="card" onclick="myFunction5()">
					<img src="Setting.jpg" alt="A/C Setting">
					<h2>Account Setting</h2>
				</button>
			</div>
		</section>
    </main>
</body>
</html>