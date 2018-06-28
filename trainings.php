<html>
<head>
<title>Trainings - Quisque Gym</title>
<?php include "Headerstyle.php"; ?>
<script>
<?php include "headerjq.php"; ?>
$(document).ready(function(){

$("td").hover(function(){$(this).css('background-color', 'grey');}, 
function(){$(this).css('background-color', 'white');});

});
function clr(box)
{
if(box.value=="Search")
box.value="";
}

function writeSearch(box)
{
if(box.value=="")
box.value="Search";
}

function Filter()
{
var squ = document.getElementById("sq").value;
var catSelected = document.getElementById("clist").value;
if(squ != "Search"){
if(catSelected != "all")
window.location="http://localhost/web/proj/trainings.php?sq=\""+squ+"\"" + "&cat="+"\""+catSelected+"\"";
else
window.location="http://localhost/web/proj/trainings.php?sq=\""+squ+"\"";
}
else{
if(catSelected != "all")
window.location="http://localhost/web/proj/trainings.php?"+"cat="+"\""+catSelected+"\"";
else
window.location="http://localhost/web/proj/trainings.php?";
}
}
</script>
</head>
<body>
<?php include "Topdiv.php"; ?>
<br>
<div class="container"> <!--contains items to purchase-->
<div class="panel-group">
<div class="panel panel-default" style="width:50%">
<div class="panel-heading">Filters:</div>
<div class="panel-body">
<input id="sq" class="form-control" type="text" value="Search" onFocus="clr(this);" onBlur="writeSearch(this);"/>
<br>
Category: <select id = "clist">
<option value="all">All</option>
<?php
$db = new mysqli('localhost','root','',"Gym");
if($db->connect_error)
	die("Connection failed: ".$db->connect_error);
$q="SELECT DISTINCT e.specialization from employee e inner join trainer t on t.EID=e.EID";
$result = $db->query($q);
if($result->num_rows > 0)
{
while($row=$result->fetch_assoc())
{
$cat = $row["specialization"];
echo "<option value=\"$cat\">$cat</option><br>";
}
}
$db->close();
?>
</select>
<br>
<br>
<button value = "Filter" onClick="Filter();">Filter</button>
</div>
</div>
</div>
<table id="tb" class="table" style="width:30%;">
<?php
$db = new mysqli('localhost','root','',"Gym");
if($db->connect_error)
	die("Connection failed: ".$db->connect_error);
$q;
$sq;
$cat = "all";
if(isset($_GET["cat"]))
$cat = $_GET["cat"];
if(isset($_GET["sq"])){
$sq = $_GET["sq"];
if($cat=="all")
$q="SELECT e.EName, e.specialization, e.Photo from employee e inner join trainer t on t.EID=e.EID where e.Ename=$sq";
else
$q="SELECT e.EName, e.specialization, e.Photo from employee e inner join trainer t on t.EID=e.EID where e.Ename=$sq and e.specialization=$cat";
}
else{
if($cat=="all")
$q="SELECT e.EName, e.specialization, e.Photo from employee e inner join trainer t on t.EID=e.EID";
else
$q="SELECT e.EName, e.specialization, e.Photo from employee e inner join trainer t on t.EID=e.EID where e.specialization=$cat";
}
$result=$db->query($q);

if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$name = $row["EName"];
$img_link = $row["Photo"];
$category = $row["specialization"];

echo "<tr>
<td>
<pre>
<img src=$img_link style=\"width: 100%; height: 30%\" alt=\"Image not available\"></img>
<br>
Name: $name
Specialization: $category
</pre>
</td>
</tr>";
}
}

$db->close();
?>
</table>
</div>

</body>
</html>
