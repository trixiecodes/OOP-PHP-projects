<?php
require_once "redirect.php";
?>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Betsinart - Parasites" />
	<meta name="author" content="Trixie Diane Bautista, Azel Ann Miranda, Betsinart - Parasites" />
	<title>User Login</title>
</head>
<body>
	<form action="login.inc.php" method="post">

		<label>Username</label><input type="text" placeholder="Enter username" name="username" />

		<label for="inputPassword">Password</label><input id="inputPassword" type="password" placeholder="Enter password" name="password" />

		<button name="submit">Login</button>

	</form>

</body>
</html>