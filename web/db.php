<?php
	function db_connect()
	{
		if (!isset($db))
		{
			// Connect to database
			$db = new mysqli("localhost", "frenchies_admin", "qu&dc0re", "frenchies");

			// Check connection
			if ($db->connect_errno)
			{
				printf("ERROR: Could not connect to database: %s\n", $db->connect_error);
				exit();
			}
		}

		return $db;
	}

	function db_disconnect($db)
	{
		if (isset($db))
		{
			$db->close();
		}
	}
?>
