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
<style type="text/css">
  .list-group-item:hover
  {
    background-color: red;
    opacity: 0.7;
    color:white;
    cursor: context-menu;
  }
</style>
</head>

<body>

  <!-- Navigation -->
  <?php require_once "navbar.php"; ?>

  <!-- Page Content -->
  <div class="container">
    <!-- Image Header -->
    <center><img class="img-fluid rounded mb-4" src="icon/afc.png" alt="AFC Enterprise Logo"></center>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-3 mb-4"></div>
      <div class="col-lg-6 mb-4">
<center><ul class="list-group">
<?php
$stmt = $pdo->query("SELECT * FROM services");
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo "<li class='list-group-item'>".$row['servicename']."</li>";
}
?>
</div>
</ul></center>
    <!-- /.row -->
  </div>
  <!-- /.container -->

 <div class="row" style="visibility:hidden;">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Card Title</h4>
          <div class="card-body">
            <p class="card-text"></p>
          </div>
        </div>
      </div>
    </div>
  <!-- Footer -->
 <?php require_once "footer.php"; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
