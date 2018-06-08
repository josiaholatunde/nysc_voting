<?php
	//Connect to the database
	$errmsg="";

$conn = mysql_connect('localhost','root','');
	if(!$conn){
		die("Not able to Connect to Database!".mysql_error());
	}
	else{
			echo "Successful Connection to Database!";
		}
	// Selects database
			$dbselect = mysql_select_db('nyscbandelection');
			if(!$dbselect){
				die('Not able to select to Database'.mysql_error());
			}
			else{
				echo "Database has been selected";
			}

	if(isset($_GET['sid'])){
		echo $_GET['sid'];
		$sid1 = $_GET['sid'];
		$insertQuery = "INSERT INTO result(statecode) VALUES ('$sid1')";
		$insertQuery = mysql_query($insertQuery);
		if(!$insertQuery){
			die("error: ". mysql_error());
		}
	}

	// else{
	// 	die("error: ". mysql_error());
	// }

	$menuQuery = "SELECT * FROM posts ORDER BY id ";
	$menuQuery = mysql_query($menuQuery);

	if(isset($_GET['pid'])){
		$uniqueid = $_GET['pid'];
		$nameQuery = "SELECT * FROM aspirants WHERE cat_id ='$uniqueid'";
		$nameQuery = mysql_query($nameQuery);
			if(!$nameQuery){
				die("Error in Query execution: ".mysql_error());
			}


	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Voting Platform</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div class="header"><h1>WELCOME TO NYSC EKITI BAND CDS VOTING PLATFORM</h1></div>
	<div class="subheader"><h3><marquee behavior="alternate">...one band one sound</marquee></h3> </div>
	<div class="logout">
		<form method="POST" action="voteTest.php"><input type="submit" name="logout" class="logoutbtn" value="LOGOUT"></form>
	</div>
	<nav class="nav1">
		<ul class="ul1">
		<?php  while ($navname=mysql_fetch_array($menuQuery)) {
			$mid = $navname['id'];
			echo"<li><a href='voteTest.php?pid=$mid'>".$navname['position']."</a></li>";

			} ?>
		</ul>
	</nav>
	

			<form action = "voteTest.php" method= 'POST'>
				
					<input type = 'submit' name= 'submit' value = 'SUBMIT'/>;
					<input type= "text" name= "stateCode" value= <?php echo $sid1 ?> >
					<?php while ($resultdata = mysql_fetch_array($nameQuery)){
				 
					$aspName = $resultdata['aspirantName'];
					$cat_name = $resultdata['cat_name'];
					echo "<input type='radio' name='post' value=''>".$aspName."</input><br/>";

				}
					
					if (isset($_POST['submit'])){
						if(isset($_POST['post'])){
							$cate_name= $cat_name;
							$nameType = $_POST['post'];
							$sCode = $_POST['stateCode'];
							echo $cate_name;
							echo $nameType;
							$updateQuery = "UPDATE result SET $cate_name = '$nameType' WHERE stateCode = '$sCode'";
							//echo $sid;
							$updateQuery = mysql_query($updateQuery);
							if (!$updateQuery) {
								die("error in query: ".mysql_error());
							}
						}
						else{
							echo "Please Select a Candidate";
						}
					}
					
				
				?>
			
			</form>
			<!-- <div>
				<form>
					<input type = 'submit' name= 'submit' value = 'SUBMIT'/>
				</form>
			</div> -->
		


	

</body>
</html>