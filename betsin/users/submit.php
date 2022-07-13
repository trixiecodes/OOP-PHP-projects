<?php
require_once "pdo.php";
session_start();

$_SESSION['username'] = $_GET['username'];
$username = $_SESSION['username'];
$stmt = $pdo->query("SELECT * FROM users WHERE username = '$username'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ( isset($_POST['username']) && isset($_POST['poem'])) {
	 // Count total files
  $countfiles = count($_FILES['files']['name']);

    // Data validation
    if ( strlen($_POST['username']) < 1 || strlen($_POST['poem']) < 1) {
        $_SESSION['error'] = 'Invalid Data';
        header("Location: profile.php");
        return;
    }

    $sql = "INSERT INTO poems (title, poem, username, UserID, picture)
              VALUES (:title, :poem, :username, :UserID, :picture)";
    $stmt = $pdo->prepare($sql);
    /**/
    // Loop all files
  for($i=0;$i<$countfiles;$i++){

  	// File name
    $filename = $_FILES['files']['name'][$i];
    // Location
    $target_file = '../photo/'.$filename;

    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($file_extension, $valid_extension)){

       // Upload file
       if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){

          // Execute query
    $stmt->execute(array(
        ':title' => $_POST['title'],
        ':poem' => $_POST['poem'],
        ':username' => $_POST['username'],
    	':UserID' => $row['UserID'],
    	':picture' => $target_file));
    $_SESSION['success'] = 'Poem Submitted';
    header( 'Location: profile.php' ) ;
    return;
       }
    }
 
  }
}

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
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="Betsinart - Parasites" />
	<meta name="author" content="Trixie Diane Bautista, Azel Ann Miranda, Betsinart - Parasites" />
	<title>Submit your Art</title>

	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
</head>
<body>

	<p>Submit your Art</p>
	<form method="post" enctype='multipart/form-data'>
    <p>Title:
<input type="text" name="title"></p>

		<p>Poem:
			<textarea id="summernote" name="poem"></textarea></p>
			<script>
				$(document).ready(function() {
					$('#summernote').summernote();
				});
			</script>

			<input type="text" name="username" value="<?php echo $row['username']; ?>" hidden></p>

			<p>Photo for the Product:
				<input type='file' name='files[]' multiple /></p>
				<p><input type="submit" value="Add Product"/>
					<a href="profile.php">Cancel</a></p>
				</form>

			</body>
			</html>