<?php
require_once "pdo.php";
$stmt = $pdo->query("SELECT * FROM about LIMIT 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="AFC Enterprise ECommerce">
  <meta name="keywords" content="AFC Enterprise, ECommerce, Online Selling, Products, Gadgets">
  <meta name="author" content="AFC Enterprise, Trixie Diane Bautista, Azel-Ann Miranda">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="icon" href="icon/afclogo.png" type="image/x-icon">

  <title>AFC Enterprise</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

  <style type="text/css">
   .nav-link
   {
    color:black;
  }
  .nav-link:hover
  {
    color:red;
  }
</style>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

  <!-- Navigation -->
<?php require_once "navbar.php"; ?>

<!-- Page Content -->
<div class="container">

  <!-- Intro Content -->
  <div class="row">
    <div class="col-lg-6">
      <center><img class="img-fluid rounded mb-4" src="icon/afc.png" alt="AFC Enterprise Logo"></center>
    </div>
    <div class="col-lg-6">
      <h2>About AFC Enterprise</h2>
      <?php

      echo $row['description'];
      echo $row['history'];

      ?>
    </div>
  </div>
  <!-- /.row -->
  <br><br>
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Our Mission</h4>
        <div class="card-body">
          <p class="card-text"><?php echo $row['mission']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Our Goals</h4>
        <div class="card-body">
          <p class="card-text"><?php echo $row['goals']; ?></p>
        </div>
      </div>
    </div>
    <div class="col-lg-8 mb-4">
      <div class="card h-100">
        <h4 class="card-header">Our Values</h4>
        <div class="card-body">
          <p class="card-text"><?php echo $row['afcvalues']; ?></p>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->

<?php
require_once "footer.php";
?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
