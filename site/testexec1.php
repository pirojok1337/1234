<?php
$output = shell_exec ('sudo sh /var/www/example.com/html/id_17.sh'); 
//= shell_exec('sh /var/www/example.com/html/id_17.sh');
//echo "<pre>$output</pre>";
header('Location: http://192.168.1.222/testscript/index.html?success=true');

?>
