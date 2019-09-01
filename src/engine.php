<?php session_start(); ?>
<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php'); ?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../asserts/css/common.css">

    <title>15APC2336-Questions</title>

  </head>
<body>
	<section id="mark-section">
		<div class="result-div">
			<div class="result-title-div">
				<h2><?php echo $_SESSION['user_id']; ?> , Your Results</h2>
			</div>
			<div class="all-results">
				<table class="table table-bordered table-hover">
					<thead>
						<th class="center">#</th>
						<th class="center">Question</th>
						<th class="center">Your Answer</th>
						<th class="center">Correct Answer</th>
						<th class="center">Answer Status</th>
					</thead>
					<tbody>
						<?php

							$question_number = 1;

							if (isset($_POST)) {
								foreach ($_POST as $key => $val) {
									$key = str_replace("_", " ", $key);
									echo "<tr>
											<td>". $question_number."</td>
											<td>".$key." </td>
											<td>".$val." </td>
											<td>";

											$query = "SELECT question, answer FROM q_and_a";
											$result_set = mysqli_query($connection,$query);
            								verify_query($result_set); 
            								
            								while ($result = mysqli_fetch_assoc($result_set)) {

            									if ($result['question'] == $key) {
            										echo $result['answer'];
            									}
            								}
            									
									echo	"</td>
											<td>";
											
											$query = "SELECT question, answer FROM q_and_a WHERE question ='$key' ";
											$result_set = mysqli_query($connection,$query);
            								verify_query($result_set); 

											while ( $result = mysqli_fetch_assoc($result_set)) {
												
												if ($result['question'] == $key && $result['answer'] == $val) {
            										echo "Correct Answer<br>";
            									}
            									
            									else {
            										echo "Incorrect Answer<br>";
            									}
											}
											

									echo	"</td>
										  </tr>";

									$question_number += 1;
								}
								
							}
							
							?>	
					</tbody>
				</table>
			</div>
		</div>
	</section>
</body>
</html>

