<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Boxes with Hyperlinks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .box {
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: calc(33.33% - 20px); /* 3 columns, with margin */
            margin: 10px;
            transition: background-color 0.3s ease-in-out;
            cursor: pointer;
            text-decoration: none; /* Remove underline from links */
        }

        .box:hover {
            background-color: #2980b9;
        }

        .box h2 {
            margin-top: 0;
        }

        /* Media queries for improved responsiveness */
        @media (max-width: 1200px) {
            .box {
                width: calc(50% - 20px); /* 2 columns on medium screens */
            }
        }

        @media (max-width: 768px) {
            .box {
                width: 90%; /* Full width on small screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="Bank Transtion.php" class="box">
            <h2>Bank Transaction</h2>
        </a>
        <a href="Barnch Transtion.php" class="box">
            <h2>Branch Transaction</h2>
        </a>
        <a href="user transtiont history.php" class="box">
            <h2>Transaction History</h2>
        </a>
    </div>
</body>
</html>
