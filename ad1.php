<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="h1.css" />
    <title>Document</title>
    <script
      src="https://kit.fontawesome.com/b0ec5ec915.js"
      crossorigin="anonymous"
    ></script>
    <style>
        body {
    background-image: url('fetch.jpg');
    background-size: cover; /* Adjust to control image size */
    background-repeat: no-repeat; /* Prevent image from repeating */
    background-attachment: fixed; /* Fixed background image */
    }

         a{
            text-decoration:none;
        }
        h1{
        display: flex; /* Use flexbox to center content */
        flex-direction: column; /* Stack child elements vertically */
        justify-content: center; /* Center vertically */
        align-items: center;
        padding-top: 50px;
        }

        .card-container {
    display: flex;
    justify-content: space-around; /* Adjust as needed for spacing */
    align-items: center; /* Vertically center cards */
    flex-wrap: wrap; /* Allow cards to wrap to the next row if needed */
    max-width: 800px; /* Adjust as needed to control the container width */
    margin:  auto; /* Center the container on the page */
    padding-top: 70px;
}

        .card {
            width: 200px;
            height: 250px;
            background-color:white;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8); /* Slightly darker shadow */
    transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            padding-bottom:50px;
           
            
        }
        .card h1{
            font-size: 50px;
            padding-top:5px;
            
        }
        .card h2 {
    padding-bottom: 40px;
    transition: color 0.3s; /* Add a color transition */
}

.card:hover h2 {
    color: #3498db; /* Change text color on hover */
}

        .card:hover {
    background-color: #f2f2f2; /* Change to a lighter background color on hover */
    transform: scale(1.05); /* Scale up the card on hover */
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Add a shadow on hover */
}


        .card1 {
            width: 200px;
            height: 250px;
            background-color:white;/* Use an rgba color with reduced opacity */
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.9);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            padding-bottom:50px;
       }
       .card1 h1{
            font-size: 50px;
            padding-top:5px;
            
        }
        .card1 h2{
            padding-bottom:40px;
        }

       .card1:hover {
        background-color: #ffffff;
            color: #e74c3c;
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.9);
       }

       .card2 {
        width: 200px;
            height: 250px;
            background-color:white; /* Use an rgba color with reduced opacity */
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.9);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            padding-bottom:50px;
       }
       
       .card2 h1{
            font-size: 50px;
            padding-top:15px;
        }
        .card2 h2{
            padding-bottom:35px;
        }

       .card2:hover {
        background-color: #ffffff;
            color: #e74c3c;
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.9);
       }
       .card-container {
            display: flex; /* Use flexbox to place cards in a row */
            justify-content: space-between; /* Spread the cards evenly */
        }

    </style>
</head>
<body>
<div class="homepage">
      
      <div class="header-33">
          <h1>Welcome to Our Admin Panel</h1>
      </div>
     
      <!-- <div class="features">
          
          <div class="feature">
            <i class="fa-solid fa-sack-dollar"></i>
            <a href="#"> <h2>Savings & Investments</h2></a>
              <p>Explore our range of savings and investment options.</p>
          </div>
          
          
          <div class="feature">
            <i class="fa-solid fa-landmark"></i>
            <a href="#"><h2>Loan Services</h2></a>
              <p>Apply for loans with competitive interest rates.</p>
          </div>
          
          
          <div class="feature">
            <i class="fa-solid fa-money-bill-transfer"></i>
            <a href="#"> <h2>Money Transfer</h2></a>
              <p>Easily Transfer your money with super fast speed.</p>
          </div>
          
          
                   
      </div>  -->
      <div class="card-container">
    <a href="AccIFCS.php" class="card-link"> <!-- Replace with the actual URL -->
        <div class="card">
            <h1><i class="fa-solid fa-clock-rotate-left"></i></h1>
            <h2>Click to Grant Account-Number And IFSC code.</h2>
        </div>
    </a>

    <a href="transtion_list(admin) .php" class="card-link"> <!-- Replace with the actual URL -->
        <div class="card1">
            <h1><i class="fa-solid fa-filter-circle-dollar"></i></h1>
            <h2>Click to see Transaction and Refund.</h2>
        </div>
    </a>

    <a href="report.php" class="card-link"> <!-- Replace with the actual URL -->
        <div class="card2">
            <h1><i class="fa-solid fa-bug"></i></h1>
            <h2>Click to see Transaction Report.</h2>
        </div>
    </a>
</div>
         

      </body>
</html>