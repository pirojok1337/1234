<?php
session_start();

$output = shell_exec ('sudo sh /var/www/example.com/html/id_17.sh'); 
//header('Location: http://127.0.0.1/intropage.php?success=true');

echo "<pre>Done</pre>"; 
      unset($_SESSION['session_username']);
      session_destroy();




?>

