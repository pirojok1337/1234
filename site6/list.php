<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>

<?php include("includes/header.php"); ?>
<div id="welcome">

   <p><a href="loc_1.php">First Location</a></p>
   <p><a href="loc_2.php">Second Location</a></p>


  <p><a href="logout.php">Exit</a></p>
</div>


<?php endif; ?>

