<?php
session_start();
	if(isset($_SESSION['userId']))
	{
		header("Location: profile.php");
	}
	else
	{
		unset($_SESSION['userId']);
	}
	?>