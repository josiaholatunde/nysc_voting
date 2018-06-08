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
				echo "Database has been selected";
			}


// $countingQuery = "SELECT COUNT(*) AS total FROM result WHERE stateCode = 'ek/17a/0000' ";
// 			$countingQuery = mysql_query($countingQuery);
// 			$countingQuery = mysql_fetch_assoc($countingQuery);
// 			echo "Number is ". $countingQuery['total'];
		



		

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


		
			// $countQuery = "SELECT $postName FROM result";
			// $countQuery = mysql_query($countQuery);
			// while($query = mysql_fetch_array($countQuery)
		
	</table>
</div>
</body>
</html>