<html>
	<head>
		<title>Assignment 9: sql and php - Part 2</title>
	</head>

	<body>

	<?php
		DEFINE ('DB_USER', 'z1692069');
		DEFINE ('DB_PASSWORD', '19901008');
		DEFINE ('DB_HOST', 'students');
		DEFINE ('DB_NAME', 'classicmodels');

		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
		or die ('Cannot connect to MySQL:' .mysqli_connect_error());

		mysqli_set_charset($dbc, 'utf8');

		echo '<center><b>Part B</b></center>';

		$query3 = "SELECT officeCode, city FROM Offices";

		$result3 = mysqli_query($dbc, $query3);

		if($result3)
		{
			echo '<ul>';
			echo '<form name="database2" action="assign9-2.php" method="POST">';
			echo '<select name="office_info">';

			while($row = mysqli_fetch_array($result3, MYSQLI_ASSOC))
			{
				echo '<option value=" ';
				echo $row["officeCode"];
				echo ' " > ';
				echo $row["city"];
				echo '</option>';
			}
			echo '</select>';
			echo '<br><input type="submit" name="submit" value="Show"> <br>';
			echo '</form>';
			echo '</ul>';
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$info = trim($_POST['office_info']);
			$query4 = "SELECT city, lastName, firstName FROM Offices, Employees WHERE Employees.officeCode = Offices.officeCode AND Offices.officeCode = '$info'"; 
			$result4 = mysqli_query($dbc, $query4);

			if($result4)
			{
				while($row = mysqli_fetch_array($result4, MYSQLI_ASSOC))
				{
					echo "Employee Name: ";
					echo $row['firstName'];
					echo " ";
					echo $row['lastName'];
					echo '<br>';
					echo "City: ";
					echo $row['city'];
					echo '<br>';
					echo '<br>';
				}
			}
		}
		mysqli_close($dbc);
	?>
	</body>

	<center><a href ="assign9.php">Link Back to Part 1</a></center>
</html>

