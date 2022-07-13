<?php
require_once "pdo.php";


$_SESSION['username'] = $_GET['username'];
$username = $_SESSION['username'];
/*$query = "SELECT * FROM users WHERE username = '$username'";
$ses_sql = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($ses_sql);*/
$stmt = $pdo->query("SELECT * FROM users WHERE username = '$username'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['username'])) {
  $_SESSION['error'] = "Error Occured. Please try again.";
  header('Location: profile.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM users where username = :username");
$stmt->execute(array(":username" => $_GET['username']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'No user found';
    header( 'Location: profile.php' ) ;
    return;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Betsinart - Parasites" />
    <meta name="author" content="Trixie Diane Bautista, Azel Ann Miranda, Betsinart - Parasites" />
    <title>Edit Profile</title>
</head>
<body>
    <?php

    if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

    ?>
    <form method="post">
     <?php
     echo "<label>Full Name</label>";
     echo "<input type='text' class='form-control' value='".$row['firstname']." ".$row['lastname']."' readonly><br>";
     echo "<label>Username</label>";
     echo "<input type='text' name='username' class='form-control' value='".$row['username']."' readonly><br>";
     echo "<label>Email address</label>";
     echo "<input type='email' name='email' class='form-control' value='".$row['email']."'>";
     ?>
     <br>
     <button type="submit" name="savechanges">Save Changes</button>
 </form>
 <?php
 if (isset($_POST['savechanges'])) 
 {
    $sql = "UPDATE users SET email = :email
            WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':email' => $_POST['email'],
        ':username' => $_POST['username']));
    $_SESSION['success'] = 'Record updated';
    echo "<META HTTP-EQUIV=Refresh CONTENT='1'>";
    return;
}

?>
</body>
</html>