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
	<title>User Register</title>
</head>
<body>
	<form action="register.inc.php" method="post">

		<label for="inputFirstName">First Name</label>
		<input id="inputFirstName" type="text" placeholder="Enter first name" name="firstname" />
		<br>

		<label for="inputLastName">Last Name</label><input id="inputLastName" type="text" placeholder="Enter last name" name="lastname" />
		<br>

		<label for="inputUsername">Username</label><input id="inputUsername" type="text" placeholder="Enter username" name="username" />
		<br>

		<label for="inputEmailAddress">Email</label><input id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
		<br>

		<label for="inputPassword">Password</label><input id="inputPassword" type="password" placeholder="Enter password" name="password" />
		<br>

		<label for="inputConfirmPassword">Confirm Password</label><input id="inputConfirmPassword" type="password" placeholder="Confirm password" name="cpassword" />
		<br>

		<?php

		if (isset($_GET['error'])) 
		{
			if ($_GET['error'] == "emptyfields") 
			{
				echo "<p class='text-danger'>Fill in all fields!</p>";
			}
			else if ($_GET['error'] == "invaliduidmail")
			{
				echo "<p class='text-danger'>Invalid Username and Email</p>";
			}
			else if ($_GET['error'] == "invaliduid")
			{
				echo "<p class='text-danger'>Invalid Username</p>";
			}
			else if ($_GET['error'] == "invalidmail")
			{
				echo "<p class='text-danger'>Invalid Email</p>";
			}
			else if ($_GET['error'] == "passwordcheck")
			{
				echo "<p class='text-danger'>Your passwords do not match!</p>";
			}
			else if ($_GET['error'] == "usertaken")
			{
				echo "<p class='text-danger'>Username is already taken!</p>";
			}
			else if ($_GET['error'] == "weakpassword") {
				echo "<p class='text-danger'>
				Password should be at least 8 characters in length and should include at least one upper case letter, one number.</p>";
			}
		}

		?>

		<button type="submit" name="signup">Create Account</button>

	</form>

</body>
</html>