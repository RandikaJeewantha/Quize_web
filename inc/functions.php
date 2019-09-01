<?php

	function err($message) {

		$msg = "";
		
		if (isset($message) && !empty($message)) {
			foreach ($message as $key => $seg) {
					
				$msg .= $seg;
				$msg .= "\\n";
			}

			echo "<script type='text/javascript'>alert('$msg');</script>";
		}
	}

	function verify_query($result_set) {

		global $connection;

		if (!$result_set) {

			die("Database query failed!" . mysqli_error($connection));
		}
	}

	function check_req_fields($req_fields) {

		$error = "";
 
		foreach ($req_fields as $field) {

			if (empty(trim($field))) {

				$error = 'Email/Password is required !';
			}
		}

		return $error; 
	}

	function check_max_len($max_len_fields) {

		$error = "";

		foreach ($max_len_fields as $field => $max_len) {

			if (strlen(trim($field)) > $max_len) {

				$error = 'Email must be less than 100 characters and Password must be less than 40 characters !';
			}
		}

		return $error;
	}

	function row_count($query) {

		global $connection;
		$num_row = array();
		
		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			$num_row = mysqli_num_rows($result_set);
		}

		return $num_row;
	}
?>
