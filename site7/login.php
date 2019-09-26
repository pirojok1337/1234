<!DOCTYPE html>
	<html lang="en">
<?php require_once("includes/connection.php"); ?>
<?php
	session_start();
	?>

	<?php require_once("includes/connection.php"); ?>
	<?php include("includes/header.php"); ?>
	<?php
	if(isset($_SESSION["session_username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location: intropage.php");
	}
	if(isset($_POST["login"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$passworddm=md5($password);
	$query=mysqli_query($con,"SELECT * FROM userlistdb.usertbl WHERE username='".$username."' AND password='".$passworddm."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['username'];
	$dbpassword=$row['password'];
 }
  if($username == $dbusername && $passworddm == $dbpassword)
 {
	// старое место расположения
	//  session_start();
	 $_SESSION['session_username']=$username;
 /* Перенаправление браузера */
   header("Location: list.php");
  }
	} else {
	//  $message = "Invalid username or password!";
	echo  "Invalid username or password!";
 }
	} else {
    $message = "All fields are required!";
	}
	}
	?>
<body>
<div class="container mlogin">
<div id="login">

<form action="" id="loginform" method="post"name="loginform">
<p><label for="user_login">Login<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Password<br>
 <input class="input" id="password" name="password"size="20"
  type="password" value=""></label></p> 
	<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></<p>

   </form>
 </div>
</div>
</body>
</html>
<meta name=viewport content="width=device-width, height=device-height, initial-scale=1">  

