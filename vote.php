<?php
$errorMessage = "";
$msg='';
$sid ='';

	session_start();
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

			if(!$_SESSION['username']){
				header("location:index.php?msg=You must be logged in first");
			}


	


			/*$query = "INSERT INTO candidate(Id, Name, Post, PictureSrc) VALUES(3,'EtoroAbasi Akpan','President','img/result.jpg')";
			$processQuery = mysql_query($query);
				if(!$processQuery){
					die("Error in query execution").mysql_error();
				}else{*/
		if(isset($_GET['pid'])){
				$sid =  $_GET['pid'];
			}
	$query2 = mysql_query("SELECT * FROM candidate  WHERE Post = 'President'");
			if(!$query2){
				die("Error in query execution 2").mysql_error();
					}

	$query3 = mysql_query("SELECT * FROM candidate  WHERE Post = 'Vice President'");
			if(!$query3){
				die("Error in query execution 3").mysql_error();
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
					
		$query4 = mysql_query("SELECT * FROM users  WHERE stateCode = '$sid'");
			if(!$query4){
				die("Error in query execution 4").mysql_error();
					}

			


	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Voting Page</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./mainstyle2.css">
	<style type="text/css">
		.rotate{
		-webkit-transform: rotate(90deg);  /* Chrome, Safari, Opera */
			-moz-transform: rotate(90deg);  /* Firefox */
			-ms-transform: rotate(90deg);  /* IE 9 */
				transform: rotate(90deg);  /* Standard syntax */
				}   

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

			} 
    
	</style>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
	

		$(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.in").each(function(){
        	$(this).siblings(".panel-heading").find(".glyphicon").addClass("rotate");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").addClass("rotate");
        }).on('hide.bs.collapse', function(){
        	$(this).parent().find(".glyphicon").removeClass("rotate");
        });

        $('a#unio').on('hover',function(){
        	$(this).attr('color','green');
        })
    });
			
					/*$('input[type=radio]').click(function(){
								alert($(this).val());
					});*/
					/*$('button').click(function(){
						var ans = $('input[type=radio]:checked').val();
						$('.formDiv').text(ans);
					});*/
					
				
					
		
	
</script>
</head>
<body>
	<header>
		<h3>
				
		</h3>
	</header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	      	<div class="navbar-header">
	      		<a href="vote.php" class="navbar-brand"> <img src="img/nysc2.jpg" alt="NYSC LOGO" height="80px" ></a>
	      		<a href="" class="navbar-brand">NYSC EKITI BAND CDS</a>
				       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hamburger-navigation">
				           <span class="sr-only">Navigation toggle</span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
				           <span class="icon-bar"></span>
			         </button>
	      	</div>
	      	<div class="collapse navbar-collapse" id="hamburger-navigation">
		         <div class="navbar-text navbar-right">
		           <a class="navbar-link" href="URL here">
		             Follow us!
		           </a>
		         </div>
		         <ul class="nav navbar-nav" role="menu">
		           <li><a href="#" class="active">Current Page</a><span class="sr-only">current</span></li>
		           
		           
		         </ul>
       		</div>

	        
	      </div>
    </nav>

    <div class="container">
    	
    <h2><?php while($data=mysql_fetch_array($query4)){
			echo "Welcome  ".$data['Name']; 
		}
			?> to the NYSC EKITI BAND CDS BATCH B 2018 ELECTION</h2>
	<div class="panel-group" id="accordion-sample">
   <div class="panel panel-default">
     <div class="panel-heading">
      
         <a data-toggle="collapse" id="unio"  href="#accordion-sample-one">
         	<h4 class="panel-title">
          <span class="glyphicon glyphicon-menu-right"></span> President
           </h4>
         </a>
      
     </div>
     <div id="accordion-sample-one" class="panel-collapse collapse in">
       <div class="panel-body">
       	<form action="voteProcess.php" method="POST">
       		<?php $i=1; ?>
       <?php   while($result = mysql_fetch_array($query2)){ 
						$src = $result['PictureSrc'];
						 $name = $result['Name'];
						 $msg= "<label for='pres<?php echo $i; ?>'><img src='$src' class='pass'/>".$name."</label>";
						$msg= "<input type='radio' id='pres<?php echo $i; ?>' name ='pres' checked='' value='$name'/>".$msg."<br/>";

         						 echo $msg;	
         						 $i++;

						}
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
     <div class="panel-body"><?php $i=1; ?>
         <?php   while($result2 = mysql_fetch_array($query3)){
         				 
						$src2 = $result2['PictureSrc'];
						 $name2 = $result2['Name'];
						 $msg2= "<label for='vpres<?php echo $i; ?>'><img src='$src2' height='200px' class='pass' width='200px'/>".$name2."</label>";
						$msg2= "<input type='radio' id='vpres<?php echo $i; ?>' name ='vpres' checked value='$name2'/>".$msg2."<br/>";

         						 echo $msg2;
         						 $i++;	

						}
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
			     <div class="panel-body"><?php $i=1; ?>
			         <?php   while($result3 = mysql_fetch_array($query5)){
			         				 
									$src3 = $result3['PictureSrc'];
									 $name3 = $result3['Name'];
									 $msg3= "<label for='secGen<?php echo $i; ?>'><img src='$src3' height='200px' class='pass' width='200px'/>".$name3."</label>";
									$msg3= "<input type='radio' id='secGen<?php echo $i; ?>' name ='secgen' checked value='$name3'/>".$msg3."<br/>";

			         						 echo $msg3;
			         						 $i++;	

									}
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
			     <div class="panel-body"><?php $i=1; ?>
			         <?php   while($result4 = mysql_fetch_array($query6)){
			         				 
									$src4 = $result4['PictureSrc'];
									 $name4 = $result4['Name'];
									 $msg4= "<label for='pro<?php echo $i; ?>'><img src='$src4' height='200px'class='pass' width='200px'/>".$name4."</label>";
									$msg4= "<input type='radio' id='pro<?php echo $i; ?>' name ='pro' checked value='$name4'/>".$msg4."<br/>";

			         						 echo $msg4;
			         						 $i++;	

									}
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
			     <div class="panel-body"><?php $i=1; ?>
			         <?php   while($result5 = mysql_fetch_array($query7)){
			         				 
									$src5 = $result5['PictureSrc'];
									 $name5 = $result5['Name'];
									 $msg5= "<label for='finsec<?php echo $i; ?>'><img src='$src5' height='200px' class='pass' width='200px'/>".$name5."</label>";
									$msg5= "<input type='radio' id='finsec<?php echo $i; ?>' name ='finsec' checked value='$name5'/>".$msg5."<br/>";

			         						 echo $msg5;
			         						 $i++;	

									}
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
			     <div class="panel-body"><?php $i=1; ?>
			         <?php   while($result6 = mysql_fetch_array($query8)){
			         				 
									$src6 = $result6['PictureSrc'];
									 $name6 = $result6['Name'];
									 $msg6= "<label for='tres<?php echo $i; ?>'><img src='$src6' height='200px' class='pass' width='200px'/>".$name6."</label>";
									$msg6= "<input type='radio' id='tres<?php echo $i; ?>' name ='tres' checked value='$name6'/>".$msg6."<br/>";

			         						 echo $msg6;
			         						 $i++;	

									}
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
			     <div class="panel-body"><?php $i=1; ?>
			         <?php   while($result7 = mysql_fetch_array($query9)){
			         				 
									$src7 = $result7['PictureSrc'];
									 $name7 = $result7['Name'];
									 $msg7= "<label for='bmo<?php echo $i; ?>'><img src='$src7' height='200px' class='pass' width='200px'/>".$name7."</label>";
									$msg7= "<input type='radio' id='bmo<?php echo $i; ?>' name ='bmo' checked value='$name7'/>".$msg7."<br/>";

			         						 echo $msg7;
			         						 $i++;	

									}
					?>
			     </div>
			   </div>


     
		</div>
</div>
		<input type="hidden" name="newStateCode" value="<?php echo $sid; ?>">


	<div><strong style="color: red; font-size: 1.3em;">*Please Note that once you click the VOTE button below, you have casted your vote and would be LOGGED OUT</strong><br/><br>
	<input  type="submit"  value="VOTE" name="submit" class="btn btn-primary col-push-left col-md-2"/>
</form>
</div>
</form>
</div>

</div>


</body>
</html>