<?php
$names= "";
$shortName="";
$countingQuery= '';
$nameQuery='';
$conn = mysql_connect('localhost','root','');
	if(!$conn){
		die("Not able to Connect to Database!".mysql_error());
	}
	else{
		//	echo "Successful Connection to Database!";
		}
	// Selects database
			$dbselect = mysql_select_db('nyscbandelection');
			if(!$dbselect){
				die('Not able to select to Database'.mysql_error());
			}
			else{
		//		echo "Database has been selected";
			}


// $countingQuery = "SELECT COUNT(*) AS total FROM result WHERE stateCode = 'ek/17a/0000' ";
// 			$countingQuery = mysql_query($countingQuery);
// 			$countingQuery = mysql_fetch_assoc($countingQuery);
// 			echo "Number is ". $countingQuery['total'];
		



			$menuQuery = "SELECT * FROM posts ORDER BY id";
			$menuQuery = mysql_query($menuQuery);

			if (isset($_GET['menid'])){
				$postName = $_GET['menid'];
				$nameQuery= "SELECT * FROM aspirants WHERE cat_name = '$postName'";
				$nameQuery = mysql_query($nameQuery);
			}






?>

<!DOCTYPE html>
<html>
<head>
	<title>Result Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1 font color= "blue"> Select the Category to View Result</h1>
<div class = 'menu'>
<ol class = "menuOl">
<?php while($menuList = mysql_fetch_array($menuQuery)){
	$menuId = $menuList['positionCode'];
	$menusid = $menuList['position'];
	$enId = $menuId;


echo "<li class= 'menuLi'>";
echo "	<a href='result.php?menid=$menuId'>".$menuList['position']. "</a>";
echo	"</li>";

}
?>
</ol>
</div>
<div class = 'resultForm'>
	<table border = "2">
	<tr><td>NAME</td> <td>NUMBER OF VOTES</td></tr>
	<?php
		while ($namesQuery = mysql_fetch_array($nameQuery)){
			$names = $namesQuery['aspirantName'];
			$shortName = $namesQuery['aspShortName'];

			echo "<tr><td>".$names."</td>";
			// $countQuery = "SELECT $postName FROM result";
			// $countQuery = mysql_query($countQuery);
			// while($query = mysql_fetch_array($countQuery)) {

			$countingQuery = "SELECT COUNT(*) AS count FROM result WHERE $postName LIKE '%$shortName%' ";
			$countingQuery = mysql_query($countingQuery);
			$countingQuery = mysql_fetch_assoc($countingQuery);
		
		// }
		echo "<td>". $countingQuery['count']. "</td>";
	}
	?>
		
	</table>
</div>
</body>
</html>