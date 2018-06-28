<?php
$db = new mysqli('localhost','root','',"Gym");
if($db->connect_error)
	die("Connection failed: ".$db->connect_error);
$username=$_POST["us"];
$pass = $_POST["pass"];
$response_code=2;
$q="select aes_decrypt(Password, 'qmo') as pass from customer where email=\"$username\"";
$result=$db->query($q);
if($result->num_rows > 0){
$row=$result->fetch_assoc();
if($row["pass"]==$pass)
setcookie("userkey", $username, time()+3600);
else
$response_code=1;
}
$db->close();
echo "<script>window.location = 'http://localhost/web/proj/homepage.php?st=$response_code'</script>";
?>
