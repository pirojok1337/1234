<?php
$connection = ssh2_connect('10.2.10.6', 22);
ssh2_auth_password($connection, 'root', 'qweqwe');

$stream = ssh2_exec($connection, '/home/pi/scripts/reboot_rig_1.sh');
?>


