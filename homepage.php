<!DOCTYPE html>
<html>
<head>
<title>Homepage - Quisque Gym</title>
<?php include "Headerstyle.php"; ?>
<script>
<?php include "headerjq.php"; ?>
</script>
<?php include "Topdiv.php"; ?>
<div>
<img width="100%" class="mySlides w3-animate-fading" src="adv2.png" onMouseOver=""/>
<img width="100%" class="mySlides w3-animate-fading" src="adv3.jpg" onMouseOver=""/>
<a style="position:absolute;top:60%;right:0" onClick="changeImg(1)" 
class="w3-btn-floating">&#10095;</a>
<a style="position:absolute;top:60%;left:0" onClick="changeImg(-1)" 
class="w3-btn-floating">&#10094;</a>
<script>
var index=0;
var timeout;
changeImg();
function changeImg(n=1)
{
index+=n;
clearTimeout(timeout);
var Ads = document.getElementsByTagName("img");
for(var i=0; i<Ads.length; i++)
Ads[i].style.display="None";
if(index >= Ads.length){index = 0;}
else if(index < 0){index = Ads.length-1;}
Ads[index].style.display="Block";
timeout=setTimeout(changeImg, 7000);
}
</script>
</div>
<br>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<h1 style="text-align:center">Why Us?</h1>
<ul>
<li>Top one gym in 2015.</li>
<li>Professional trainers.</li>
<li>We provide a variety of facilities that will make this your fitness year so far.</li>
<li>One of the best shops that sells gym accessories and clothes.</li>
</table>
</div>
</div>
</div>
</body>
</html>
