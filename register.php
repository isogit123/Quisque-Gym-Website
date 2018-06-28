<html>

<head>
<title>Register - Quisque Gym</title>
<?php include "Headerstyle.php"; ?>
<script type="text/javascript" src="validation.js"></script>
<script>
<?php include "headerjq.php"; ?>
</script>
</head>

<body>
<?php include "Topdiv.php"; ?>
<h1 style="color:red;">Please enter the following details:</h1>
<Form action="add.php" method="post">
<pre>
Name:    		<input type="Text" name = "f" id="fn" value= "">

Email:          	<input type="email" name="em" id="email" value="">

Password:       	<input type="password" name="p" id="pass" value="">

Re-enter Password: 	<input type="password" id="pass2" value="">

Age:            	<input type="Text" name="a" id="age" value="">

Level of Exercise:    	<input type="Text" name="lex" id="exc" value="">

Height:            	<input type="Text" name="ht" id="h" value="">

Weight:            	<input type="Text" name="wt" id="w" value="">

Credit Card ID: 	<input type="Text" name="CID" id="ccid" value="">

Credit Card Type: 	<input type="Text" name="CType" id="ct" value="">

Credit Card Expiry Date:
		<input type="date" name="Cdate" value="" id="date">
<br>
Gender:
<input type="radio" checked=true Name="Gender" value="Male">Male <input type="radio" Name="Gender" value="Female">Female

<br>
<input type="submit" class="btn btn-default" value="Submit" onclick="return val();"> <input type="reset" class="btn btn-default" value="Clear">
</pre>
</Form>
</body>
</html>
