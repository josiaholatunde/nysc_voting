<?php
//Connect to the database
session_start();

	$errmsg="";

$conn = mysql_connect('localhost','root','');
	if(!$conn){
		die("Not able to Connect to Database!".mysql_error());
	}
	else{
			//echo "Successful Connection to Database!";
	// Selects database
			$dbselect = mysql_select_db('nyscbandelection');
			if(!$dbselect){
				die('Not able to select to Database'.mysql_error());
			}
			else{
				//echo "Database has been selected";
			}
	}


	if(isset($_POST['login'])){
		$batch = $_POST['batch'];
		$statecode= $_POST['username'];
		

		if($batch == 'null'){
			$errmsg = "Kindly Select a batch";
		}else{

				$userInput = $batch.'/'.$statecode;
				$query1= "SELECT * FROM users WHERE stateCode='$userInput'";
				$process1= mysql_query($query1);
				$process3= mysql_fetch_array($process1);
				$process2 = mysql_num_rows($process1);

				if($process2 != 0){
					$query2 = mysql_query("SELECT * FROM result2 WHERE StateCode = '$userInput'");
					$processQuery2 = mysql_num_rows($query2);
						if($processQuery2 > 0){
							$errmsg = "You have voted before.Kindly check the State Code again or contact the Admin";
						}
						else{
							$_SESSION['username'] = $userInput;
							header("location:vote.php?pid=$userInput");

						}

				
				}
				else{
					$errmsg="Your State Code number is not in the database.Kindly check the entered code again!";
				}


		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>NYSC Ekiti Voting Platform</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mainstyle2.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <style type="text/css">
  	body{
  		background: url('img/band1.jpg') no-repeat;
  		background-size: cover;
  		font-family: cursive;
  		
  	}
  
  	.jumbotron{
  		opacity: 0.5;
  	}
  	.unio{
  		font-size: 1.3em;
  		color: white;
  	}
  </style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	      	<div class="navbar-header">
	      		<a href="vote.php" class="navbar-brand"> <img src="img/nysc2.jpg" alt="NYSC LOGO" height="80px" ></a>
	      		<a href="vote.php" class="navbar-brand">NYSC EKITI BAND CDS</a>
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
		           <li><a href="./Admin/login.php">Admin Login</a></li>
		           
		         </ul>
       		</div>

	        
	      </div>
    </nav>


	<div class="container">
	<div class=" jumbotron"><h1 >WELCOME TO NYSC EKITI BAND CDS VOTING PLATFORM</h1>
			<marquee behavior="alternate">...one band one sound</marquee>
	</div>
	
	

		<form method="post" class="form-horizontal" action="index.php">
				
				<?php if(isset($errmsg) && !empty($errmsg)){echo "<div class='alert alert-danger uni' style='text-align: center;padding: 10px;'>".$errmsg."</div>";} ?>
				<?php if(isset($_GET['msg'])){echo "<div class='alert alert-success uni'style='text-align: center;padding: 10px;'>".$_GET['msg']."</div>";} ?>

				<div class="form-group">
			  		<label for="Select2" class="control-label col-md-3 unio">NYSC BATCH:</label>
				  		<div class="col-md-6">
					  		<select name="batch" id="Select2" class=" form-control col-md-6">
								<option selected value="null">Select Batch</option>
							    <option value="17A">Batch A</option>
							    <option value="17B">Batch B</option>
							   
							  </select>
				  		</div>
					
				</div>
				
			  <div class="form-group">
			    <label for="username" class="control-label col-md-3 unio">Username:</label>
			    <div class="col-md-6">
			      <div class="input-group">
			        <div class="input-group-addon">
			          <span class="glyphicon glyphicon-user"></span>
			        </div>
			        <input type="text" class="form-control" name="username" id="username" placeholder=" The last 4 digits of your State Code e.g.2900" />
			      </div>
			    </div>
			  </div>

			  </div>
			  <div class="form-group">
			    <input type="submit" name="login" value="LOGIN" class="btn btn-primary col-md-offset-5 col-md-2"/>
			  </div>
		</form>
	</div>
					
				
				
	

		

	

</body>
</html>