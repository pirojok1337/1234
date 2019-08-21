<?php
$output = shell_exec ('sudo sh /var/www/example.com/html/id_1.sh'); 
//= shell_exec('sh /var/www/example.com/html/id_17.sh');
header('Location: http://192.168.1.222/testscript/index.html?success=true');
//echo "<pre>$output</pre>";
?>
