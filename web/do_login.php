<?php
	require "db.php";
	require "utils.php";

	init_session();

	$db = db_connect();
	if (!$db)
	{
		error_message("ERROR: Could not connect to database: " . mysqli_connect_error());
		exit();
	}

	$name = $db->real_escape_string($_POST['name']);
	$pass = $db->real_escape_string($_POST['pass']);

	$q = "SELECT `ID`, `Username`, `Level` FROM `users`
			WHERE MD5('$pass')=`Password`
			AND (`Username`='$name')
			LIMIT 1";

	$res = $db->query($q);


	if (!$res)
	{
		error_message("ERROR: " . $db->error);
		$_SESSION['login_failed'] = true;
	}
	else
	{
		if ($res->num_rows < 1)
		{
			error_message("Unknown username/password.");
			$_SESSION['login_failed'] = true;
		}
		else
		{
			// Successful log in
			$obj = $res->fetch_object();

			printf("User %s logged in.\n",
				$obj->Username);

			// Set session variables
			$_SESSION['user'] = $obj->Username;
			$_SESSION['user_id'] = $obj->ID;
			$_SESSION['level'] = $obj->Level;

			// Create an empty loan basket
			$_SESSION['basket'] = array();
		}

		$res->close();
	}
?>

<?php
	db_disconnect($db);
?>
