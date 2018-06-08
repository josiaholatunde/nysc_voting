<?php

	if (isset($_POST['submit'])) {
		$num = $_POST['numbe'];
		header("location:test.php?send=$num");
	}
?>

<html>
	<head>
		<title>Testing</title>
	</head>
	<body>
		<form action = "test1.php" method= "post">
		<input type = "text" value= "" name= "numbe"/>
		<input type = "submit" value= "CHECK" name= "submit"/>
		</form>	
	</body>
</html>