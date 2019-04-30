
<!DOCTYPE html>
<html>
<head>
	<title>Contact-Us</title>
	
	<link rel="stylesheet" type="text/css" href="style_contact.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
</head>

<body>

<table class="table">
    <thead>
      <tr>
        <th>LOCATION ID</th>
        <th>LOCATION</th>
        <th>ADDRESS</th>
      </tr>
    </thead>
    

</div>


<tbody>

		<?php
					$db_host = 'localhost'; // Server Name
			$db_user = 'root'; // Username
			$db_pass = ''; // Password
			$db_name = 'votingsystem'; // Database Name



			$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
			if (!$conn) {
				die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
			}
			$location = $_POST["search"];

			$sql = 'SELECT LOCATION_ID, LOCATION, ADDRESS 
					FROM votinglocation WHERE LOCATION = $location group by LOCATION';
					
			$query = mysqli_query($conn, $sql);

			if (!$query) {
				die ('SQL Error: ' . mysqli_error($conn));
			}

			// if ($_SERVER["REQUEST_METHOD"]=="POST") {
	 			
			// }

		while ($row = mysqli_fetch_array($query))
		{
			$check_id = $row['LOCATION'];
			if($check_id == $location){
			echo '<tr>		
					<td>'.$row['LOCATION_ID'].'</td>
					<td>'.$row['LOCATION'].'</td>
					<td>'.$row['ADDRESS'].'</td>
				</tr>';
				$flag=1;
			}
			else
			{
				$flag=0;
			}
		}
			if($flag=0)
			{
				echo "Voter id does not exist";
			}
		?>
	

</tbody>
</table>	
</body>
</html>