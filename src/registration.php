<?php require_once('../inc/connection.php'); ?>
<?php require_once('../inc/functions.php') ?>

<?php 

	$message = "";

	$user_Name = '';
	$password = '';
	$re_password = '';

	if (isset($_POST['submit'])) {
		
		$user_Name = $_POST['Email'];
		$password = $_POST['Password'];
		$re_password = $_POST['RePassword'];
		
		$req_fields = array('$user_Name', '$password', '$re_password');
		$message[] = check_req_fields($req_fields);

		if ($re_password != $password) {
			$message[] = 'Passwords are not matching, try again';
		}

		$max_len_fields = array('$user_Name' => 100, '$password' => 40);
		$message[] = check_max_len($max_len_fields);

		$email = mysqli_real_escape_string($connection, $user_Name);
		$query = "SELECT * FROM users WHERE email = '{$email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);
		verify_query($result_set);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$message[] = 'Email address already exists';
			}
		}

		if (empty($message[0]) && empty($message[1]) && empty($message[2]) && empty($message[3]) && empty($message[4]) ) {

			$password = mysqli_real_escape_string($connection, $password);

			$hashed_password = sha1($password);

			$query = "INSERT INTO users (email, password ) VALUES ('$email', '$hashed_password')";

			$result = mysqli_query($connection, $query);

			verify_query($result);

			if ($result) {
				$message[] = 'Successfully registrated';
				header('Location: ../index.php?');
			}

			if (!$result) {
				$message[] = 'Failed to registration.';
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
    <link rel="stylesheet" href="../asserts/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../asserts/css/common.css">

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
      
      <form action="registration.php" method="POST" class="col-md-6 offset-md-3">

      <h3 align="center" class="tit"> <p class="text-primary"> Sign Up Form </p> </h3><br>

      <div class="form-group">
        <input type="email" class="form-control" name="Email" placeholder="Enter email">
      </div>

      <div class="form-group">
        <input type="password" class="form-control" name="Password" placeholder="Password">
      </div>

      <div class="form-group">
    	<input type="password" class="form-control" name="RePassword" placeholder="Re-Enter Password">
  	  </div>
  
      <button type="submit" class="btn btn-dark btn-lg btn-block" name="submit" >Sign Up</button>
          
    </form>

    </div>
 
  </body>

</html>
