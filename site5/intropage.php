<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">

   <p><a href="testexec1.php">Reboot</a></p>

  <p><a href="logout.php">Exit</a>
</div>

<?php endif; ?>
