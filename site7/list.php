<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>

<?php include("includes/header.php"); ?>
<?php
$stream = shell_exec('uptime | grep -o up.* | grep -oP ".*(\d){1,2}\:(\d){2}" | sed -e "s/up/ /g"');
echo "Server uptime", $stream;
?>
<p>
<?php
$connection = ssh2_connect('10.2.10.6', 22);
ssh2_auth_password($connection, 'root', 'qweqwe');

$stream = ssh2_exec($connection, 'uptime | grep -o up.* | grep -oP ".*(\d){1,2}\:(\d){2}" | sed -e "s/up/ /g"');
stream_set_blocking($stream, true);
 $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO); echo "Белоус uptime",stream_get_contents($stream_out); 
stream_get_contents($stream); 

?>
</p>
<p>
<?php
$connection = ssh2_connect('10.2.10.10', 22);
ssh2_auth_password($connection, 'root', 'qweqwe');

$stream = ssh2_exec($connection, 'uptime | grep -o up.* | grep -oP ".*(\d){1,2}\:(\d){2}" | sed -e "s/up/ /g"');
stream_set_blocking($stream, true);
 $stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO); echo "Богунского uptime",stream_get_contents($stream_out); 
stream_get_contents($stream); 

?>
</p>

<div id="welcome">

<p>
	<?php
	$str = exec("cat /var/www/example.com/html/status_loc_1.txt");

	if ($str == 1 ){
	echo "<img src=status_online.png>";
	}else {
	echo "<img src=status_offline.png>";
	}
	?>
<a href="loc_1.php">Белоус</a>
</p>
  
<p>
<?php
	$str = shell_exec("cat /var/www/example.com/html/status_loc_2.txt");

	if ($str == 1 ){
	echo "<img src=status_online.png>";
	}else {
	echo "<img src=status_offline.png>";
	}
?>
<a href="loc_2.php">Богунского</a>
</p>


  <p><a href="logout.php">Exit</a></p>
</div>


<?php endif; ?>

<meta name=viewport content="width=device-width, height=device-height, initial-scale=1">  

