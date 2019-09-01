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

  	<div class="container">

  		<div class="row">

    		<div class="col">
      				<h1 align="center"> <p class="text-secondary"> Welcome to Quiz Web.com ! </p> </h1>
              <h3 align="center"> <p class="text-primary"> Computer Knowledge Online Quiz Paper </p> </h3><br>
  			</div>

  		</div>

      <div class="card" align="center">
          
          <h5 class="text-center card-header"><?php echo $_SESSION['user_id']; ?> , You have to select only one out of 4. Best of Luck....</h5>
          
      </div><br>

      <div class="card" align="center">
        <form action="engine.php" method="POST">
          <?php
            $query = "SELECT * FROM q_and_a ORDER BY RAND() LIMIT 5";
            $result_set = mysqli_query($connection,$query);
            verify_query($result_set);
            $questions_num = 1;


            while ($came_questions = mysqli_fetch_assoc($result_set)) {
            
              echo "<div class=\"card\" align = \"left\">
          
                    <h6 class=\"card-header\">"."0". $questions_num. ")&nbsp;&nbsp;&nbsp;" . $came_questions['question'] . "</h6>";

              $came_id = $came_questions['question_id'];

              $queries = "SELECT * FROM answer WHERE q_id = '$came_id' ORDER BY RAND() LIMIT 4";
              $result = mysqli_query($connection,$queries);
              verify_query($result);

              while ($answer = mysqli_fetch_assoc($result)) {
                 echo "<br> <h6 class=\"radio_button\"> <input type=\"radio\" value=\"" . $answer['answers'] . "\" name = \"" .$came_questions['question'] . "\"> &nbsp;&nbsp;&nbsp;". $answer['answers'] . "</h6>";
              }

                echo "</div>"; 

            $questions_num +=1;
              
            }
            
          ?>

          <br><br> <input type="submit" value="Check Marks" class="butn"><br><br><br><br>
          
        </form>
      </div>
  </body>

</html>