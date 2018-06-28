<div id="TopDiv" class="def">
<div>
<canvas id="LogoCanvas" style="position:relative; left:6px; top:20px; width:105px; height: 66px;"/>

<script>
var logo = new Image();
logo.src="logo.png";
var canv = document.getElementById("LogoCanvas");
var context = canv.getContext("2d");
logo.onload=function(){context.drawImage(logo,0,0,logo.width+4,logo.height+4,0,0,canv.width+4,canv.height+4);}
</script>

</div>

<a style="position:relative; left:200px;top:-38px;"href="homepage.php">Home</a>
<a style="position:relative; left:206px;top:-38px;"href="shop.php">Shop</a>
<a style="position:relative; left:210px;top:-38px;"href="trainings.php">Trainings</a>
<?php
if(isset($_GET["st"]) && $_GET["st"]==1)
{
$message = "Wrong username or password";
echo "<script type='text/javascript'>alert('$message');</script>";
}
$db = new mysqli('localhost','root','',"Gym");
if($db->connect_error)
	die("Connection failed: ".$db->connect_error);
if(isset($_COOKIE["userkey"])){
$key = $_COOKIE["userkey"];
$q="select Customer_Name from customer where email=\"$key\"";
$result=$db->query($q);
$Username=$result->fetch_assoc()["Customer_Name"];//Store username from database here.
echo "<form style=\"position:absolute; right:0; top:0;\">
Welcome: $Username
<button onClick=\"signout();\">Signout</button></form>";
$db->close();
}
else{
echo "<form method=\"post\" action=\"login.php\"style=\"position:absolute; right:0; top:0;\">
<pre>
Username: <input type=\"text\" name=\"us\"></input>
Password: <input type=\"password\" name=\"pass\"></input>
	  <input type=\"submit\" value=\"Login\"></input><button type=\"button\" onClick=\"window.location='http://localhost/web/proj/register.php'; return false;\">Register</button>
</pre>
</form>";

}

?>
</div>
