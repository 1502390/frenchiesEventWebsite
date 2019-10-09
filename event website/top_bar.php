<?php
	require "utils.php";
	init_session();
?>
<img class="headerImage" style="vertical-align:middle; float:left;" src="img/intel_logo_white.png" alt="Intel Logo" />

<?php

	// Check if the last login attempt failed
	if (isset($_SESSION['login_failed']) && $_SESSION['login_failed'] == true)
	{
		// Last login attempt failed
	?>
			<div class="smalltext" style="float:left;margin-left:auto;margin-right:auto;text-align:center;color:red;" id="login_failed">LOGIN FAILED</div>
			<span class="link" onclick="show_top_window();">Login</span>&nbsp;
	<?php

		// Clear failure status
		$_SESSION['login_failed'] = false;
	}
	else
	// Check if user is logged in
	if (isset($_SESSION['user']) && $_SESSION['user'] != null)
	{
		// Logged in: show username
		printf("<span class=\"loginLink\"  onclick=\"show_top_window();\">&#x1F464; %s</span>&nbsp;\n",
			$_SESSION['user']);

		// Also show basket count
		$c = count($_SESSION['basket']);
		$b = $c > 0 ? "$c item" : "empty";
		if ($c > 1)
			$b .= "s";

		printf("<span class=\"loginLink\" onclick=\"basket_view();\">&#x1F45C; Basket (%s)</span>&nbsp;\n",
			$b);
	}
	else
	{
	// If not logged in,  show the login button
	?>
			<span class="loginLink" onclick="show_top_window();">&#x26BF; Login</span>&nbsp;
	<?php
	}
?>
