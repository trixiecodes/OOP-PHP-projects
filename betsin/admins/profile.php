<?php
require_once "dbh.inc.php";
require_once "redirect2.php";

$userid = $_SESSION['userId'];
$query = "SELECT * FROM admins WHERE AdminID = '$userid'";
$ses_sql = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($ses_sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Betsinart - Parasites" />
	<meta name="author" content="Trixie Diane Bautista, Azel Ann Miranda, Betsinart - Parasites" />
	<title>Home</title>
</head>
<body>
	<form method="post">

		<h1> hey hey </h1>

	</form>
	
	<a href="list.php">List of Submissions</a>
	<a href="logout.php">Logout</a>

	
</body>
</html>