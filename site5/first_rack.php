<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<p><label">First Rack<br>


   <p><a href="testexec1.php">Reboot</a></p>


   <p><a href="list.php">Back</a></p>
  <p><a href="logout.php">Exit</a></p>
</div>


<?php endif; ?>
