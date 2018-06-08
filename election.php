<?php
	//Connect to the database
	$errmsg="";
	if(isset($_GET['sid'])){
		$sid1 = $_GET['sid'];
	}


			$pres = "";
			$vp = "";
			$gensec = "";
			$finsec = "";
			$tres = "";
			$pro = "";
			$bmo = "";
			$welfare2 = "";

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

	$query1 = "SELECT * FROM posts ORDER BY id ";
	$process = mysql_query($query1);

	
		/*$query2 = "SELECT * FROM Test WHERE Id = '$uniqueid'";
		$process2 = mysql_query($query2);
			if(!$process2){
				die("Error in Query execution");
			}*/

	if(isset($_GET['pid'])){
		$uniqueid = $_GET['pid'];
		$query2 = "SELECT * FROM aspPresident WHERE uniqueColumn='$uniqueid'";
		$process2 = mysql_query($query2);
			if(!$process2){
				die("Error in Query execution");
			}

		$query3 = "SELECT * FROM aspVicePresident WHERE uniqueColumn='$uniqueid'";
		$process3 = mysql_query($query3);
			if(!$process3){
				die("Error in Query execution");
			}	


		$query4 = "SELECT * FROM aspsecretary WHERE uniqueColumn='$uniqueid'";
		$process4 = mysql_query($query4);
			if(!$process4){
				die("Error in Query execution");
			}	
		$query41 = "SELECT * FROM aspfinsec WHERE uniqueColumn='$uniqueid'";
		$process41 = mysql_query($query41);
			if(!$process41){
				die("Error in Query execution");
			}
		$query5 = "SELECT * FROM asptreas WHERE uniqueColumn='$uniqueid'";
		$process5 = mysql_query($query5);
			if(!$process5){
				die("Error in Query execution");
			}
		$query6 = "SELECT * FROM asppro WHERE uniqueColumn='$uniqueid'";
		$process6 = mysql_query($query6);
			if(!$process6){
				die("Error in Query execution");
			}	
		$query7 = "SELECT * FROM aspbmo WHERE uniqueColumn='$uniqueid'";
		$process7 = mysql_query($query7);
			if(!$process7){
				die("Error in Query execution");
			}	
		$query8 = "SELECT * FROM aspwelfare2 WHERE uniqueColumn='$uniqueid'";
		$process8 = mysql_query($query8);
			if(!$process8){
				die("Error in Query execution");
			}		


	}

		if(isset($_POST['submit'])){
			if(isset($_POST['pres']) && isset($_POST['vp']) && isset($_POST['gensec']) && isset($_POST['finsec']) &&
			isset($_POST['tres']) && isset($_POST['pro']) && isset($_POST['bmo']) && isset($_POST['welfare2'])){
			$pres = $_POST['pres'];
			$vp = $_POST['vp'];
			$gensec = $_POST['gensec'];
			$finsec = $_POST['finsec'];
			$tres = $_POST['tres'];
			$pro = $_POST['pro'];
			$bmo = $_POST['bmo'];
			$welfare2 = $_POST['welfare2'];

			$query9 = "INSERT INTO result VALUES('$sid1',$pres','$vp','$gensec','$finsec','$tres','$pro','$welfare2','$bmo')";
			$process9 = mysql_query($query9);
			if(!$process9){
				die("Error in query Execution".mysql_error());
			}


		
		else{
			$errmsg= "Kindly Click on a candidate to Vote!";
		}

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
		<form method="POST" action="election.php"><input type="submit" name="logout" class="logoutbtn" value="LOGOUT"></form>
	</div>
	<nav class="nav1">
		<ul class="ul1">
		<?php  while ($navname=mysql_fetch_array($process)) {
			$mid = $navname['id'];
			echo"<li><a href='election.php?pid=$mid'>".$navname['position']."</a></li>";

			} ?>
		</ul>
	</nav>
	

	<div class="maincontentbox">
		<!--<div class="header1">Please choose the candidate of your choice and click the submit button</div>-->
		<!--<div class="radiobtn">-->
			<?php echo $errmsg; ?>
			
			<form action="" method="POST">
					
			
					<?php
					/* 
						while($row=mysql_fetch_assoc($process2)){
							$option1 = $row['Can1'];
							$option2 = $row['Can2'];
					echo "<input type='radio' name='pres' value='$option1'/>".  $option1;
					 echo"<input type='radio' name='pres' value='$option2'/>". $option2;
						}

						*/
						while ($resultdata = mysql_fetch_array($process2)){
				 
						$presname = $resultdata['name'];
					 echo"<input type='radio' autocomplete='on' name='pres' value='$pres'>". $presname."</input><br/>";
				} 
				
				 while ($resultdata2 = mysql_fetch_array($process3)){
				 
					$vpname = $resultdata2['name'];
					echo "<input type='radio' autocomplete='on' name='vp' value='$vp'>". $vpname."</input><br/>";
				} 
				
				 while ($resultdata3 = mysql_fetch_array($process4)){
				 
					$secname = $resultdata3['name'];
					echo "<input type='radio' autocomplete='on' name='gensec' value='$gensec'>".$secname."</input><br/>";
				} 
				
				 while ($resultdata41 = mysql_fetch_array($process41)){
				 
					$finsecname = $resultdata41['name'];
					echo "<input type='radio' name='finsec' value='$finsec'>".$finsecname."</input><br/>";
				} 
				

				while ($resultdata4 = mysql_fetch_array($process5)){
				 
					$tresname = $resultdata4['name'];
					echo "<input type='radio' name='tres' value='$tres'>".$tresname."</input><br/>";
				} 
				
				 while ($resultdata5 = mysql_fetch_array($process6)){
				 
					$proname = $resultdata5['name'];
					echo "<input type='radio' name='pro' value='$pro'>".$proname."</input><br/>";
				} 
				
				 while ($resultdata6 = mysql_fetch_array($process7)){
				 
					$bmoname = $resultdata6['name'];
					echo "<input type='radio' name='bmo' value='$bmo'>".$bmoname."</input><br/>";
				} 
				
				 while ($resultdata7 = mysql_fetch_array($process8)){
				 
					$welfarename = $resultdata7['name'];
					echo "<input type='radio' name='welfare2' value='$welfare2'>".$welfarename."</input><br/>";
				} 
					?>

			
			</form>
		

		<div class="submit">
		<form method="POST" action="election1.php"><input type="submit" name="submit" class="submitbtn" value="SUBMIT"></form>
	</div>
	</div>
	<script type="text/javscript">
		
			$("input[type='radio']").click(function(){
				if($(this).attr('value')=='f1'){
					$('.f1').show();
				}
				if($(this).attr('value')=='f2'){
					$('.f2').show();
				}

		});
	</script>

</body>
</html>