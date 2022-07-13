<?php
require_once "pdo.php";
session_start();

$userid = $_SESSION['userId'];
$query = "SELECT * FROM users WHERE UserID = '$userid'";
$stmt = $pdo->query("SELECT * FROM poems WHERE UserID = '$userid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ( isset($_POST['poem']) ) {

    // Data validation
    if ( strlen($_POST['poem']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?username=".$row['username']);
        return;
    }

    $sql = "UPDATE poems SET poem = :poem
            WHERE username = :username AND PoemID = :PoemID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':poem' => $_POST['poem'],
        ':username' => $row['username'],
        ':PoemID' => $_GET['PoemID']));

     $sql = "UPDATE poems SET title = :title
            WHERE username = :username AND PoemID = :PoemID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':title' => $_POST['title'],
        ':username' => $row['username'],
        ':PoemID' => $_GET['PoemID']));

    $_SESSION['success'] = 'Poem updated';
    header( 'Location: list.php?username='.$row['username'] ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['PoemID']) || ! isset($_GET['username'])) {
  $_SESSION['error'] = "Missing Poem and Username";
  header('Location: profile.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM poems where username = :username AND PoemID = :PoemID");
$stmt->execute(array(":username" => $_GET['username'],
                    ":PoemID" => $_GET['PoemID']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'No Poem Found';
    header( 'Location: profile.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
//VIEW PART
$e = htmlentities($row['poem']);
$title = htmlentities($row['title']);
?>
<p>Edit User</p>
<form method="post">
<p>Title:
    <input type="text" name="title" value="<?php echo $title; ?>">
<p>Poem:
<textarea name="poem"><?php echo $e; ?></textarea>
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>