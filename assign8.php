<html>
<! - - William Dew
       Assignment 7: Basic php
       CSCI 466
       Due Date:4/4/2014 - - >

	<head>
		<h3><center>Grade Calculator II</center></h3>
	</head>

	<body>
		<form name="grade_input" action="assign8.php" method="POST">

                <p>
                        Total assignment points: <input type="text" name="assigntot">
			Your assignment points: <input type="text" name="assignpts">
		</p>

		<p>
				Total test/quiz points: <input type="text" name="testtot">
				Your test/quiz points: <input type="text" name="testpts">
		</p>

		<button type="submit" id="percent">Calculate
		<button type="reset" onclick="Reset">Reset</button>

		</form>

		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$at = $_POST[assigntot];
				$ap = $_POST[assignpts];

				$tt = $_POST[testtot];
				$tp = $_POST[testpts];

				$assign_avg = ($ap / $at);
				$test_avg = ($tp/ $tt);

				$final_avg = ((($assign_avg * .40) + ($test_avg * .60)) * 100);

				echo "Your percentage so far: " . $final_avg;
				echo "%";
				echo "<br/>";

					if($final_avg == 100 && $final_avg >= 95)
						$letter_grade = 'A';
					else if($final_avg <= 94.9 && $final_avg >= 92)
						$letter_grade = 'A-';
					else if($final_avg <= 91.9 && $final_avg >= 89)
						$letter_grade = 'B+';
					else if($final_avg <= 88.9 && $final_avg >= 86)
						$letter_grade = 'B';
					else if($final_avg <= 85.9 && $final_avg >= 83)
						$letter_grade = 'B-';
					else if($final_avg <= 82.9 && $final_avg >= 79)
						$letter_grade = 'C+';
					else if($final_avg <= 78.9 && $final_avg >= 75)
						$letter_grade = 'C';
					else if($final_avg <= 74.9 && $final_avg >= 70)
						$letter_grade = 'C-';
					else if($final_avg <= 69.9 && $final_avg >= 68)
						$letter_grade = 'D';
					else if($final_avg <= 67)
						$letter_grade = 'F';

				echo "Your letter grade at this point: " . $letter_grade;
			}
		?>
	</body>

</html>
