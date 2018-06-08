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
						if(isset($_POST['pres']) && isset($_POST['vpres'])){
							$pres = $_POST['pres'];
							$vpres = $_POST['vpres'];
							$pro = $_POST['pro'];
							$secgen = $_POST['secgen'];
							$finsec = $_POST['finsec'];
							$tres = $_POST['tres'];
							$bmo = $_POST['bmo'];
							$sid= $_POST['newStateCode'];

					$processQuery = mysql_query("INSERT INTO result2(StateCode,President,VicePresident,SecretaryGeneral,PRO,FinSec,Treasurer,BMO) VALUES 
						('$sid','$pres','$vpres','$secgen','$pro','$finsec','$tres','$bmo')");
					if(!$processQuery){
						die("Error in Query execution").mysql_error();
					}else{
						header('location:index.php?msg= You have successfully casted your vote');
					}



			}


	}