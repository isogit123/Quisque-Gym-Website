<html>
<head>
<title>Shop - Quisque Gym</title>
<?php include "Headerstyle.php"; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
<?php include "headerjq.php"; ?>
var r1=0,r2=50000;
$(document).ready(function(){
$("#slider-range").slider({range:true,min:0,max:50000,
values: [ 0, 50000 ],
slide: function(event,ui)
{r1 = ui.values[0];
r2 = ui.values[1];
$("#range").val("$" + ui.values[0] + "- $" + ui.values[1]);}}
);
$("#range").val("$" + r1 + "- $" + r2);
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
window.location="http://localhost/web/proj/shop.php?sq=\""+squ+"\"" + "&r1="+r1+"&r2="+r2+"&cat="+"\""+catSelected+"\"";
else
window.location="http://localhost/web/proj/shop.php?sq=\""+squ+"\"" + "&r1="+r1+"&r2="+r2;
}
else{
if(catSelected != "all")
window.location="http://localhost/web/proj/shop.php?"+ "r1="+r1+"&r2="+r2+"&cat="+"\""+catSelected+"\"";
else
window.location="http://localhost/web/proj/shop.php?"+ "r1="+r1+"&r2="+r2;
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
$q="select DISTINCT category from Goods";
$result = $db->query($q);
if($result->num_rows > 0)
{
while($row=$result->fetch_assoc())
{
$cat = $row["category"];
echo "<option value=\"$cat\">$cat</option><br>";
}
}
$db->close();
?>
</select>
<br><br>
Price range: <input style="border:0" type="text" id="range" readonly></input>
<div style="z-index:0;" id="slider-range"></div>
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
$r1=0;
$r2=50000;
$cat = "all";
if(isset($_GET["cat"]))
$cat = $_GET["cat"];

if(isset($_GET["r1"]))
$r1 = $_GET["r1"];
if(isset($_GET["r2"]))
$r2 = $_GET["r2"];
if(isset($_GET["sq"])){
$sq = $_GET["sq"];
if($cat=="all")
$q="select * from Goods where MATCH(GoodName) AGAINST($sq) and (PricePerItem >= $r1 and PricePerItem <= $r2)";
else
$q="select * from Goods where MATCH(GoodName) AGAINST($sq) and category=$cat and (PricePerItem >= $r1 and PricePerItem <= $r2)";
}
else{
if($cat=="all")
$q="select * from Goods where PricePerItem >= $r1 and PricePerItem <= $r2";
else
$q="select * from Goods where category=$cat and PricePerItem >= $r1 and PricePerItem <= $r2";
}
$result=$db->query($q);
if($result->num_rows > 0){
while($row=$result->fetch_assoc()){
$name = $row["GoodName"];
$img_link = $row["img"];
$category = $row["category"];
$PricePerItem = "$" . $row["PricePerItem"];
$amount = $row["amount"];
echo "<tr>
<td>
<pre>
<img src=$img_link style=\"width: 100%; height: 30%\" alt=\"Image not available\"></img>
<br>
Item Name: $name
Category: $category
Amount Available: $amount
Price Per Item: $PricePerItem
</pre>
</td>
</tr>";
}
}
else
echo "<tr>
<td>
<h1>No items found</h1>
</td>
</tr>";
$db->close();
?>
</table>
</div>

</body>
</html>
