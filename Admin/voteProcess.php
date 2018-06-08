<?php

$msg='';
	
$conn = mysql_connect('localhost','root','');
	if(!$conn){
		die("Not able to Connect to Database!".mysql_error());
	}
	// else{
	// 		echo "Successful Connection to Database!";
	// 	}
	// // Selects database
			$dbselect = mysql_select_db('nyscbandelection');
			if(!$dbselect){
				die('Not able to select to Database'.mysql_error());
			}
			else{
				echo "Database has been selected";
			}

			if (isset($_POST['submit'])){
						if(!empty($_POST['pres']) && !empty($_POST['vpres'])){
							$pres = $_POST['pres'];
							$vpres = $_POST['vpres'];

					$processQuery = mysql_query("INSERT INTO result(stateCode,President,VicePresident) VALUES 
						('$stateCode','$pres','$vpres')");
					if(!$processQuery){
						die("Error in Query execution");
					}else{
						header('../login.php?msg= You have successfully casted your vote')
					}



			}


	}