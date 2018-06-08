<?php
$errorMessage = "";
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
				//echo "Database has been selected";
			}


	


			/*$query = "INSERT INTO candidate(Id, Name, Post, PictureSrc) VALUES(3,'EtoroAbasi Akpan','President','img/result.jpg')";
			$processQuery = mysql_query($query);
				if(!$processQuery){
					die("Error in query execution").mysql_error();
				}else{*/
	$query2 = mysql_query("SELECT * FROM candidate  WHERE Post = 'President'");
			if(!$query2){
				die("Error in query execution 2").mysql_error();
					}

	$query3 = mysql_query("SELECT * FROM candidate  WHERE Post = 'Vice President'");
			if(!$query2){
				die("Error in query execution 2").mysql_error();
					}

	$query5 = mysql_query("SELECT * FROM candidate  WHERE Post = 'SecGen'");
			if(!$query5){
				die("Error in query execution 5").mysql_error();
					}


	$query6 = mysql_query("SELECT * FROM candidate  WHERE Post = 'PRO'");
			if(!$query6){
				die("Error in query execution 6").mysql_error();
					}


	$query7 = mysql_query("SELECT * FROM candidate  WHERE Post = 'FinSec'");
			if(!$query7){
				die("Error in query execution 7").mysql_error();
					}


	$query8 = mysql_query("SELECT * FROM candidate  WHERE Post = 'Treasurer'");
			if(!$query8){
				die("Error in query execution 8").mysql_error();
					}


	$query9 = mysql_query("SELECT * FROM candidate  WHERE Post = 'BMO'");
			if(!$query9){
				die("Error in query execution 9").mysql_error();
					}
					
				

			


	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../mainstyle2.css">
	<style type="text/css">
		.panel-heading a#unio:hover{
					text-decoration: none !important;
					}
				.panel-heading a#unio:link{
					text-decoration: none !important;
					} 

							.pass{
				
			    width: 180px;
			    height: 180px;
			    position: relative;
			    overflow: hidden;
			    border-radius: 50%;
			     margin-right: 20px;

				}

				.pass img {
				    display: block;
				    margin: 0 auto;
				    height: 100%;
				    width: auto;

}
	</style>
</head>
<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	      	<div class="navbar-header">
	      		<a href="index.html" class="navbar-brand"><img src="../img/nysc2.jpg" alt="NYSC LOGO" height="80px" ></a>
	      		<a href="index.html" class="navbar-brand">Ekiti NYSC BAND CDS ELECTION</a>
				       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger-navigation">
				           <span class="sr-only">Navigation toggle</span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
			         </button>
	      	</div>
	      	<div class="collapse navbar-collapse" id="hamburger-navigation">
		         <div class="navbar-text navbar-right">
		           <a class="navbar-link" href="./login.php">
		             Logout!
		           </a>
		         </div>
		         <ul class="nav navbar-nav" role="menu">
		           <li><a href="#" class="active">Current Page</a><span class="sr-only">current</span></li>
		           <li><a href="../index.php">Voting Page</a></li>
		          
		         </ul>
       		</div>

	        
	      </div>
    </nav>

    <div class="container">
	<h3>RESULT CHECKING PAGE</h3>
	<div class="panel-group" id="accordion-sample">
   <div class="panel panel-default">
     <div class="panel-heading">
          <a data-toggle="collapse" id="unio"  href="#accordion-sample-one">
         	<h4 class="panel-title">
         	<span class="glyphicon glyphicon-menu-right"></span>
          		 President
           </h4>
         </a>
     </div>
     <div id="accordion-sample-one" class="panel-collapse collapse in">
       <div class="panel-body">
       	<form action="voteProcess.php" method="POST">
       <?php   while($result = mysql_fetch_array($query2)){ 
						$src = $result['PictureSrc'];
						 $name = $result['Name'];
						 $msg= "<img src='$src' class='pass'/>".$name;
						$queryCount=mysql_query("SELECT COUNT(*) AS Total FROM result2 WHERE President LIKE '%$name%' "); 
						$res = mysql_fetch_array($queryCount);
						$totalCount=mysql_query("SELECT COUNT(*) AS TotalVoters FROM result2 "); 
						$total = mysql_fetch_array($totalCount);
						$msg = "<div>".$msg."----".$res['Total']."votes</div>";

         						 echo $msg;	

						}
						echo "Total number of Voters---".$total['TotalVoters'];
		?>
       </div>
     </div>
   </div>
   <div class="panel panel-default">
     <div class="panel-heading">
          <a data-toggle="collapse" id="unio"  href="#accordion-sample-two">
         	<h4 class="panel-title">
         	<span class="glyphicon glyphicon-menu-right"></span>
          		 Vice President
           </h4>
         </a>
     </div>
   <div id="accordion-sample-two" class="panel-collapse collapse">
     <div class="panel-body">
         <?php   while($result2 = mysql_fetch_array($query3)){ 
						$src2 = $result2['PictureSrc'];
						 $name2 = $result2['Name'];
						 $msg2= "<img src='$src2' class='pass'/>".$name2;
						$queryCount2=mysql_query("SELECT COUNT(*) AS Total FROM result2 WHERE VicePresident LIKE '%$name2%' "); 
						$res2 = mysql_fetch_array($queryCount2);
						$msg2 = "<div>".$msg2."----".$res2['Total']."votes</div>";

         						 echo $msg2;		

						}
					echo "Total number of Voters---".$total['TotalVoters'];
		?>
     </div>
   		</div>
	</div>


	<div class="panel panel-default">
     <div class="panel-heading">
          <a data-toggle="collapse" id="unio"  href="#accordion-sample-three">
         	<h4 class="panel-title">
         	<span class="glyphicon glyphicon-menu-right"></span>
          		 Secretary General
           </h4>
         </a>
     </div>
   <div id="accordion-sample-three" class="panel-collapse collapse">
     <div class="panel-body">
         <?php   while($result3 = mysql_fetch_array($query5)){ 
						$src3 = $result3['PictureSrc'];
						 $name3 = $result3['Name'];
						 $msg3= "<img src='$src3' class='pass'/>".$name3;
						$queryCount3=mysql_query("SELECT COUNT(*) AS Total FROM result2 WHERE SecretaryGeneral LIKE '%$name3%' "); 
						$res3 = mysql_fetch_array($queryCount3);
						$msg3 = "<div>".$msg3."----".$res3['Total']."votes</div>";

         						 echo $msg3;		

						}
					echo "Total number of Voters---".$total['TotalVoters'];
		?>
     </div>
   		</div>
	</div>


	<div class="panel panel-default">
     <div class="panel-heading">
          <a data-toggle="collapse" id="unio"  href="#accordion-sample-four">
         	<h4 class="panel-title">
         	<span class="glyphicon glyphicon-menu-right"></span>
          		 Public Relations Officer
           </h4>
         </a>
     </div>
   <div id="accordion-sample-four" class="panel-collapse collapse">
     <div class="panel-body">
         <?php   while($result4 = mysql_fetch_array($query6)){ 
						$src4 = $result4['PictureSrc'];
						 $name4 = $result4['Name'];
						 $msg4= "<img src='$src4' class='pass'/>".$name4;
						$queryCount4=mysql_query("SELECT COUNT(*) AS Total FROM result2 WHERE PRO LIKE '%$name4%' "); 
						$res4 = mysql_fetch_array($queryCount4);
						$msg4 = "<div>".$msg4."----".$res4['Total']." votes</div>";

         						 echo $msg4;		

						}
					echo "Total number of Voters---".$total['TotalVoters'];
		?>
     </div>
   		</div>
	</div>



	<div class="panel panel-default">
     <div class="panel-heading">
          <a data-toggle="collapse" id="unio"  href="#accordion-sample-five">
         	<h4 class="panel-title">
         	<span class="glyphicon glyphicon-menu-right"></span>
          		 Financial Secretary
           </h4>
         </a>
     </div>
   <div id="accordion-sample-five" class="panel-collapse collapse">
     <div class="panel-body">
         <?php   while($result5 = mysql_fetch_array($query7)){ 
						$src5 = $result5['PictureSrc'];
						 $name5 = $result5['Name'];
						 $msg5= "<img src='$src5' class='pass'/>".$name5;
						$queryCount5=mysql_query("SELECT COUNT(*) AS Total FROM result2 WHERE FinSec LIKE '%$name5%' "); 
						$res5 = mysql_fetch_array($queryCount5);
						$msg5 = "<div>".$msg5."----".$res5['Total']." votes</div>";

         						 echo $msg5;		

						}
					echo "Total number of Voters---".$total['TotalVoters'];
		?>
     </div>
   		</div>
	</div>


	<div class="panel panel-default">
     <div class="panel-heading">
          <a data-toggle="collapse" id="unio"  href="#accordion-sample-six">
         	<h4 class="panel-title">
         	<span class="glyphicon glyphicon-menu-right"></span>
          		 Treasurer
           </h4>
         </a>
     </div>
   <div id="accordion-sample-six" class="panel-collapse collapse">
     <div class="panel-body">
         <?php   while($result6 = mysql_fetch_array($query8)){ 
						$src6 = $result6['PictureSrc'];
						 $name6 = $result6['Name'];
						 $msg6= "<img src='$src6' class='pass'/>".$name6;
						$queryCount6=mysql_query("SELECT COUNT(*) AS Total FROM result2 WHERE Treasurer LIKE '%$name6%' "); 
						$res6 = mysql_fetch_array($queryCount6);
						$msg6 = "<div>".$msg6."----".$res6['Total']." votes</div>";

         						 echo $msg6;		

						}
					echo "Total number of Voters---".$total['TotalVoters'];
		?>
     </div>
   		</div>
	</div>



	<div class="panel panel-default">
     <div class="panel-heading">
          <a data-toggle="collapse" id="unio"  href="#accordion-sample-seven">
         	<h4 class="panel-title">
         	<span class="glyphicon glyphicon-menu-right"></span>
          		Band Maintenance Officer
           </h4>
         </a>
     </div>
   <div id="accordion-sample-seven" class="panel-collapse collapse">
     <div class="panel-body">
         <?php   while($result7 = mysql_fetch_array($query9)){ 
						$src7 = $result7['PictureSrc'];
						 $name7 = $result7['Name'];
						 $msg7= "<img src='$src7' class='pass'/>".$name7;
						$queryCount7=mysql_query("SELECT COUNT(*) AS Total FROM result2 WHERE BMO LIKE '%$name7%' "); 
						$res7 = mysql_fetch_array($queryCount7);
						$msg7 = "<div>".$msg7."----".$res7['Total']." votes</div>";

         						 echo $msg7;		

						}
					echo "Total number of Voters---".$total['TotalVoters'];
		?>
     </div>
   		</div>
	</div>
</div>

</form>
</div>
</form>
</div>

</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function(){
			
					/*$('input[type=radio]').click(function(){
								alert($(this).val());
					});*/
					/*$('button').click(function(){
						var ans = $('input[type=radio]:checked').val();
						$('.formDiv').text(ans);
					});*/
					
				
					
		
	});
</script>
</body>
</html>