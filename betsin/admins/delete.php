<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['delete']) && isset($_POST['PoemID']) ) {
    $sql = "DELETE FROM poems WHERE PoemID = :PoemID AND username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':PoemID' => $_GET['PoemID'],
                          ':username' => $_GET['username']));
    $_SESSION['success'] = 'Submission deleted';
    header( 'Location: list.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['PoemID']) ) {
  $_SESSION['error'] = "Error Occured. Please try again.";
  header('Location: list.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM poems where username = :username and PoemID = :PoemID");
$stmt->execute(array(":username" => $_GET['username'],
                    ":PoemID" => $_GET['PoemID']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for user_id';
    header( 'Location: list.php' ) ;
    return;
}

?>
<p>Confirm: Deleting <?= htmlentities($row['poem']) ?></p>

<form method="post">
<input type="hidden" name="PoemID" value="<?= $row['PoemID'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="index.php">Cancel</a>
</form>
