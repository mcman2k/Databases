<html>
<! - - William Dew
       Assignment 9: SQL and PHP
       CSCI 466
       Due Date: 4/11/2014 - - >

	<head>
		<title>Assignment 9: sql and php - Part 1</title>
	</head>

	<body>

	<?php
		DEFINE ('DB_USER', 'z1692069'); //connects to the user
		DEFINE ('DB_PASSWORD', '19901008'); //accesses the password
		DEFINE ('DB_HOST', 'students'); //connects to the host name
		DEFINE ('DB_NAME', 'classicmodels'); //connects to the database name

		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) //variable assigned to connect to MySQL
		or die ('Cannot connect to MySQL:' .mysqli_connect_error()); //error statement

		mysqli_set_charset($dbc, 'utf8'); //set encoding

		echo '<center><b>Part A</b></center>';

		$query = "SELECT employeeNumber, lastName FROM Employees"; //query to be used in this script

		$result = mysqli_query($dbc, $query); //Runs the query

		if($result) //if the variable is found
		{
			echo '<ul>';
			echo '<form name="database" action="assign9.php" method="POST">';
			echo '<select name="lastname">';

			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) //fetches the array of information from the result variable
			{
				echo '<option value=" ';
				echo $row["employeeNumber"];
				echo ' " > ';
				echo $row["lastName"];
				echo '</option>';
			}
			echo '</select>';
			echo '<br><input type="submit" name="submit" value="Show"> <br>';
			echo '</form>';
			echo '</ul>';
			mysqli_free_result($result); //free the resources
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$own = trim($_POST['lastname']);
			$query2 = "SELECT lastName, firstName, city, state FROM Employees, Offices WHERE Employees.officeCode = Offices.officeCode AND Employees.employeeNumber = '$own'";
			$result2 = mysqli_query($dbc, $query2);

			if($result2)
			{
				while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) //associative array to access the column names
				{
					echo "Employee Name: ";
					echo $row['firstName'];
					echo " ";
					echo $row['lastName'];
					echo '<br>';
					echo '<br>';
					echo "City: ";
					echo $row['city'];
					echo '<br>';
					echo '<br>';
					echo "State: ";
					echo $row['state'];
					echo '<br>';
				}
			}
		}
		//closes the database 
		mysqli_close($dbc);
	?>
	</body>

	<center><a href ="assign9-2.php">Link to Part 2</a></center>
</html>
