<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Box</title>
    <style>
        body{
			background-image: url("dash1.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		.container {
			max-width: 700px;
			margin: 20px auto;
			background-color: #fff; 
			padding: 20px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
		
		table {
			border-collapse: collapse;
			border: 2px solid black;
			background-color: #f0f0f0;
			opacity: 0.8;
		}
		th{
			border: 2px solid black;
			height: 50px;
			text-align: center;
			padding: 10px;
		}
		
		td{
			border: 2px solid black;
			height: 50px;
			text-align: center;
		}

    </style>
</head>
<body>
	<div class="conatainer">
		<form method="POST">
			<!--div class="btnsubapp">
				<button type="submit" name="upd">Update</button><br><hr>
			</div-->
			<div class="details-content">
			<?php
				$conn=mysqli_connect("localhost","root","","bank");
				if($conn)
				{
					/*if(isset($_POST['upd']))
					{*/
						$que="select * from reports";
						$res=mysqli_query($conn,$que);
						if(mysqli_num_rows($res)>0)
						{
							echo "<center><table>";
							echo "<tr><th>report_id</th><th>accountNumber</th><th>reason</th><th>reported_at</th></tr>";
							while($m=mysqli_fetch_assoc($res))
							{
								echo "<tr>
										<td>".$m['report_id']."</td>
										<td>".$m['accountNumber']."</td>
										<td>".$m['reason']."</td>
										<td>".$m['reported_at']."</td>
										</tr>";
							}
							echo "</table></center>";
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
    </div>
		</form>
	</div>
</body>
</html>