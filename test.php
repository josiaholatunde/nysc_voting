
<?php

	$num1 = "";

	if (isset($_GET['send'])) {
		$num1 = $_GET['send'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
	<form action= "test.php" method = "post">
		<input hidden type= "text" name= "data" value= <?php echo $num1 ?> >
		<input type='text' name='number' value=''/> Number
		<input type="submit" name="submit" value="CHECK"/>
	</form>

<?php
	if (isset($_POST['submit'])){
		if(isset($_POST['number'])){
			$number = $_POST['number'];
			echo $_POST['data'];
		}

		//echo $number;
		// while($number<4){
		// 	$number++;
		// }
		
		
	}
?>
</body>
</html>