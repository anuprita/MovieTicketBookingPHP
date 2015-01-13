<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	
	unset($_SESSION['sess_custid']);
	unset($_SESSION['sess_username']);
	unset($_SESSION['sess_movie_id']);
	unset($_SESSION['sess_theater_id']);
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<title> Login to Access Website </title>

		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"-->
		<link href="css/styles.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
		</script>
		<link href="css/anu.css" type="text/css" rel="stylesheet"/>
			<link rel="icon" href="images/favicon.ico"/>
		</head>
		<body>
		
		<div class="container-full">
		
		<img id="poster" src="images/poster.jpg">
		<br/>

		<div id="detailsOptions">
		<h1>Login Here</h1>
			<h3> And let the show begin... </h3>
		</div>
		<br/>
 <div class="row">
<form id="loginform" action="login_exec.php" method="POST" >
<table cellpadding="5">
<tr>
<td>
<span class="pretty-font">Username:</span>
</td>
<td>
<input name="username" type="text" />
</td>
</tr>
<tr>
<td>
<span class="pretty-font">Password:</span>
</td>
<td>
<input name="password" type="password" />
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" value="Login" class="btn btn-lg btn-primary"/>
<!--class="login_button"-->
</td>
</tr>
</table>
</form>
       
      </div>
  
  	<br><br>

</div> <!-- /container full -->

<div class="container">
  
  	<hr>
  
  	
	<div class="row">
        <div class="col-lg-12">
        
          <p class="pull-right">New here? Feeling lost? &nbsp; <a href="register.html">Register Here.</a> </p>
        <br><br>
        </div>
    </div>
</div>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
<body>


