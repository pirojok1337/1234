<?php
	session_start();
	unset($_SESSION['session_username']);
	session_destroy();
	header("location:login.php");
	?>
<meta name=viewport content="width=device-width, height=device-height, initial-scale=1">  

