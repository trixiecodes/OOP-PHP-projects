<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['email']) && isset($_POST['message'])) 
{

    // Data validation
	if ( strlen($_POST['email']) < 1 || strlen($_POST['message']) < 1 || strlen($_POST['phone']) < 1 || strlen($_POST['email']) < 1) {
		$_SESSION['error'] = 'Fill out all columns';
		header("Location: contact.php");
		return;
	}

	$sql = "INSERT INTO message (name,phone,email,message)
	VALUES (:name,:phone,:email,:message)";
	$stmt = $pdo->prepare($sql);

          // Execute query
	$stmt->execute(array(
		':name' => $_POST['name'],
		':phone' => $_POST['phone'],
		':email' => $_POST['email'],
		':message' => $_POST['message']));
	$_SESSION['success'] = 'Message Sent Successfully!';
	header( 'Location: contact.php?message=sent' ) ;
	return;

}
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
	<div style="margin-top: 50px;"></div>
	<!-- Page Content -->
	<div class="container">

		<!-- Content Row -->
		<div class="row">
			<!-- Map Column -->
			<div class="col-lg-8 mb-4">
				<!-- Embedded Google Map -->
				<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://goo.gl/maps/9ZBcNnn9GDSofJHN9"></iframe>
			</div>
			<!-- Contact Details Column -->
			<div class="col-lg-4 mb-4">
				<h3>Contact Details</h3>
				<p>
					Rizal Street, Malapit, San Isidro
					<br> Nueva Ecija, 3106
					<br>
				</p>
				<p>
					<abbr title="Phone">P</abbr>: (044) 333 - 4808
				</p>
				<p>
					<abbr title="Email">E</abbr>:
					<a href="afcenterprisesinc@yahoo.com">afcenterprisesinc@yahoo.com
					</a>
				</p>
				<p>
					<abbr title="Hours">H</abbr>: Monday - Friday: 8:00 AM to 5:00 PM
				</p>
			</div>
		</div>
		<!-- /.row -->

		<!-- Contact Form -->
		<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
		<div class="row">
			<div class="col-lg-8 mb-4">
				<h3>Send us a Message</h3><?php 
				if ( isset($_SESSION['error']) ) {
					echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
					unset($_SESSION['error']);};
					if ( isset($_SESSION['success']) ) {
						echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
						unset($_SESSION['success']);};

						?>
						<form name="sentMessage" method="POST">
							<div class="control-group form-group">
								<div class="controls">
									<label>Full Name:</label>
									<input type="text" class="form-control" name="name" id="name">
									<p class="help-block"></p>
								</div>
							</div>
							<div class="control-group form-group">
								<div class="controls">
									<label>Phone Number:</label>
									<input type="tel" class="form-control" name="phone" id="phone">
								</div>
							</div>
							<div class="control-group form-group">
								<div class="controls">
									<label>Email Address:</label>
									<input type="email" class="form-control" name="email" id="email">
								</div>
							</div>
							<div class="control-group form-group">
								<div class="controls">
									<label>Message:</label>
									<textarea rows="10" cols="100" class="form-control" name="message" id="message" maxlength="999" style="resize:none"></textarea>
								</div>
							</div>
							<div id="success"></div>
							<!-- For success/fail messages -->
							<button type="submit" name="send" class="btn btn-primary" id="sendMessageButton">Send Message</button>
						</form>
					</div>

				</div>
				<!-- /.row -->

			</div>
			<!-- /.container -->

			<!-- Footer -->
			<footer class="py-5 bg-dark">
				<div class="container">
					<p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
				</div>
				<!-- /.container -->
			</footer>

			<!-- Bootstrap core JavaScript -->
			<script src="vendor/jquery/jquery.min.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

			<!-- Contact form JavaScript -->
			<!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
			<script src="js/jqBootstrapValidation.js"></script>
			<script src="js/contact_me.js"></script>

		</body>

		</html>
