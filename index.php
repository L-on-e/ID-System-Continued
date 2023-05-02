<?php 
include_once("db_connect.php");

$sqluse ="SELECT * FROM Inorg WHERE id=1 ";
$retrieve = mysqli_query($db,$sqluse);
    while($foundk = mysqli_fetch_array($retrieve))
	     {
              $name = $foundk['name'];
			  $website = $foundk['website'];
		     
		 }	
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title><?php if(isset($website)){echo$website;}?></title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="script/validation.min.js"></script>
	<script type="text/javascript" src="script/login.js"></script>

	<script src="script/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="script/sweetalert.css">
	
</head>
<body>
	<img class="wave" src="/DesignImages/wave.png" alt="BG IMAGE">
	<div class="container">
		<div class="img">
			<img src="/DesignImages/DOH_SEAL.png">
		</div>
		<div class="login-content">
			<form  class="form-login" method="post" id="login-form">
				<img src="DesignImages/avatar.svg">
				<h2 class="title">Admin Login</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input" name="user_email" id="user_email">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password?</h5>
           		    	<input type="password" class="input" name="password" id="password" >
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<button type="submit" class="btn" name="login_button" id="login_button">Sign In</button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
