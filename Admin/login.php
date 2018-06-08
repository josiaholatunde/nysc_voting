<?php
$errorMessage = "";
	
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


	if(isset($_POST['submit'])){

		$username= $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password)){


		$loginQuery = "SELECT * FROM admin WHERE stateCode= '$username' AND password = '$password' ";
		$loginQuery = mysql_query($loginQuery);
		$loginprocess = mysql_fetch_array($loginQuery);
		
		if (is_array($loginprocess) != 0){
			header('location:inserCandidate.php');
		}
		else{
			$errorMessage =  "Admin Username or Password Incorrect";
		}

	}

		else{
			$errorMessage = "Enter Username and Password";
		}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../mainstyle2.css">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container-fluid">
	      	<div class="navbar-header">
	      		<a href="vote.php" class="navbar-brand"> <img src="../img/nysc2.jpg" alt="NYSC LOGO" height="80px" ></a>
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
		           <a class="navbar-link" href="login.php">
		             Follow Us!
		           </a>
		         </div>
		         <ul class="nav navbar-nav" role="menu">
		           <li><a href="#" class="active">Current Page</a><span class="sr-only">current</span></li>
		           <li><a href="../index.php">Voting Page</a></li>
		           <li class="dropdown">
		             <a class="dropdown-toggle" role="button" data-toggle="dropdown">Dropdown<span class="caret" /></a>
		             <ul class="dropdown-menu">
		               <li><a href="#">Option one</a></li>
		               <li><a href="#">Option two</a></li>
		             </ul>
		           </li>
		         </ul>
       		</div>

	        
	      </div>
    </nav>

    			<div class="container">
				<div class="jumbotron" style="text-align: center;">
					<h1>ADMIN LOGIN PAGE</h1>
				</div>
				<?php if(isset($errorMessage) && !empty($errorMessage)){
					 echo "<div class='alert alert-danger uni' style='text-align: center;padding: 10px;'>".$errorMessage."</div>"; 
					}
				 ?>

				<form class="form-horizontal" method= "POST" action= "login.php">
			  <div class="form-group">
			    <label for="username" class="control-label col-md-3">Username:</label>
			    <div class="col-md-6">
			      <div class="input-group">
			        <div class="input-group-addon">
			          <span class="glyphicon glyphicon-user"></span>
			        </div>
			        <input type="text" class="form-control" name="username" id="username" />
			      </div>
			    </div>
			  </div>

			 <div class="form-group">
			 	<label for="password" class="control-label col-md-3">Password:</label>
			    <div class="col-md-6">
			      <div class="input-group">
			    		<span class="input-group-addon">
			    			<i class="glyphicon glyphicon-lock"></i>
			    		</span>

			    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
				</div>
			  </div>
			</div>


			<div class="form-group">
			 	
			     <input type="submit" class="btn btn-primary  col-md-offset-4 col-md-3" name="submit" value="LOGIN" />

			 
			</div>
		</form>

	</div>
</body>
</html>