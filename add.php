<html>

<head>
<title>Registration</title>
</head>

<body>
<?php
$db = new mysqli('localhost','root','',"Gym");
if($db->connect_error)
	die("Connection failed: ".$db->connect_error);
$username=rand(0,999999);
$pass = $_POST["p"];
$name = $_POST["f"];
$email = $_POST["em"];
$age = $_POST["a"];
$lex = $_POST["lex"];
$weight = $_POST["wt"];
$height = $_POST["ht"];
$Gender = $_POST["Gender"];
$CCID = $_POST["CID"];
$CType = $_POST["CType"];
$Cdate = $_POST["Cdate"];
$q="INSERT INTO `customer`(`Customer_ID`, `Password`, `Customer_Name`, `Age`, `Gender`, `email`, `Level_of_Exercise`, `Weight`, `Height`, `Date_joined`)
 VALUES ($username,aes_encrypt(\"$pass\",'qmo'),\"$name\",$age,\"$Gender\",\"$email\",\"$lex\",$weight,$height, current_date())";

$q2="INSERT INTO `accounts`(`Account_Name`, `Cerdit_Number`, `Credit_Type`, `Expirydate`, `Customer_ID`)
 VALUES (\"$name\",$CCID,\"$CType\",\"$Cdate\",$username)";
if($db->query($q) == true && $db->query($q2) == true)
	echo "Registration Successful.";
else
	die(mysqli_error($db));

$db->close();
echo "<script>window.location=\"http://localhost/web/proj/homepage.php\"</script>"
?>
</body>

</html>
