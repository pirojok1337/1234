<?php

$output = shell_exec ('sudo sh /var/www/example.com/html/id_1.sh'); 
if ( 1 == 1 ) {
$message = "Account Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
        } else {
        $message = "That username already exists! Please try another one!";
   }
        } else {
        $message = "All fields are required!";
        }
        }
<?php if (!empty($message)) {echo   "MESSAGE: ". $message . "</p>";} ?>

?>
