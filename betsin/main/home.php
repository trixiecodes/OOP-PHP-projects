<?php
require_once "pdo.php";
/*require_once "users/redirect2.php";*/


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

	<h1> hej do </h1>

	<input type="text" name="search" placeholder="Search here...">
	<button type="submit" name="submit">Search</button>

	<?php
	
	if (isset($_POST['submit'])) {
		$search = $_POST['search'];
		echo('<table border="1">'."\n");
		echo "<tr><th>";
		echo "Title";
		echo("</th><th>");
		echo "Poem";
		echo("</th><th>");
		echo "Picture";
		echo("</th><th>");
		echo "Date Posted";
		echo "</th></tr><br><br>";
		$stmt = $pdo->query("SELECT * FROM poems WHERE title LIKE '%$search%' OR username LIKE '%search%'");
		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
			echo "<tr><td>";
			echo(htmlentities($row['title']));
			echo("</td><td>");
			echo(htmlentities($row['poem']));
			echo("</td><td>");
			echo "<img src='".$row['picture']."' style='width:200px; height:200px;'>";
			echo("</td><td>");
			echo(htmlentities($row['dateOfSubmission']));
			echo("</td></tr>\n");
		}
	}
	else
	{
		echo('<table border="1">'."\n");
		$stmt = $pdo->query("SELECT * FROM poems");
		echo "<tr><th>";
		echo "Title";
		echo("</th><th>");
		echo "Poem";
		echo("</th><th>");
		echo "Picture";
		echo("</th><th>");
		echo "Date Posted";
		echo "</th></tr><br><br>";
		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
			echo "<tr><td>";
			echo(htmlentities($row['title']));
			echo("</td><td>");
			echo(htmlentities($row['poem']));
			echo("</td><td>");
			echo "<img src='".$row['picture']."' style='width:200px; height:200px;'>";
			echo("</td><td>");
			echo(htmlentities($row['dateOfSubmission']));
			echo("</td></tr>\n");
		}
	}
	echo "</table>";
	
	

	?>

</form>

</body>
</html>