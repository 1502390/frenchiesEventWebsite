<?php


	$db = new mysqli("localhost", "frenchies_admin", "qu&dc0re", "frenchies");


	$res = $db->query("SELECT l.`letter` FROM `storagex` AS l");



	$level_name = array("Student", "Student Admin", "Event Organiser", "Admin", "Overseer");
	$version = "0.1";

	function error_message($text)
	{
		printf("<div class=\"error boldtext\">%s</div>\n", $text);
	}

	function init_session()
	{
		session_start();

		if (!isset($_SESSION['user']))
		{
			$_SESSION['user'] = null;
			$_SESSION['user_id'] = null;
			$_SESSION['level'] = 0;
		}
	}

?>
