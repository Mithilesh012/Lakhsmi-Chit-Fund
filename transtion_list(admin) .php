<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bank';
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    echo "<script>alert('Something went wrong');</script>";
}

// Fetch transaction records
$query = "SELECT * FROM tranction ORDER BY transaction_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Apply general styling to the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 1px solid #e0e0e0;
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
.back-vid1{
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
        width: 100%; /* Set the width to 100% to make the video cover the entire viewport width */
        height: auto;
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

</style>
    <!-- ... your head content ... -->
</head>
<body>
    <!-- ... your navigation and other content ... -->
    <div class="valtut1">
<video autoplay muted loop play-inline class="back-vid1"><source src="e.mp4" type="video/mp4"></video>
</div>

    <div class="container">
        <h2>Transaction History</h2>
        <table>
            <thead>
                <tr>
                    <th>Sender Account</th>
                    <th>Holder Account</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Narration</th>
                    <th>date tranction</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['accountNumber'] . "</td>";
                    echo "<td>" . $row['S_accountNumber'] . "</td>";
                    echo "<td>" . $row['Debit'] . "</td>";
                    echo "<td>" . $row['Credit'] . "</td>";
                    echo "<td>" . $row['Narration'] . "</td>";
                    echo "<td>" . $row['transaction_date'] . "</td>";
                    echo "<td>
                    <form method='post'>
                    <button type='submit' name='Refund_transaction' value='" . $row['transaction_date'] . "'>Refund</button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
                if (isset($_POST['Refund_transaction'])) {
                    $transaction_date = $_POST['Refund_transaction'];
                
                    // Fetch transaction details based on transaction date
                    $query = "SELECT * FROM tranction WHERE transaction_date = '$transaction_date'";
                    $transaction_result = mysqli_query($conn, $query);
                
                    if (mysqli_num_rows($transaction_result) > 0) {
                        $row = mysqli_fetch_assoc($transaction_result);
                        $sender_account = $row['S_accountNumber'];
                        $recipient_account = $row['accountNumber'];
                        $debit_amount = $row['Debit'];
                        $credit_amount = $row['Credit'];
                
                        // Check if this is a debit transaction
                        if ($debit_amount > 0) {
                            // Fetch sender's current available balance
                            $sender_balance_query = "SELECT Available_Balance FROM client_account WHERE accountNumber = '$sender_account'";
                            $sender_balance_result = mysqli_query($conn, $sender_balance_query);
                
                            if (mysqli_num_rows($sender_balance_result) > 0) {
                                $sender_balance_row = mysqli_fetch_assoc($sender_balance_result);
                                $sender_balance = $sender_balance_row['Available_Balance'];
                
                                // Update the sender's available balance
                                $new_sender_balance = $sender_balance + $debit_amount;
                                $update_sender_query = "UPDATE client_account SET Available_Balance = '$new_sender_balance' WHERE accountNumber = '$sender_account'";
                                $update_sender_result = mysqli_query($conn, $update_sender_query);
                
                                if ($update_sender_result) {
                                    // Now, delete the transaction
                                    $delete_query = "DELETE FROM tranction WHERE transaction_date = '$transaction_date'";
                                    $delete_result = mysqli_query($conn, $delete_query);
                
                                    if ($delete_result) {
                                        echo "<script>alert('Transaction Deleted and Refunded');</script>";
                                        // You can handle the success response or page refresh here
                                    } else {
                                        echo "<script>alert('Error deleting transaction');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Error updating sender\'s balance');</script>";
                                }
                            } else {
                                echo "<script>alert('Sender account not found');</script>";
                            }
                        } elseif ($credit_amount > 0) { // Check if it's a credit transaction
                            // Fetch recipient's current available balance
                            $recipient_balance_query = "SELECT Available_Balance FROM client_account WHERE accountNumber = '$recipient_account'";
                            $recipient_balance_result = mysqli_query($conn, $recipient_balance_query);
                
                            if (mysqli_num_rows($recipient_balance_result) > 0) {
                                $recipient_balance_row = mysqli_fetch_assoc($recipient_balance_result);
                                $recipient_balance = $recipient_balance_row['Available_Balance'];
                
                                // Update the recipient's available balance
                                $new_recipient_balance = $recipient_balance - $credit_amount;
                                $update_recipient_query = "UPDATE client_account SET Available_Balance = '$new_recipient_balance' WHERE accountNumber = '$recipient_account'";
                                $update_recipient_result = mysqli_query($conn, $update_recipient_query);
                
                                if ($update_recipient_result) {
                                    // Now, delete the transaction
                                    $delete_query = "DELETE FROM tranction WHERE transaction_date = '$transaction_date'";
                                    $delete_result = mysqli_query($conn, $delete_query);
                
                                    if ($delete_result) {
                                        echo "<script>alert('Transaction Deleted and Refunded');</script>";
                                        // You can handle the success response or page refresh here
                                    } else {
                                        echo "<script>alert('Error deleting transaction');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Error updating recipient\'s balance');</script>";
                                }
                            } else {
                                echo "<script>alert('Recipient account not found');</script>";
                            }
                        } else {
                            echo "<script>alert('This is not a debit or credit transaction');</script>";
                        }
                    } else {
                        echo "<script>alert('Transaction not found');</script>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        
        <!-- ... your footer content ... -->
    </body>
</html>
