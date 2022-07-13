<?php
require_once "pdo.php";
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
  <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

  <!-- Navigation -->
  <?php require_once "navbar.php"; ?>
  <div style="margin-bottom: 50px;"></div>
  <!-- Page Content -->
  <div class="container">

    <?php 
    $stmt = $pdo->query("SELECT * FROM products");
    echo '<div class="row">';
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 
    {
      echo '<div class="col-lg-4 col-sm-6 portfolio-item">';
        echo '<div class="card h-100">';
          echo '<a href="#">';
          echo "<img class='card-img-top' src='admin/".$row['image']."' alt='Product Image'>"."</a>";
          echo '<div class="card-body">';
            echo '<h4 class="card-title">';
              echo '<a href="#">'.$row['productname']."</a>";
           echo '</h4>';
            echo '<p class="card-text">'.$row['description']."</p>";
          echo "</div>";
        echo "</div>";
      echo "</div>";
    }
    echo "</div>";
    ?>
</div>
  <!-- /.container -->

  <!-- Footer -->
 <?php require_once "footer.php"; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
