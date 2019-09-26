
<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
<?php include("includes/header.php"); ?>
<div id="welcome">
<p><label">Белоус<br>

<ul>
<a>Rig 1</a>

<li><a href="boot_rig_1.php">Boot</a></li>
<li><a href="reboot_rig_1.php">Reboot</a></li>
</ul>
<ul>
<a>Rig 2</a>
<li><a href="boot_rig_2.php">Boot</a></li>
<li><a href="reboot_rig_2.php">Reboot</a></li>
</ul>
<ul> 
  <a>Rig 3</a>
<li><a href="boot_rig_3.php">Boot</a></li>
<li><a href="reboot_rig_3.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 4</a>
<li><a href="boot_rig_4.php">Boot</a></li>
<li><a href="reboot_rig_4.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 5</a>
<li><a href="boot_rig_5.php">Boot</a></li>
<li><a href="reboot_rig_5.php">Reboot</a></li>
</ul>
  <ul>
<a>Rig 16</a>
<li><a href="boot_rig_16.php">Boot</a></li>
<li><a href="reboot_rig_16.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 17</a>
<li><a href="boot_rig_17.php">Boot</a></li>
<li><a href="reboot_rig_17.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 28</a>
<li><a href="boot_rig_28.php">Boot</a></li>
<li><a href="reboot_rig_28.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 29</a>
<li><a href="boot_rig_29.php">Boot</a></li>
<li><a href="reboot_rig_29.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 31</a>
<li><a href="boot_rig_31.php">Boot</a></li>
<li><a href="reboot_rig_31.php">Reboot</a></li>
</ul>


   <p><a href="reboot_all_rigs.php">Boot all rigs</a></p>
   <p><a href="list.php">Back</a></p>
  <p><a href="logout.php">Exit</a></p>
</div>


<?php endif; ?>
<meta name=viewport content="width=device-width, height=device-height, initial-scale=1">  

