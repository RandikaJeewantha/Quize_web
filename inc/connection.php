<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'question_web_db';

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno()) {

		die('Database connection failed!' . '<br><br>' . mysqli_connect_error());
	}

?>