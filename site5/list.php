<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>

<?php include("includes/header.php"); ?>
<div id="welcome">

   <p><a href="first_rack.php">First Rack</a></p>
   <p><a href="second_rack.php">Second Rack</a></p>


  <p><a href="logout.php">Exit</a></p>
</div>


<?php endif; ?>

