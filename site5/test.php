<?php include("includes/header.php"); ?>
<div id="welcome">

   <p><a href="testexec1.php">Reboot</a>

  <p><a href="logout.php">Exit</a>
<style type="text/css">
.hide {
  display: none;
}
</style>
<script type="text/javascript">
function showhide(n)
{
  if (document.getElementById('otd'+n).style.display=='inline')
    document.getElementById('otd'+n).style.display='none';
  else
    document.getElementById('otd'+n).style.display='inline';
  return false;
}
</script>
 
<div><a href="#" onclick="return showhide(1);"</a>slot 0</div>
<div id="otd1" class="hide">
<div><p><a href="#" onclick="return showhide(2);"</a>        slot 0.1</p></div>
<div id="otd2" class="hide">
  <p><a href="logout.php">Exit</a></p>
  <p><a href="login.php">Login</a></p>  
</div>
<div><a href="#" onclick="return showhide(3);"</a>slot 0.2</div>
<div id="otd3" class="hide">
  <p><a href="logout.php">Exit</a></p>
  <p><a href="login.php">Login</a></p>  
</div>
</div>
 
<div><a href="#" onclick="return showhide(4);"</a>slot 1</div>
<div id="otd4" class="hide">
 <div><a href="#" onclick="return showhide(5);"</a>slot 1.1</div>
 <div id="otd5" class="hide">
  <p><a href="logout.php">Exit</a></p>
  <p><a href="login.php">Login</a></p> 	
</div>


</div>

