<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
  
  $message = array();
  $result = false;

	if(isset($_POST['submit'])) {

		if (!isset($_POST['Email']) || strlen(trim($_POST['Email'])) < 1)  {
      $message[] = "UserName is Missing / Invalid !";
		}

		if (!isset($_POST['Password']) || strlen(trim($_POST['Password'])) < 1)  {
			$message[] = "Password is Missing / Invalid !";
		}

		if (empty($message)) {
			$email = mysqli_real_escape_string($connection, $_POST['Email']);
			$password = mysqli_real_escape_string($connection, $_POST['Password']);
			$hashed_password = sha1($password);

			$query = "SELECT * FROM users WHERE email = '{$email}' AND password = '{$hashed_password}' LIMIT 1";
			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);

			if (mysqli_num_rows($result_set) == 1) {
				$user = mysqli_fetch_assoc($result_set);
				$_SESSION['user_id'] = $user['email'];

				header('Location: src/questions.php');
			}

			else {
				$message[] = 'Invalid UserName / Password !';
			}
		}
    
    err($message);
	}	

?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asserts/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="asserts/css/common.css">

    <title>15APC2336-Questions</title>

  </head>

  <body>

  	<div class="container">

  		<div class="row">

    		<div class="col">
      				<br><br><h1 align="center"> <p class="text-secondary"> Welcome to Quiz Web.com ! </p> </h1><br><br>
  			</div>

  		</div>

    </div>

    <div>
      
      <form action="index.php" method="POST" class="col-md-6 offset-md-3">

      <h3 align="center" class="tit"> <p class="text-primary"> Log In Form </p> </h3><br>

      <div class="form-group">
        <input type="email" class="form-control" name="Email" placeholder="Enter email">
      </div>

      <div class="form-group">
        <input type="password" class="form-control" name="Password" placeholder="Password">
      </div>
  
      <button type="submit" class="btn btn-dark btn-lg btn-block" name="submit" >LOG IN</button>

      <label> New around here! Click <a href="src/registration.php"> HERE</a> to join.</label>
          
    </form>

    </div>
 
  </body>

</html>
