<?php

$conn = mysql_connect('localhost','root','');
	if(!$conn){
		die("Not able to Connect to Database!".mysql_error());
	}
	else{
			echo "Successful Connection to Database!";
	// Selects database
			$dbselect = mysql_select_db('nyscbandelection');
			if(!$dbselect){
				die('Not able to select to Database'.mysql_error());
			}
			else{
				echo "Database has been selected";
			}
			$menuQuery = "SELECT * FROM posts ORDER BY id";
			$menuQuery = mysql_query($menuQuery);

			if isset($_GET['menid']){
				$postName = $_GET['menid'];
				$resultQuery= "SELECT $postName FROM result";
				$resultQuery = mysql_query($resultQuery);
			}






?>

<!DOCTYPE html>
<html>
<head>
	<title>Result Page</title>
</head>
<body>

<h2 font color= "blue"> Select the Category to View Result</h2>
<div class = menu>
<ol class = "menuOl">
<?php while($menuList = mysql_fetch_array($menuQuery)){
	$menuId = $menuList['positionCode'];


echo "<li class= menuLi>";
echo "	<a href='result.php?menid=$menuId'>".$menuList['position']. "</a>";
echo	"</li>";
}
?>
</ol>
</div>
<div>
	<table>
	<tr><td colspan = "2">PRESIDENT</td></tr>
	<tr><td>NAME</td> <td>NUMBER OF VOTES</td></tr>
	<tr></tr>
		
	</table>
</div>
</body>
</html>