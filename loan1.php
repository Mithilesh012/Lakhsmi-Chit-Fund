<html>
<head><title></title></head>
<style>
body {
	background-color: #f0f0f0;
	font-size: 21px;
}

.container {
    max-width: 700px;
    margin: 20px auto;
	background-color: #fff; 
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
	text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input,select,textarea {
	height: 40px;
	width: 225px;
    padding: 10px;
	font-size: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btnsubapp {
	text-align: center;
}

button{
	padding: 15px 50px;
	font-size: 20px;
    border: 2px solid #ccc;
    border-radius: 5px;
	cursor: pointer;
}

button:hover{
	background-color: #009999;
}

</style>

<body>
<div class="container">
	<h2>Loan Application</h2><hr>
	<form method="POST">
	
		<div class="form-group">
			<label for="name">Name :</label>
            <input type="text" id="name" name="FirstName" placeholder="FirstName" required>
            <input type="text" id="name" name="LastName" placeholder="LastName" required>
        </div>
            
        <div class="form-group">
			<label for="email">Email :</label>
			<input type="email" id="email" name="email" placeholder="Enter your EmailId" required>
		</div>
        
		<div class="form-group">
			<label for="mobile">Mobile No :</label>
			<input type="number" id="mobile" name="mobile" placeholder="Enter your Mobile No." required>
		</div>
		
		<div class="form-group">
			<label for="address">Address :</label>
			<input type="text" id="address" name="address"  placeholder="Enter your Residential Address" required>
			<input type="text" id="address" name="place"  placeholder="City/Town with postal/zip code" required>
		</div>
        
		<div class="form-group">
			<label for="State">State :</label>
			<select name="State">
				<option disabled selected>Select Your State</option>
				<option>Andhra Pradesh</option><option>Arunachal Pradesh</option>
				<option>Assam</option><option>Bihar</option>
				<option>Chhattisgarh</option><option>Goa</option>
				<option>Gujarat</option><option>Haryana</option>
				<option>Himachal Pradesh</option><option>Jammu and Kashmir</option>
				<option>Jharkhand</option><option>Karnataka</option>
				<option>Kerala</option><option>Ladakh</option>
				<option>Madhya Pradesh</option><option>Maharashtra</option>
				<option>Manipur</option><option>Meghalaya</option>
				<option>Mizoram</option><option>Nagaland</option>
				<option>Odisha</option><option>Punjab</option>
				<option>Rajasthan</option><option>Sikkim</option>
				<option>Tamil Nadu</option><option>Telangana</option>
				<option>Tripura</option><option>Uttarakhand</option>
				<option>Uttar Pradesh</option><option>West Bengal</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="Marital_Status">Marital Status :</label>
			<select name="MaritalStatus">
				<option disabled selected>Select Marital Status</option>
				<option>Single</option>
				<option>Married</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="amount">Loan Amount :</label>
			<input type="number" id="amount" name="amount" placeholder="" required>
		</div>
		
		<div class="form-group">
			<label for="term">Loan Term (in months) :</label>
			<input type="number" id="term" name="term" placeholder="" required><br>
		</div>		
		<!--div class="form-group">
			<input type="radio" value="Single">
			<input type="radio" arial-label="Radio button for following text input" name="Radiobtn" id="option3" value="option3">
		</div-->
		
		<div class="form-group">
			<label for="purpose">Loan Purpose :</label>
			<select name="Purpose">
				<option disabled selected>Select Loan Purpose</option>
				<option>Home Loan</option>
				<option>Personal Loan</option>
				<option>Car Loan</option>
				<option>Education Loan</option>
			</select>
		</div>
		
		<div class="btnsubapp">
			<hr><br><button type="submit" name="sub">Submit Application</button>
		</div>
	<?php
		$conn=mysqli_connect("localhost","root","","bank");
		if($conn)
		{
			if(isset($_POST['sub']))
			{
				$fn=$_POST['FirstName'];
				$ln=$_POST['LastName'];
				$e=$_POST['email'];
				$m=$_POST['mobile'];
				$add=$_POST['address'];
				$plc=$_POST['place'];
				$s=$_POST['State'];
				$MS=$_POST['MaritalStatus'];
				$am=$_POST['amount'];
				$t=$_POST['term'];
				$pur=$_POST['Purpose'];
				
				$query="insert into Loan values('$fn','$ln','$e','$m','$add','$plc','$s','$MS','$am','$t','$pur')";
				$m=mysqli_query($conn,$query);
				if($m)
				{
					echo '<script>alert("Your application for Loan is Submited ")</script>';
				}
			}
		}
		else
		{
			echo "not connected";
		}

	?>
	</form>
</div>
</body>
</html>