<?php
require_once "pdo.php";
session_start();

?>
<html>
<head></head><body>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

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
    echo("</th><th>");
    echo "Actions";
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
    echo("</td><td>");
    echo('<a href="edit.php?username='.$row['username'].'&PoemID='.$row['PoemID'].'">Edit Submission</a> / ');
    echo('<a href="delete.php?username='.$row['username'].'&PoemID='.$row['PoemID'].'">Delete Submission</a>');
    
    echo("</td></tr>\n");
}
?>



</table>
<a href="profile.php">Back</a>
</body>
</html>