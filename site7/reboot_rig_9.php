<?php
session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>

<?php include("includes/header.php"); ?>
<?php
$connection = ssh2_connect('10.2.10.10', 22);
ssh2_auth_password($connection, 'root', 'qweqwe');

$stream = ssh2_exec($connection, '/home/pi/scripts/reboot_rig_9.sh');
header('Refresh: 1; url=loc_2.php');
?>


<div id="welcome">

   <p><label>Done</label><Br>
</div>
<?php endif; ?>
<meta name=viewport content="width=device-width, height=device-height, initial-scale=1">  

