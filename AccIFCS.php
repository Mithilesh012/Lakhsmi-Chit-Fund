<html>
	<head>
		<title>A/c gen</title>
	</head>
	<style>
		body {
			background-color: #f0f0f0;
		}
		.container {
			max-width: 700px;
			margin: 20px auto;
			background-color: #fff; 
			padding: 20px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		form {
			display: flex;
			flex-direction: column;
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
		
		/*table{
			border-collapse: collapse;
			border-spacing: 10px;  
		}*/

		.form-group {
			margin-bottom: 20px;
		}
		label {
			font-weight: bold;
			margin-bottom: 5px;
		}
		input {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		table, td {
			border: 2px solid black;
		}

		table {
			border-collapse: collapse;
		}
</style>
<body>

<div class="container">
        <h2></h2>
		<?php
			$conn=mysqli_connect("localhost","root","","bank");
			if($conn)
			{
				if(isset($_POST['sub']))
				{
					$qe="select * from register where IFSCcode = '' and AccountNo = ''";
					$re=mysqli_query($conn,$qe);
					if(mysqli_num_rows($re)>0)
					{
						echo "<center><table border='2px solid'><tr><td>UserId</td><td>Phone</td><td>Email</td><td>Date Of Birth</td><td>IFSC Code</td><td>Account No</td></tr>";
						while($m=mysqli_fetch_assoc($re))
						{
							echo "<tr>
									<td>".$m['UserId']."</td>
									<td>".$m['phone']."</td>
									<td>".$m['email']."</td>
									<td>".$m['DOB']."</td>
									<td>".$m['IFSCcode']."</td>
									<td>".$m['AccountNo']."</td>
								</tr>";
						}
						echo "</table></center>";
					}
				}
				if(isset($_POST['upd']))
				{
					$if=$_POST['IFSC'];
					$acc=$_POST['AccNo'];
					$ui=$_POST['UserId'];
					
					$que="update register 
							set IFSCcode = '$if',AccountNo = '$acc'
							where UserId = '$ui'";
					$res=mysqli_query($conn,$que);
					$quer=" insert into client_account('$acc','','','$if','','$ui','')";
					$resu=mysqli_query($conn,$quer);
				}
			}
		?>
		
        <form method="POST">

			<div class="btnsubapp">
				<hr><button type="submit" name="sub">Check New Users oF Bank</button><br><hr>
			</div>
		</form>
		<form method="POST">
			
			<div class="form-group">
				<label for="IFSCcode">Give IFSC Code To New User:</label>
				<input type="text" id="IFSCcode" name="IFSC" placeholder="xxLMCFXXXX" required>
			</div>
			
			<div class="form-group">
				<label for="AccountNo">Give Account No. To New User:</label>
				<input type="number" id="AccountNo" name="AccNo" placeholder="xxxxxxxxxxxx" required>
			</div>
			
			<div class="">
				<h3>Giving To The User Where </h3>
			</div>
			
			<div class="form-group">
				<label for="UserId">User Id :</label>
				<input type="text" id="UserId" name="UserId" placeholder="Users UserId" required>
				<!--input type="text" id="mname" name="mname" placeholder="Users MiddleName" required>
				<input type="text" id="lname" name="lname" placeholder="Users LastName" required-->
			</div>
			
			<div class="btnsubapp">
				<hr><button type="submit" name="upd">Update</button><br><hr>
			</div>
			
        </form>
		<?php
			$conn=mysqli_connect("localhost","root","","bank");
			if($conn)
			{
				if(isset($_POST['upd']))
				{
					/*$if=$_POST['IFSC'];
					$acc=$_POST['AccNo'];
					$ph=$_POST['phone'];
					$em=$_POST['email'];
					$dob=$_POST['DOB'];
					$ui=$_POST['UserId'];*/
					
					$que="select * from register
							where IFSCcode != '' and AccountNo != ''";
					$res=mysqli_query($conn,$que);
					if(mysqli_num_rows($res)>0)
					{
						echo "<center><table border='2px solid'><tr><td>UserId</td><td>Phone</td><td>Email</td><td>Date Of Birth</td><td>IFSC Code</td><td>Account No</td></tr>";
						while($m=mysqli_fetch_assoc($res))
						{
							echo "<tr>
									<td>".$m['UserId']."</td>
									<td>".$m['phone']."</td>
									<td>".$m['email']."</td>
									<td>".$m['DOB']."</td>
									<td>".$m['IFSCcode']."</td>
									<td>".$m['AccountNo']."</td>
								</tr>";
						}
						echo "</table></center>";
					}
				}
			}
		?>
		
    </div>
</body>
</html>