<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
       header("location: login page.php");
       exit;
}
$userId = $_SESSION['username'];
$accountNumber = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 1px solid #e0e0e0;
    background-color: #fff;
}

/* Style the table header */
thead {
    background-color: #f5f5f5;
    font-weight: bold;
}

th, td {
    padding: 12px 16px;
    text-align: left;
    border-bottom: 1px solid #e0e0e0;
}

/* Add a line to separate columns */
th:not(:first-child),
td:not(:first-child) {
    border-left: 1px solid #e0e0e0;
}

/* Alternate row colors for better readability */
tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Highlight on hover */
tbody tr:hover {
    background-color: #f0f0f0;
}

/* Align numeric data to the right */
td:nth-child(4) {
    text-align: right;
}

/* Center text vertically and horizontally */
th, td {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

/* Add responsive layout for smaller screens */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }

    th, td {
        padding: 8px 10px;
    }
}

.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
	position: absolute;
	top: 0;
	right: 0;
	left: 200px;
	bottom: 0;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 600px;
}

.close {
    float: right;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #f00;
}

/* Form styles within the modal */
form {
    text-align: left;
    margin-top: 20px;
    padding-right: 35px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: vertical;
}

button[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
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
        <h2>Transaction History</h2>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'bank';
        $conn = mysqli_connect($host, $username, $password, $dbname);

        if (!$conn) {
            echo "<script>alert('Something went wrong');</script>";
        } else {
            $accountNumber;
            $s = "SELECT * FROM client_account WHERE UserID = '$userId'";
            $q = mysqli_query($conn, $s);
            if (mysqli_num_rows($q) > 0) {
                while ($row = mysqli_fetch_assoc($q)) {
                    $accountNumber = $row["accountNumber"];
                }
            }

            // Fetch transaction records
            $query = "SELECT * FROM tranction WHERE accountNumber = '$accountNumber' ORDER BY transaction_date DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo '<table>';
                echo '<thead>';
                echo '<tr>';

                echo '<th>Sender Account</th>';
                echo '<th>Holder Account</th>';
                echo '<th>Debit</th>';
                echo '<th>Credit</th>';
                echo '<th>Narration</th>';
                echo '<th>Transaction Date</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['S_IFSC'] . '</td>';
                    echo '<td>' . $row['S_accountNumber'] . '</td>';
                    echo '<td>' . $row['Debit'] . '</td>';
                    echo '<td>' . $row['Credit'] . '</td>';
                    echo '<td>' . $row['Narration'] . '</td>';
                    echo "<td>" . $row['transaction_date'] . "</td>";
                    echo "<td>
                    <button type='button' name='Report_transaction' onclick='openModal(\"{$row['S_accountNumber']}\", \"Account Number: {$row['S_accountNumber']}, Amount: {$row['Debit']}, Date & Time: {$row['transaction_date']}\")'>Report</button>
                    </td>";
                    echo "</tr>";
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No transaction records found.</p>';
            }
        }
        ?>
    </div>
    <div id="reportModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Report Transaction</h3>
            <form id="reportForm" method="post">
                <input type="hidden" id="reportedAccountNumber" name="accountNumber" value="">
                <label for="reportReason">Report Details(transaction amount and date and time also):</label>
                <textarea id="reportReason" name="report_reason" rows="4" cols="50" required></textarea>
                <button type="submit" name="Report_transaction">Submit Report</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById('reportModal');

        // When the user clicks the button, open the modal
        function openModal(accountNumber, reportMessage) {
            document.getElementById('reportedAccountNumber').value = accountNumber;
            document.getElementById('reportReason').value = reportMessage;
            modal.style.display = 'block';
        }

        // When the user clicks on <span> (x), close the modal
        function closeModal() {
            modal.style.display = 'none';
        }
    </script>

    <?php
    if (isset($_POST['Report_transaction'])) {
        $accountNumber = $_POST['accountNumber'];
        $reportReason = $_POST['report_reason'];

        // Add code here to handle the reporting of the transaction

        // You can insert a report record into the database
        $insertReportQuery = "INSERT INTO reports (accountNumber, reason) VALUES ('$accountNumber', '$reportReason')";
        $insertReportResult = mysqli_query($conn, $insertReportQuery);

        if ($insertReportResult) {
            echo "<script>alert('Transaction reported successfully');</script>";
        } else {
            echo "<script>alert('Error reporting transaction');</script>";
        }
    }
    ?>
</body>
</html>
