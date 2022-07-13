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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
  #card1
  {
    box-shadow:
    0 2.8px 2.2px rgba(0, 0, 0, 0.034),
    0 6.7px 5.3px rgba(0, 0, 0, 0.048),
    0 12.5px 10px rgba(0, 0, 0, 0.06),
    0 22.3px 17.9px rgba(0, 0, 0, 0.072),
    0 41.8px 33.4px rgba(0, 0, 0, 0.086),
    0 100px 80px rgba(0, 0, 0, 0.12)
  }
</style>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

  <!-- Navigation -->
<?php require_once "navbar.php"; ?>

  <header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3">
        </div>
        <div class="col-lg-8 col-sm-6" style="margin-top: 70px;">
          <center><img src="icon/afctop.png" style="width: 250px;">
            <div>
              <span><p style="font-size: 26px;">Need a Reliable Partner in Construction Projects?</p><p style="font-size: 15px; margin-top: -12px;">AFC Enterprise is here for you!</p></span>
            </div><br><br><br><br>
            <a href="#section2"><button type="button" class="btn btn-outline-danger" style="width: 70px; height: 40px;"><i class="arrow down"></i></button></a>
          </center>
        </div>
      </div>
    </div>
  </header>
  <div class="container-fluid" style="margin-left: -15px;">
    <figure id="figure1" style="margin-top: -280px; position: absolute; z-index: -1;">
      <img src="icon/header.svg" style="width: 100%;">
    </figure>
  </div>
  <div id="section2" style="margin-bottom: 150px;"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-6 mb-4">
        <div id="card1" class="card" style="max-width: 500px;">
          <a href="#"><img class="card-img-top" src="icon/icon1.jpg" alt=""></a>
          <div class="card-body">
            <p class="card-text">We have maintained our reputation as being a competent hauler.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div id="card1" class="card" style="max-width: 500px;">
          <a href="#"><img class="card-img-top" src="icon/icon2.jpg" alt=""></a>
          <div class="card-body">
            <p class="card-text">We have agreement with other companies and individual quarry owners.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div id="card1" class="card" style="max-width: 500px;">
          <a href="#"><img class="card-img-top" src="icon/icon3.jpg" alt=""></a>
          <div class="card-body">
            <p class="card-text">We included our services by supplying, delivering, and hauling of all kinds of aggregates, cement, coal, iron ore and bulk cargos way back year 2010 as sub-contractor.</p>
          </div>
        </div>
      </div>
    </div>

    <?php 
    $stmt = $pdo->query("SELECT * FROM projects LIMIT 3");
    echo '<div class="container"  style="margin-top:150px;">';
    echo "<h2>Our Projects</h2><br>";
    echo '<div class="row">';
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) 
    {
      echo '<div class="col-lg-4 mb-4">';
      echo '<div class="card h-100">';
      echo '<a href="#">';
      echo '<img class="card-img-top" src="admin/'.$row['image'].'" alt=""></a>';
      echo '<h4 class="card-header">'; echo $row['projectname']."</h4>";
      echo '<div class="card-body">';
      echo '<p class="card-text">'; echo $row['description']."</p>";
      echo "</div>";
      echo '<div class="card-footer">';
      echo '<span style="color:gray;">Project Duration: '.$row['timeframe'].'</span>
      </div>
      </div>
      </div>';
    }
    ?>
  </div>
</div>

<!-- /.row -->
<?php
require_once "footer.php";
?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
