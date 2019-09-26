
<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
<?php include("includes/header.php"); ?>
<div id="welcome">
<p><label">Богунского<br>

<ul>
<a>Rig 2T</a>

<li><a href="boot_rig_2T.php">Boot</a></li>
<li><a href="reboot_rig_2T.php">Reboot</a></li>
</ul>
<ul>
<a>Rig 10</a>
<li><a href="boot_rig_10.php">Boot</a></li>
<li><a href="reboot_rig_10.php">Reboot</a></li>
</ul>
<ul> 
  <a>Rig 8</a>
<li><a href="boot_rig_8.php">Boot</a></li>
<li><a href="reboot_rig_8.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 23</a>
<li><a href="boot_rig_23.php">Boot</a></li>
<li><a href="reboot_rig_23.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 1T</a>
<li><a href="boot_rig_1T.php">Boot</a></li>
<li><a href="reboot_rig_1T.php">Reboot</a></li>
</ul>
  <ul>
<a>Rig 30</a>
<li><a href="boot_rig_30.php">Boot</a></li>
<li><a href="reboot_rig_30.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 27</a>
<li><a href="boot_rig_27.php">Boot</a></li>
<li><a href="reboot_rig_27.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 33</a>
<li><a href="boot_rig_33.php">Boot</a></li>
<li><a href="reboot_rig_33.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 9</a>
<li><a href="boot_rig_9.php">Boot</a></li>
<li><a href="reboot_rig_9.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 7</a>
<li><a href="boot_rig_7.php">Boot</a></li>
<li><a href="reboot_rig_7.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 6</a>
<li><a href="boot_rig_6.php">Boot</a></li>
<li><a href="reboot_rig_6.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 24</a>
<li><a href="boot_rig_24.php">Boot</a></li>
<li><a href="reboot_rig_24.php">Reboot</a></li>
</ul>
<ul>
   <a>Rig 20</a>
<li><a href="boot_rig_20.php">Boot</a></li>
<li><a href="reboot_rig_20.php">Reboot</a></li>
</ul>
<ul>




   <p><a href="reboot_all_rig2.php">Boot all rigs</a></p>
   <p><a href="list.php">Back</a></p>
  <p><a href="logout.php">Exit</a></p>
</div>


<?php endif; ?>
<meta name=viewport content="width=device-width, height=device-height, initial-scale=1">  

